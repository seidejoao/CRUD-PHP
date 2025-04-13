<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        try {
            require_once "databaseHandler.php";
            
            //$query = "INSERT INTO users (username, password, email) VALUES ($username, $password, $email);";
            //desse jeito funciona, mas não é seguro pois podem ser passadas SQL Injections

            $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $password, $email]);
            //aqui as informações são dadas após a query ter sido feita, impedindo SQL Injection

            $pdo = null;
            $stmt = null;
            //fecha os métodos para um desempenho melhor

            header("Location: ../index.php");

            die();// ou exit();
        } catch (PDOException $e) {
            die("Erro: ". $e->getMessage());
        }
    } else{
        header("Location: ../index.php");
    }