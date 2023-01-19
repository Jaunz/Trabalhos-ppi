<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

$endereco = $_GET["endereco"] ?? "";

try {

  $sql = <<<SQL
  DELETE FROM enderecos
  WHERE endereco = ?
  LIMIT 1
  SQL;

  // Neste caso utilize prepared statements para prevenir
  // ataques do tipo SQL Injection, pois a declaração
  // SQL contem um parâmetro (cpf) vindo da URL
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$endereco]);

  header("location: mostra-dados.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha inesperada: ' . $e->getMessage());
}
