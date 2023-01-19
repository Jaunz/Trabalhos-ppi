<?php
    function carregaString($arquivo){
        $arq = fopen($arquivo, "r");
        if($arq !== false){
            $string = fgets($arq);
            if($string !== false){
                fclose($arq);
                return $string;
            }
        }
        fclose($arq);
        $stringErro = "erro na leitura de arquivo";
        return $stringErro;
    }

    $email = carregaString("./ex3/php/email.txt");
    $hash = carregaString("./ex3/php/senhahash.txt");

    $emailLogin = $_POST["mail"];
    $senhaLogin = $_POST["passwd"];
    
    if(password_verify($senhaLogin, $hash) && (strcmp($email, $emailLogin) == 0)){
        header("Location: sucesso.html");
        exit();
    }else{
        header("Location: ../index.html");
        exit();
    }
?>