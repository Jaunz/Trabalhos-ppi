<?php

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

function mysqlConnect()
{
  $db_host = "xxx";
  $db_username = "xxx";
  $db_password = "xxx";
  $db_name = "xxx";

  // dsn é apenas um acrônimo de database source name
  $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";

  $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // ativa o modo de erros para lançar exceções    
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // altera o modo padrão do método fetch para FETCH_ASSOC
  ];

  try {
    $pdo = new PDO($dsn, $db_username, $db_password, $options);
    return $pdo;
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Ocorreu uma falha na conexão com o BD: ' . $e->getMessage());
  }
}

$cep = $_GET['cep'] ?? '';
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
    SELECT rua, bairro, cidade
    FROM registros
    WHERE cep = ?
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);
  
  if($row = $stmt->fetch()){
    $endereco = new Endereco($row['rua'], $row['bairro'], $row['cidade']);
  }else{
    $endereco = new Endereco('','','');
  }
  
} catch (Exception $e) {
  exit('' . $e->getMessage());
}

header('Content-type: application/json');  
echo json_encode($endereco);