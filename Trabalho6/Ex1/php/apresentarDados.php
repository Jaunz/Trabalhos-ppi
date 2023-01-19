<?php
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Formulario - Exibicao</title>
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>CEP:</h2>
                        <p>$cep</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Logradouro:</h2>
                        <p>$logradouro</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Bairro:</h2>
                        <p>$bairro</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Cidade:</h2>
                        <p>$bairro</p>
                    </div>
                    <div class="col-md-4">
                        <h2>Estado:</h2>
                        <p>$estado</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
    </html>
    HTML;

    echo $html;
?>