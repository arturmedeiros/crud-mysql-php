<?php

require_once '../config/connection.php';

$db = getenv('DB_NAME');
$sql = "SELECT * FROM $db.products ORDER BY created_at DESC";
$query = mysqli_query($connection, $sql);

/* Array Formatting */
$array = [];

foreach ($query as $line) {
    $data = [
         'ID' => $line['id'],
         'Código' => $line['code'],
         'Nome' => $line['name'],
         'Categoria' => $line['category'],
         'Quantidade' => $line['quantity'],
         'Fornecedor' => $line['provider'],
         'Data de Cadastro' => date_format(date_create($line['created_at']),'d/m/Y à\s H:i')
    ];
    $array[] = $data;
}

/* Headers to Download */
function download_send_headers($filename) {
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

/* Generate CSV File */
function array2csv(array &$array)
{
    if (count($array) == 0) {
        return null;
    }

    ob_start();
    $df = fopen("php://output", 'w');

    fputcsv($df, array_keys(reset($array)));

    foreach ($array as $row) {
        fputcsv($df, $row);
    }

    fclose($df);

    return ob_get_clean();
}

/* Filename */
$now = date('dmYHms');
$file = 'products_'.$now.'.csv';

/* Download CSV */
download_send_headers($file);
echo array2csv($array);
exit;
