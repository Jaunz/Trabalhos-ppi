<?php
    require "../../conexaoMysql.php";

    $pdo = mysqlConnect();

    $email = $_POST["mail"] ?? "";
    $senha = $_POST["passwd"] ?? "";
    $hashDaSenha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = <<<SQL
    INSERT INTO logintable (email, senhaHash)
    VALUES (?, ?)
    SQL;

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $hashDaSenha]);
        header("location: confirma.html");
        exit();
    } catch (Exception $e) {
        exit(' ' . $e->getMessage());
    }
?>