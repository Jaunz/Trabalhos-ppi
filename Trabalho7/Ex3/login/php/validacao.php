<?php
    require "../../conexaoMysql.php";

    $pdo = mysqlConnect();
    
    $emailLogin = $_POST["mail"] ?? "";
    $senhaLogin = $_POST["passwd"] ?? "";

    $sql = <<<SQL
        SELECT senhaHash
        FROM logintable
        WHERE email = ?
        SQL;

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$emailLogin]);

        $login = $stmt->fetch();

        if($login != false){
            $hash = $login['senhaHash'];
        }
    } catch (Exception $e) {
        exit(' ' . $e->getMessage());
    }
    
    if(password_verify($senhaLogin, $hash)){
        header("location: sucesso.html");
        exit();
    }else{
        header("location: ../index.html");
        exit();
    }
?>