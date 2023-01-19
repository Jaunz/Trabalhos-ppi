<?php
    require "./../conexaoMysql.php";
    $pdo = mysqlConnect();

    $sql = <<<SQL
    SELECT email, senhaHash
    FROM logintable
    SQL;

    try {
        $stmt = $pdo->query($sql);
    } catch (Exception $e) {
        exit('' . $e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <title>Arquivos - Exibicao</title>
    </head>
    <body>
        <main>
            <div class="container">
                <table class="table">
                    <tr>
                        <th>Email</th>
                        <th>Senha Hash</th>
                    </tr>
                    <?php
                        while($row = $stmt->fetch()){
                            $email = htmlspecialchars($row['email']);
                            $hash = $row['senhaHash'];

                            echo <<<HTML
                            <tr>
                                <td>$email</td>
                                <td>$hash</td>
                            </tr>
                            HTML;
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>