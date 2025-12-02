<?php
require_once __DIR__ . '/../core/DBConnection.php';

use app\core\DBConnection;

Class Imagem{

private $pdo;

    public function __construct() {
        $this->pdo = new DBConnection();
    }

    public function buscarDados(){
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM imagem");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
            
    public function cadastrarDados($projeto, $tipo, $endereco1, $endereco2, $endereco3, $endereco4, $endereco5, $descricao){
            $cmd = $this->pdo->prepare("INSERT INTO imagem (projeto, tipo, endereco1, endereco2, endereco3, endereco4, endereco5, descricao) 
            VALUES (:p, :t, :e1, :e2, :e3, :e4, :e5, :d)");
            $cmd->bindValue(":p", $projeto);
            $cmd->bindValue(":t", $tipo);
            $cmd->bindValue(":e1", $endereco1);
            $cmd->bindValue(":e2", $endereco2);
            $cmd->bindValue(":e3", $endereco3);
            $cmd->bindValue(":e4", $endereco4);
            $cmd->bindValue(":e5", $endereco5);
            $cmd->bindValue(":d", $descricao);
            $cmd->execute();
            return true;
    }       

    public function salvarBase64($base64, $caminho) {

    if (strpos($base64, ',') === false) {
        return false; 
    }

    list($meta, $data) = explode(',', $base64);

    if (base64_decode($data, true) === false) {
        return false;
    }

    $conteudo = base64_decode($data);
    return file_put_contents($caminho, $conteudo) !== false;
}

    public function excluirDados($id) {
        $cmd = $this->pdo->prepare("SELECT endereco1, endereco2, endereco3, endereco4, endereco5 FROM imagem WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $img = $cmd->fetch(PDO::FETCH_ASSOC);

        // Apaga do banco
        $cmdDel = $this->pdo->prepare("DELETE FROM imagem WHERE id = :id");
        $cmdDel->bindValue(":id", $id);
        $cmdDel->execute();

        // Apaga os arquivos
        foreach ($img as $endereco) {
            if (!empty($endereco)) {
                $caminho = __DIR__ . "/../uploads/" . $endereco;
                if (file_exists($caminho)) {
                    unlink($caminho);
                }
            }
        }

        return true; // importante
    }


    public function buscarDadosEditar($id_update){
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM imagem WHERE id = :id");
        $cmd->bindValue(":id", $id_update);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function atualizarDadosTexto($id_upd, $projeto, $tipo, $descricao){
        $cmd = $this->pdo->prepare("
            UPDATE imagem SET 
                projeto = :p,
                tipo = :t,
                descricao = :d
                WHERE id = :id
        ");

        $cmd->bindValue(":p", $projeto);
        $cmd->bindValue(":t", $tipo);
        $cmd->bindValue(":d", $descricao);
        $cmd->bindValue(":id", $id_upd);
        $cmd->execute();
        return true;
}

    public function atualizarDadosImagem($id_img, $img, $endereco){
        $cmd = $this->pdo->prepare("UPDATE imagem SET endereco$img = :e WHERE id = :id");
        $cmd->bindValue(":id", $id_img);
        $cmd->bindValue(":e", $endereco);
        $cmd->execute();
        return true;
}

    public function buscarDadosEditarImagem($id_img, $img){
        $cmd = $this->pdo->prepare("SELECT endereco$img FROM imagem WHERE id = :id");
        $cmd->bindValue(":id", $id_img);
        $cmd->execute();

        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    } 

    }

?>
