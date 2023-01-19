function mysqlConnect(){

    $db_host = "host_do_msql";
    $bd_username = "usuario_no_mysql";
    $db_password = "senha_user_msql";
    $db_name = "nome_do_bd_msql";
    
    $dsn = "mysql : host=$db_host; dbname=$db_name; charset=utf8mb4";

    $options = [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
        

        ]

    
}