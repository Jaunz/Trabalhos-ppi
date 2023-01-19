<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
  SELECT cep, endereco, bairro, cidade, estado
  FROM enderecos
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // utilizamos o método query (e não o exec).
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Endereços cadastrado</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    body {
      padding-top: 2rem;
    }
    img {
      width: 20px;
    }
  </style>  
</head>

<body>

  <div class="container">
    <h3>Endereços Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th></th>
        <th>CEP</th>
        <th>Endereço</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        $cep = htmlspecialchars($row['cep']);
        $endereco = htmlspecialchars($row['endereco']);
        $bairro = htmlspecialchars($row['bairro']);
        $cidade = htmlspecialchars($row['cidade']);
        $estado = htmlspecialchars($row['estado']);
        
        echo <<<HTML
          <tr>
            <td>
              <a href="deleta-endereco.php?endereco=$endereco">
                <img src="delete.png">
              </a>
            </td> 
            <td>$cep</td> 
            <td>$endereco</td>
            <td>$bairro</td>
            <td>$cidade</td>
            <td>$estado</td>
          </tr>       
        HTML;
      }
      ?>

    </table>
    <a href="index.html">Menu de opções</a>
  </div>

</body>

</html>