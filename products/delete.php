<!-- PRODUCTS / Delete -->

<?php

    /* .EnvHelper */
    require_once "../app/Helpers/EnvHelper.php";
    use EnvHelper\DotEnv;
    (new DotEnv('../.env'))->load();

    if(!$_GET || !$_GET['id']) {
        header("Location: ". getenv('BASE_URL') . '/products');
    }

    /* Connection File */
    include '../config/connection.php';

    $db = getenv('DB_NAME');
    $id = $_GET['id'];

    /* Query SQL */
    $query = "DELETE FROM $db.products WHERE id = $id";

    /* Delete Registry */
    $delete = mysqli_query($connection, $query);

?>

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<!-- Start - Container -->
<div class="container">

    <!-- Start - Section -->
    <section>

        <!-- Start - Container -->
        <div class="row py-5">

            <!-- Start - Content -->
            <div class="col-12 pt-5 text-center">
                <h2>Removido com sucesso!</h2>
            </div>
            <div class="col-12 text-center pt-5">
                <div>
                    <a href="<?php echo getenv('BASE_URL') . '/products' ?>" class="pr-2">
                        <button class="btn btn-secondary btn-lg">
                            Listar produtos
                        </button>
                    </a>
                    <a href="<?php echo getenv('BASE_URL') . '/products/create.php' ?>">
                        <button class="btn btn-primary btn-lg">
                            Cadastrar novo produto
                        </button>
                    </a>
                </div>
            </div>
            <!-- End - Content -->

        </div>
        <!-- End - Container -->

    </section>
    <!-- End - Section -->

</div>
<!-- End - Container -->

<!-- Footer -->
<?php require '../resources/views/Footer.php' ?>

