<?php
    $produtos = ["produto 01","produto 02","produto 03","produto 04","produto 05","produto 06","produto 07","produto 08","produto 09","produto 10"];
    $descricoes = ["Descricao produto 01","Descricao produto 02","Descricao produto 03","Descricao produto 04","Descricao produto 05","Descricao produto 06","Descricao produto 07","Descricao produto 08","Descricao produto 09","Descricao produto 10"];

    $parametro = (int) $_GET["qde"];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Tabela-Exibição</title>
    </head>
    <body>
        <main>
            <div class="container">
                <table class="table">
                    <tr>
                        <th>Número</th>
                        <th>Nome produto</th>
                        <th>Descrição</th>
                    </tr>
                    <?php
                    $i = 0;
                    $indiceProd = rand(0,9);
                        while($i < $parametro){
                            $indiceProd = rand(0,9);
                            echo "<tr><td>$i</td><td>$produtos[$indiceProd]</td><td>$descricoes[$indiceProd]</td></tr>";
                            $i++;
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>