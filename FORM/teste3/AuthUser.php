<?php

Class Imagem{

    private $pdo;

    public function __construct($dbname, $host, $user, $senha){
        try{
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }   
        catch (PDOException $e){
            echo "Erro com banco de dados: ".$e->getMessage();
            exit();
        }
        catch (Exception $e){
            echo "Erro generico: ".$e->getMessage();
            exit();
        }
    }

    public function buscarDados(){
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM imagem");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function cadastrarDados($apelido, $tipo, $posicao, $endereco){
        $cmd = $this->pdo->prepare("SELECT id from imagem WHERE apelido = :a");
        $cmd->bindValue(":a", $apelido);
        $cmd->execute();
        if($cmd->rowCount() > 0){
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO imagem (apelido, tipo, posicao, endereco) VALUES (:a, :t, :p, :e)");
            $cmd->bindValue(":a", $apelido);
            $cmd->bindValue(":t", $tipo);
            $cmd->bindValue(":p", $posicao);
            $cmd->bindValue(":e", $endereco);
            $cmd->execute();
            return true;
        }
    } 

        public function buscarEndereco($id){
            $cmd = $this->pdo->prepare("SELECT endereco FROM imagem WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirDados($id, $endereco){
            $cmd = $this->pdo->prepare("DELETE FROM imagem WHERE id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
            
            if (file_exists("uploads/".$endereco)) { 
                unlink("uploads/".$endereco);
                echo "Imagem deletada da pasta!";
            } else {
                echo "Aviso: Imagem deletada do BD, mas arquivo não encontrado na pasta.";
            }
            
            echo "imagem deletada";
        }

public function buscarDadosEditar($id){
    $res = array();
    $cmd = $this->pdo->prepare("SELECT * FROM imagem WHERE id = :id");
    $cmd->bindValue(":id", $id);
    $cmd->execute();
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    return $res;
}

public function atualizarDados($id_upd, $apelido, $tipo, $posicao, $update_filename){
    $cmd = $this->pdo->prepare("UPDATE imagem SET apelido= :a, tipo = :t, posicao = :p, endereco = :e WHERE id =:id");
    $cmd->bindValue(":a", $apelido);
    $cmd->bindValue(":t", $tipo);
    $cmd->bindValue(":p", $posicao);
    $cmd->bindValue(":e", $update_filename);
    $cmd->bindValue(":id", $id_upd);
    $cmd->execute();
    return true;
    }
} 

?>