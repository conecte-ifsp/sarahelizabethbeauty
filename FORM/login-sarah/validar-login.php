<?php

Class Usuarios{

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


    public function logar($email, $senha) {
        $cmd = $this->pdo->prepare("SELECT id, senha FROM usuarios WHERE email = :e");
        $cmd->bindValue(":e", $email);    
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            $dado = $cmd->fetch(PDO::FETCH_ASSOC);
            $senha_armazenada = $dado['senha'];
            if (password_verify($senha, $senha_armazenada)) {
                session_start();
                $_SESSION['id'] = $dado['id']; 
                return true;
                
            } else {
                return false;
            }
        }
    }

//     public function buscarDados(){
//         $res = array();
//         $cmd = $this->pdo->query("SELECT * FROM imagem ORDER BY posicao");
//         $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
//         return $res;
//     }

    public function cadastrarDados($permissao, $email, $senha_criptografada, $nome){
        $cmd = $this->pdo->prepare("INSERT INTO usuarios (permissao, email, senha, nome) VALUES (:a, :t, :p, :e)");
        
        $cmd->bindValue(":a", $permissao);
        $cmd->bindValue(":t", $email);
        $cmd->bindValue(":p", $senha_criptografada);
        $cmd->bindValue(":e", $nome);
        
        return $cmd->execute();
}

    // public function cadastrarDados($permissao, $email, $senha, $nome){
    //     $cmd = $this->pdo->prepare("SELECT id from usuarios WHERE permissao = :a");
    //     $cmd->bindValue(":a", $permissao);
    //     $cmd->execute();
    //     if($cmd->rowCount() > 0){
    //         echo "deu errado";
    //         return false;
    //     } else {
    //         $cmd = $this->pdo->prepare("INSERT INTO usuarios (permissao, email, senha, nome) VALUES (:a, :t, :p, :e)");
    //         $cmd->bindValue(":a", $permissao);
    //         $cmd->bindValue(":t", $email);
    //         $cmd->bindValue(":p", $senha);
    //         $cmd->bindValue(":e", $nome);
    //         $cmd->execute();
    //         return true;
    //     }
    // } 

//         public function excluirDados($id){
//             $cmd = $this->pdo->prepare("DELETE FROM imagem WHERE id = :id");
//             $cmd->bindValue(":id",$id);
//             $cmd->execute();
//         }

// public function buscarDadosEditar($id){
//     $res = array();
//     $cmd = $this->pdo->prepare("SELECT * FROM imagem WHERE id = :id");
//     $cmd->bindValue(":id", $id);
//     $cmd->execute();
//     $res = $cmd->fetch(PDO::FETCH_ASSOC);
//     return $res;
// }

// public function atualizarDados($id, $apelido, $tipo, $posicao, $endereco){
    
//     $cmd = $this->pdo->prepare("UPDATE imagem SET apelido= :a, tipo = :t, posicao = :p, endereco = :e WHERE id =:id");
//     $cmd->bindValue(":a", $apelido);
//     $cmd->bindValue(":t", $tipo);
//     $cmd->bindValue(":p", $posicao);
//     $cmd->bindValue(":e", $endereco);
//     $cmd->bindValue(":id", $id);
//     $cmd->execute();
//     return true;
//     }
// } 
}

?>