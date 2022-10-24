<!-- PRODUCTS / Index -->

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<!-- Dependencies -->
<?php
/* .EnvHelper */
require_once "../app/Helpers/EnvHelper.php";

use EnvHelper\DotEnv;

(new DotEnv('../.env'))->load();
?>

<!-- SQL Query - Get Products -->
<?php
include '../config/connection.php';

$db = getenv('DB_NAME');
$sql = "SELECT * FROM $db.products;";
$query = mysqli_query($connection, $sql);
?>

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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <!--                                <th scope="col">#ID</th>-->
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Provider</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Actions</th>
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
                                $created_at = $array['created_at'];
                                ?>
                                <tr>
                                    <td><?php echo $code ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $category ?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php echo $provider ?></td>
                                    <td><?php echo "$created_at" ?></td>
                                    <td>1 / 2</td>
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
