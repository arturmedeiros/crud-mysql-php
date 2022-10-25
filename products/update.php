<!-- PRODUCTS / Update -->

<?php

    /* .EnvHelper */
    require_once "../app/Helpers/EnvHelper.php";
    use EnvHelper\DotEnv;
    (new DotEnv('../.env'))->load();

    if(!$_POST || !$_POST['prod_code']) {
        var_dump('eroo!');
        header("Location: ". getenv('BASE_URL') . '/products');
    }

    $prod_id = $_POST['id'];
    $prod_code = $_POST['prod_code'];
    $prod_name = $_POST['prod_name'];
    $prod_category = $_POST['prod_category'];
    $prod_quantity = $_POST['prod_quantity'];
    $prod_provider = $_POST['prod_provider'];

    /* Connection File */
    include '../config/connection.php';

    $db = getenv('DB_NAME');

    /* Query SQL */
    $query = "UPDATE $db.products SET `code`=$prod_code, `name`='$prod_name', `category`='$prod_category', `quantity`=$prod_quantity, `provider`='$prod_provider' WHERE id = $prod_id";
    /* Update Registry */
    $update = mysqli_query($connection, $query);

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
                <h2>Produto atualizado com sucesso!</h2>
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

