<?php
    require "../conexaoMysql.php";

    $pdo = mysqlConnect();

    try {
        $sql = <<<SQL
            SELECT nome, sexo, email, telefone, cep, logradouro, cidade, estado, peso, altura, tiposangue
            FROM pessoa INNER JOIN paciente ON pessoa.codigo = codigo_pessoa
        SQL;

        $stmt->query($sql);
    } catch (Exceptiom $e) {
        exit('FALHA ' . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <title>Exibicao</title>
</head>
<body>
    <main>
        <div class="container">
            <h3>Clientes</h3>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Cep</th>
                    <th>Logradouro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>Tipo Sanguineo</th>
                </tr>
                <?php
                    while($row = $stmt->fetch()){
                        $nome = htmlspecialchars($row['nome']);
                        $sexo = htmlspecialchars($row['sexo']);
                        $email = htmlspecialchars($row['email']);
                        $telefone = htmlspecialchars($row['telefone']);
                        $cep = htmlspecialchars($row['cep']);
                        $logradouro = htmlspecialchars($row['logradouro']);
                        $estado = htmlspecialchars($row['estado']);
                        $cidade = htmlspecialchars($row['cidade']);
                        $peso = htmlspecialchars($row['peso']);
                        $altura = htmlspecialchars($row['altura']);
                        $sangue = htmlspecialchars($row['tiposangue']);

                        echo <<<HTML
                            <tr>
                                <td>$nome</td>
                                <td>$sexo</td>
                                <td>$email</td>
                                <td>$telefone</td>
                                <td>$cep</td>
                                <td>$logradouro</td>
                                <td>$cidade</td>
                                <td>$estado</td>
                                <td>$peso</td>
                                <td>$altura</td>
                                <td>$sangue</td>
                            </tr>
                        HTML;
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>