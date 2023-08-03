<?php

class Conexao {

    private $host = 'localhost';
    private $dbname = 'db_app_lista_tarefas';
    private $user = 'root';
    private $pass = '724405';

    public function conectar(){
        try {

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conexao;
        }

        catch(PDOException $e){
            echo '<p>' .$e->getMessage(). '</p>';
        }
    }
}

?>