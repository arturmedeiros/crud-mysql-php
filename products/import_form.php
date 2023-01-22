<?php
// Dependencies

/* .EnvHelper */
require_once "../app/Helpers/EnvHelper.php";
use EnvHelper\DotEnv;
(new DotEnv('../.env'))->load();

include '../config/connection.php';
include '../products/import.php';

// Variáveis
$db = getenv('DB_NAME');
$inputs = [
    'id', // 'Produto ID'
    'code', // 'Código'
    'name', // 'Nome'
    'category', // 'Categoria'
    'quantity', // 'Quantidade'
    'provider', // 'Fornecedor'
    'created_at', // 'Data de Cadastro'
];

// Validação e geração do CSV
if ($_FILES && $_FILES["file"]){
    $file = $_FILES["file"]["name"];
    $ext = pathinfo($file, PATHINFO_EXTENSION);

    if($ext == "csv"){
        $file = $_FILES["file"]["tmp_name"];
        importCSV($db, $connection, $file, $inputs);
    }
    else {
        echo "Faça upload de um arquivo .CSV!";
    }
}
?>

<!-- Header -->
<?php require '../resources/views/Header.php' ?>

<div class="container">

    <!-- Start - Section -->
    <section class="pb-5">

        <!-- Start - Header -->
        <header>
            <div class="row py-5">
                <div class="col-12 text-center">
                    <h1>Importar Produtos</h1>
                </div>
            </div>
        </header>
        <!-- End - Header -->

        <!-- Start - Form - Native Validation HTML 5 -->
        <form action="import_form.php" method="post" enctype="multipart/form-data">
            <div class="form-row justify-content-center">
                <!-- Start - Form Content -->
                <div class="col-xs-12 col-sm-12 col-md-6">

                    <!-- File Upload -->
                    <div class="form-group">
                        <label for="file">Anexar um arquivo</label>
                        <input name="file"
                               id="file"
                               type="file"
                               class="form-control"
                               required>
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
                        <div class="col-xs-12 col-md-6 pl-md-0 py-2">
                            <!-- CTA Submit -->
                            <button type="submit"
                                    class="btn-lg btn btn-primary w-100">
                                Salvar arquivo
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

<!-- Footer -->
<?php require '../resources/views/Footer.php' ?>

