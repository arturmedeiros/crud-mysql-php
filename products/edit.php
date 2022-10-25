<!-- PRODUCTS / Edit -->

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<!-- SQL Query - Get Products by ID-->
<?php
    include '../config/connection.php';
    $id = $_GET['id'];
    $db = getenv('DB_NAME');
    $sql = "SELECT * FROM $db.products WHERE id = $id;";
    $query = mysqli_query($connection, $sql);
?>

<!-- Start - Container -->
<div class="container">

    <!-- Start - Section -->
    <section class="pb-5">

        <!-- Start - Header -->
        <header>
            <div class="row py-5">
                <div class="col-12 text-center">
                    <h1>Editar Produto #<?php echo $_GET['id'] ?></h1>
                </div>
            </div>
        </header>
        <!-- End - Header -->

        <!-- Start - Form - Native Validation HTML 5 -->
        <form action="<?php echo getenv('BASE_URL') . '/products/update.php' ?>" method="post">
            <div class="form-row justify-content-center">
                <!-- Start - Form Content -->
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <?php
                        while ($array = mysqli_fetch_array($query)) {
                        $id = $array['id'];
                        $code = $array['code'];
                        $name = $array['name'];
                        $category = $array['category'];
                        $quantity = $array['quantity'];
                        $provider = $array['provider'];
                        $created_at = date_format(date_create($array['created_at']), 'd/m/Y à\s H:i');
                    ?>
                        <!-- Code -->
                        <div class="form-group">

                            <!-- ID / Hidden -->
                            <input name="id"
                                   value="<?php echo $id ?>"
                                   hidden>

                            <label for="prod_code">Código do Produto</label>
                            <input name="prod_code"
                                   id="prod_code"
                                   type="number"
                                   class="form-control"
                                   placeholder="Insira o número do produto"
                                   value="<?php echo $code ?>"
                                   required>

                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="prod_name">Nome do Produto</label>
                            <input name="prod_name"
                                   id="prod_name"
                                   type="text"
                                   class="form-control"
                                   placeholder="Insira o nome do produto"
                                   autocomplete="off"
                                   value="<?php echo $name ?>"
                                   required>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="prod_category"
                                    class="form-control"
                                    value="<?php echo $category ?>"
                                    required>
                               <option disabled value="">
                                    Escolha uma opção...
                                </option>
                                <option value="Periféricos">Periféricos</option>
                                <option value="Hardwares">Hardwares</option>
                                <option value="Softwares">Softwares</option>
                                <option value="Celulares">Celulares</option>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            <label for="prod_quantity">Quantidade</label>
                            <input name="prod_quantity"
                                   id="prod_quantity"
                                   type="number"
                                   class="form-control"
                                   placeholder="Insira a quantidade"
                                   autocomplete="off"
                                   autocapitalize="off"
                                   value="<?php echo $quantity ?>"
                                   required>
                        </div>

                        <!-- Provider -->
                        <div class="form-group">
                            <label for="prod_provider">Fornecedor</label>
                            <select name="prod_provider"
                                    id="prod_provider"
                                    class="form-control"
                                    value="<?php echo $provider ?>"
                                    required>
                                <option disabled value="">
                                    Escolha uma opção...
                                </option>
                                <option>Fornecedor A</option>
                                <option>Fornecedor B</option>
                                <option>Fornecedor C</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 pr-md-1 py-2">
                                <!-- Go back -->
                                <a href="<?php echo getenv('BASE_URL') . '/products' ?>">
                                    <div class="btn-lg btn btn-secondary w-100">
                                        Voltar
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-md-6 pl-md-1 py-2">
                                <!-- CTA Submit -->
                                <button type="submit"
                                        class="btn-lg btn btn-primary w-100">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- End - Form Content -->

            </div>

        </form>
        <!-- End - Form -->

    </section>
    <!-- End - Section -->

</div>
<!-- End - Container -->

<!-- Footer -->
<?php require '../resources/views/Footer.php' ?>
