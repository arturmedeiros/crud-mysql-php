<?php
include '../config/connection.php';
include '../products/export.php';

$db     = getenv('DB_NAME');
$query  = "SELECT * FROM $db.products ORDER BY created_at DESC";
$result = mysqli_query($connection, $query);
$export = $_GET['export'] ?? 0;

/**
 * Export Report in CSV File
 */
if ($export == 1)
{
    /**
     * Column headers.
     * They refer to the column name of the database.
     */
    $headers = [
        'id' => 'Produto ID',
        'code' => 'Código',
        'name' => 'Nome',
        'category' => 'Categoria',
        'quantity' => 'Quantidade',
        'provider' => 'Fornecedor',
        'created_at' => 'Data de Cadastro',
    ];

    /**
     * Generate CSV file and force transfer.
     */
    downloadCSV(
            $headers, // Headers
            $result, // Data by Query
            'My Report - CSV File' // Filename
    );
}
?>

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<!-- Start - Container -->
<div class="container">

    <!-- Start - Section -->
    <section class="pb-5">

        <!-- Start - Header -->
        <header>
            <div class="row py-5">
                <div class="col-7 text-left">
                    <h1>Meus Produtos</h1>
                </div>
                <div class="col-5 text-right pt-2">
                    <a target="_blank" href="<?php echo getenv('BASE_URL') . '/products/index.php?export=1' ?>">
                        <button class="btn btn-secondary btn-lg">
                            <i class="fa fa-download"></i>
                        </button>
                    </a>
                    <a href="<?php echo getenv('BASE_URL') . '/products/create.php' ?>">
                        <button class="btn btn-primary btn-lg">
                            Cadastrar
                        </button>
                    </a>
                </div>
            </div>
        </header>
        <!-- End - Header -->

        <!-- Start - Container -->
        <div>
            <div class="row justify-content-center">
                <!-- Start - Form Content -->
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <!-- Start - Table Responsive -->
                    <div class="table-responsive table-striped">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <span class="px-2">
                                        ID
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Code
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Name
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Category
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Quantity
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Provider
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Created at
                                    </span>
                                </th>
                                <th scope="col">
                                    <span class="px-2">
                                        Actions
                                    </span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            while ($array = mysqli_fetch_array($result)) {
                                /*var_dump($array);*/
                                $id = $array['id'];
                                $code = $array['code'];
                                $name = $array['name'];
                                $category = $array['category'];
                                $quantity = $array['quantity'];
                                $provider = $array['provider'];
                                $created_at = date_format(date_create($array['created_at']),'d/m/Y à\s H:i');
                                ?>
                                <tr>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $id ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $code ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $name ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $category ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $quantity ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $provider ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="px-2">
                                            <?php echo $created_at; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?php echo getenv('BASE_URL') . '/products/edit.php?id=' . $id ?>">
                                            <span class="px-2">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                        </a>
                                        <a href="<?php echo getenv('BASE_URL') . '/products/delete.php?id=' . $id ?>">
                                            <span class="px-2">
                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End - Table Responsive -->

                </div>
                <!-- End - Form Content -->

            </div>

        </div>
        <!-- End - Form -->

    </section>
    <!-- End - Section -->

</div>
<!-- End - Container -->

<!-- Footer -->
<?php require '../resources/views/Footer.php' ?>
