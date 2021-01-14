<?php

class Conexao{
    public function getConnection()
    {
        $dsn = 'mysql:host=localhost;dbname=id15886744_crud_php_example';
        $username = 'root';
        $password = '';
    
        try {
    
            $pdo = new PDO($dsn, $username, $password);
    
            return $pdo;
        } catch (PDOException $exception) {
    
            echo 'Erro: ' . $exception->getMessage();
        }
    }
}