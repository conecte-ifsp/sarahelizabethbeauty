<?php

Class Perfil{

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

    // public function buscarDados(){
    //     $res = array();
    //     $cmd = $this->pdo->query("SELECT * FROM perfil");
    //     $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    //     return $res;
    // }

    // public function cadastrarDados($apelido, $tipo, $posicao, $endereco){
    //     $cmd = $this->pdo->prepare("SELECT id from imagem WHERE apelido = :a");
    //     $cmd->bindValue(":a", $apelido);
    //     $cmd->execute();
    //     if($cmd->rowCount() > 0){
    //         return false;
    //     } else {
    //         $cmd = $this->pdo->prepare("INSERT INTO imagem (apelido, tipo, posicao, endereco) VALUES (:a, :t, :p, :e)");
    //         $cmd->bindValue(":a", $apelido);
    //         $cmd->bindValue(":t", $tipo);
    //         $cmd->bindValue(":p", $posicao);
    //         $cmd->bindValue(":e", $endereco);
    //         $cmd->execute();
    //         return true;
    //     }
    // } 

        // public function excluirDados($id){
        //     $cmd = $this->pdo->prepare("DELETE FROM imagem WHERE id = :id");
        //     $cmd->bindValue(":id",$id);
        //     $cmd->execute();
        // }

public function buscarDadosEditar($id){
    $res = array();
    $cmd = $this->pdo->prepare("SELECT * FROM perfil WHERE id = :id");
    $cmd->bindValue(":id", $id);
    $cmd->execute();
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    return $res;
}

public function atualizarDados($id, $email, $senha, $telefone, $cep, $bairro, $rua, $numero){
    
    $cmd = $this->pdo->prepare("UPDATE perfil SET email= :e, senha = :s, telefone = :t, cep = :c, bairro = :b, rua = :r, numero = :n WHERE id =:id");
    $cmd->bindValue(":e", $email);
    $cmd->bindValue(":s", $senha);
    $cmd->bindValue(":t", $telefone);
    $cmd->bindValue(":c", $cep);
    $cmd->bindValue(":b", $bairro);
    $cmd->bindValue(":r", $rua);
    $cmd->bindValue(":n", $numero);
    $cmd->bindValue(":id", $id);
    $cmd->execute();
    return true;
    }
} 

?>