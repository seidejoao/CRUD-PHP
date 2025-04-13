<?php 
    $dsn = "mysql:host=localhost;dbname=crud-php";
    $dbusername = "root";
    $dbpassword = "210410";

    try {
        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connction failed: " . $e->getMessage();
    }
    //verificação de erros para garantir uma conexão mais estável, caso não haja erros e queira algo simples, só comentar esse try'block', só o objeto $pdo já servirá