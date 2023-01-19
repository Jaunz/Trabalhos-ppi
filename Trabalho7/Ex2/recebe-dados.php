<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_POST["cep"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

try {

  $sql = <<<SQL
  INSERT INTO enderecos (cep, endereco, bairro, cidade, estado)
  VALUES (?, ?, ?, ?, ?)
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois precisamos
  // cadastrar dados fornecidos pelo usuário

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $cep,
    $endereco,
    $bairro,
    $cidade,
    $estado
  ]);

  header("location: mostra-dados.php");
  exit();
} catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}