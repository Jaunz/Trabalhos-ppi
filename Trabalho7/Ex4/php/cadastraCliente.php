<?php
    require "./../conexaoMysql.php";
    $pdo = mysqlConnect();

    // resgata dados
    $nome = $_POST["nome"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $cep = $_POST["cep"] ?? "";
    $logradouro = $_POST["logradouro"] ?? "";
    $estado = $_POST["estado"] ?? "";
    $cidade = $_POST["cidade"] ?? "";

    // resgata dados paciente
    $peso = $_POST["peso"] ?? "";
    $altura = $_POST["altura"] ?? "";
    $sangue = $_POST["tiposangue"] ?? "";

    $sqlUM = <<<SQL
        INSERT INTO pessoa (nome, sexo, email, telefone, cep, logradouro, cidade, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    SQL;

    $sqlDOIS = <<<SQL
        INSERT INTO paciente (peso, altura, tiposangue, codigo_pessoa)
        VALUES (?, ?, ?, ?)
    SQL;

    try {
        $pdo->beginTransaction();
        $stmtUM = $pdo->prepare($sqlUM);

        if(!$stmtUM->execute([$nome, $sexo, $email, $telefone, $cep, $logradouro, $cidade, $estado]))
            throw new Exception('FALHA NA PRIMEIRA INSERCAO');

        $idDoClienteInserido = $pdo->lastInsertId();

        $stmtDOIS = $pdo->prepare($sqlDOIS);
        if(!$stmtDOIS->execute([$peso, $altura, $sangue, $idDoClienteInserido]))
            throw new Exception('FALHA NA SEGUNDA INSERCAO');

        $pdo->commit();

        header("location: ../index.html");
        exit();
    } catch (Exception $e) {
        $pdo->rollBack();
        if ($e->errorInfo[1] === 1062)
          exit('Dados duplicados: ' . $e->getMessage());
        else
          exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
?>