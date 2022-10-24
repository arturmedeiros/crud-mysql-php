<!DOCTYPE html>
<html lang="pt">
<head>
    <title>CRUD PHP & MYSQL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CDN - CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>

<!-- Start - Container -->
<div class="container">

    <!-- Start - Section -->
    <section>

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
        <form action="/products/create.php" method="post">
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

                    <!-- CTA Submit -->
                    <button type="submit"
                            class="btn-lg btn btn-primary w-100">
                        Cadastrar
                    </button>

                </div>
                <!-- End - Form Content -->

            </div>

        </form>
        <!-- End - Form -->

    </section>
    <!-- End - Section -->

</div>
<!-- End - Container -->

<!-- Bootstrap CDN - JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>
