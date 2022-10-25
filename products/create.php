<!-- PRODUCTS / Create -->

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<!-- Dependencies -->
<?php
    /* .EnvHelper */
    require_once "../app/Helpers/EnvHelper.php";
    use EnvHelper\DotEnv;
    (new DotEnv('../.env'))->load();
?>

<!-- Start - Container -->
<div class="container">

    <!-- Start - Section -->
    <section class="pb-5">

        <!-- Start - Header -->
        <header>
            <div class="row py-5">
                <div class="col-12 text-center">
                    <h1>Cadastrar Produto</h1>
                </div>
            </div>
        </header>
        <!-- End - Header -->

        <!-- Start - Form - Native Validation HTML 5 -->
        <form action="<?php echo getenv('BASE_URL') . '/products/submitted.php' ?>" method="post">
            <div class="form-row justify-content-center">
                <!-- Start - Form Content -->
                <div class="col-xs-12 col-sm-12 col-md-6">

                    <!-- Code -->
                    <div class="form-group">
                        <label for="prod_code">Código do Produto</label>
                        <input name="prod_code"
                               id="prod_code"
                               type="number"
                               class="form-control"
                               placeholder="Insira o número do produto"
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
                               required>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="prod_category">Categoria</label>
                        <select name="prod_category"
                                id="prod_category"
                                class="form-control"
                                required>
                            <option disabled selected value="">
                                Escolha uma opção...
                            </option>
                            <option>Periféricos</option>
                            <option>Hardwares</option>
                            <option>Softwares</option>
                            <option>Celulares</option>
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
                               required>
                    </div>

                    <!-- Provider -->
                    <div class="form-group">
                        <label for="prod_provider">Fornecedor</label>
                        <select name="prod_provider"
                                id="prod_provider"
                                class="form-control"
                                required>
                            <option disabled selected value="">
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
                                Cadastrar
                            </button>
                        </div>
                    </div>

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
