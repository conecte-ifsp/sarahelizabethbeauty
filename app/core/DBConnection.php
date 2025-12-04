<?php 

namespace app\core;

class DBConnection extends \PDO {
    
    private $host   = "localhost";
    private $user   = "root";
    private $pass   = "senha";
    private $port   = "3306"; 
    private $schema = "dbsarah";

    function __construct() {
        try {
            self(
                'mysql:host='.$this->host.';dbname='.$this->schema.'',
                $this->user,
                $this->pass
            );
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erro de Conexão com o Banco de Dados: " . $e->getMessage());
        }
    }

    function query($sql) {
        $resultSet = $this->query($sql);
        return $resultSet;
    }
}

?>