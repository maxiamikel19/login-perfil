<?php  

    $username = 'root';
    $password = 'nova_senha';
    $dbname =  'login';
    $port = 3306;
    $server = 'localhost';

        
    try {
        $conn = new PDO("mysql:host=$server;port=$port;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conctado com sucesso";
    } catch(PDOException $e) {
        echo "Conex&atilde;o errada: " . $e->getMessage();
    }