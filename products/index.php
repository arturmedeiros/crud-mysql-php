<!-- PRODUCTS / Index -->

<!-- SQL Query - Get All Products -->
<?php
include '../config/connection.php';

$db = getenv('DB_NAME');
$sql = "SELECT * FROM $db.products;";
$query = mysqli_query($connection, $sql);
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
                            while ($array = mysqli_fetch_array($query)) {
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
