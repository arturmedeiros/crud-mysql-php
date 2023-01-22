<?php

/**
 * Import CSV File
 * @param $db
 * @param $connection
 * @param $file
 * @param null $headers
 * @return void
 */
function importCSV($db, $connection, $file, $headers = null) {
    $row = 1;

    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $num = count($data);
            // Se não enviar os Headers, usa primeira linha do arquivo
            if ($row == 1 && !$headers) {
                $header = $data;
            }
            else if ($row == 1 && $headers) {
                $headersKeys = array();
                foreach ($headers as $key) {
                    $headersKeys[] = $key;
                }
                $header = $headersKeys;
            }
            else {
                $arrayData = [];

                for ($col = 0; $col < $num; $col++) {
                    $newArray = [];
                    $array    = explode(',', $data[0]);
                    foreach ($headers as $key => $index) {
                        $newArray += [$index => $array[$key]];
                    }
                    $arrayData[] = $newArray;
                }

                if($arrayData) {
                    foreach ($arrayData as $line) {
                        saveToDBUpdateOrInsert($line, $connection, $db);
                    }

                    echo "Record updated/created successfully";
                }
            }

            $row++;
        }

        fclose($handle);
    }
}

/**
 * Insert Or Update Row Into DB
 * @param $data
 * @param $connection
 * @param $db
 * @return bool
 */
function saveToDBUpdateOrInsert($data, $connection, $db): bool
{

    // Check if the id already exists in the database
    $id = $data['id']; // $data['id'];
    $db_table = 'products';
    $query = "SELECT id FROM $db.$db_table WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $create = null;

    if (!$result->num_rows || $result->num_rows == 0) {
        // ID does not exist in the database
        $columns = implode(", ", array_keys($data));
        $values  = implode("', '", array_values($data));
        $queryInsert = printf(
            "INSERT INTO $db.$db_table ($columns) VALUES ('$values');"
        );
        $create  = mysqli_query($connection, $queryInsert);
    }
    else {
        // ID already exists in the database
        $set = array();
        foreach($data as $column => $value) {
            $set[] = "$column = '$value'";
        }
        $set = implode(', ', $set);
        $query = printf(
            "UPDATE $db.$db_table SET $set WHERE id = '$id';"
        );
        $create = mysqli_query($connection, $query);
    }

    if ($create == TRUE) {
        //echo "Record updated/created successfully";
        return true;
    } else {
        //echo "Erro: Os ids já existem";
        return false;
    }
}

function saveToDB($data, $db) {
    // Connect to database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $query = "INSERT INTO tablename ($columns) VALUES ('$values')";

    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}

function saveToDBNewID($data) {
    // Connect to database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //Check if the id already exists in the database
    $id = $data['id'];
    $query = "SELECT id FROM tablename WHERE id = '$id'";
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
        //id does not exist in the database
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $query = "INSERT INTO tablename ($columns) VALUES ('$values')";
        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        //id already exists in the database
        echo "Record already exists";
    }
    $conn->close();
}


