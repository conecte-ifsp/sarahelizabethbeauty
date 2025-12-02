<?php 

namespace app\core;

use PDO;
use PDOException;

class DBConnection extends PDO
{
    private $host = "localhost";
    private $dbname = "dbsarah";
    private $user = "root";
    private $pass = "";

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";

        try {
            parent::__construct($dsn, $this->user, $this->pass);

            // Configurações recomendadas
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e) {
            die("ERRO de conexão: " . $e->getMessage());
        }
    }
}

?>
