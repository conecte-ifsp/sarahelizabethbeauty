<?php
require_once __DIR__ . '/../core/DBConnection.php';

use app\core\DBConnection;

Class Galeria{

private $pdo;

    public function __construct() {
        $this->pdo = new DBConnection();
    }

    public function atualizarDadosImagem($id_glr, $endereco){
        $cmd = $this->pdo->prepare("UPDATE imagem SET endereco = :e WHERE id = :id");
        $cmd->bindValue(":id", $id_img);
        $cmd->bindValue(":e", $endereco);
        $cmd->execute();
        return true;
}

    public function buscarDadosEditarImagem($id_glr){
        $cmd = $this->pdo->prepare("SELECT endereco FROM imagem WHERE id = :id");
        $cmd->bindValue(":id", $id_img);
        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    } 
}

?>
