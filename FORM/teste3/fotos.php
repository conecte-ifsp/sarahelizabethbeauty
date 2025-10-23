<?php
require_once 'AuthUser.php';

// $host= "177.136.241.55";
// $user= "hostdeprojetos_dbsarah";
// $pass= "admin@sarahElizabeth";
// $port = "3128";
// $dbase = "hostdeprojetos_dbsarah";

$host = "localhost";
$user = "root";
$pass = "";
$dbase = "dbsarah";

$p = new Imagem($dbase, $host, $user, $pass);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Sarah Elizabeth Beauty</title>
</head>
<body>
        <?php
        if(isset($_POST['apelido'])){

            if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
                $id_upd = addslashes($_GET['id_up']);
                $apelido = addslashes($_POST['apelido']);
                $tipo = addslashes($_POST['tipo']);
                $posicao = addslashes($_POST['posicao']);
                $endereco = ($_FILES['endereco']['name']); // Nome do arquivo carregado (pode ser vazio)
                
                // CORREÇÃO 1: Removemos $endereco da validação, permitindo que a atualização de texto ocorra
                if(!empty($apelido) && !empty($tipo) && !empty($posicao)){
                    $novo_endereco= $_FILES['endereco']['name'];
                    $velho_endereco= $_POST['velho_endereco'];

                    if($novo_endereco !=''){
                        $update_filename = $novo_endereco;

                        if(file_exists("uploads/".$_FILES['endereco']['name'])){
                            $filename = $_FILES['endereco']['name'];
                            echo "esse nome existe";
                        }
                    }else{
                        $update_filename = $velho_endereco;
                    }

                    // Se a atualização do banco for bem-sucedida...
                    if($p->atualizarDados($id_upd, $apelido, $tipo, $posicao, $update_filename)){
                        
                        // CORREÇÃO 2: Só faz o upload/delete do arquivo antigo se um novo arquivo foi enviado
                        if (!empty($novo_endereco)) {
                            move_uploaded_file($_FILES['endereco']['tmp_name'], "uploads/".$_FILES['endereco']['name']);
                            unlink("uploads/".$velho_endereco);
                        }
                        echo "editada a imagem";

                    }else{
                        echo "nao foi editada";
                    } 

                }
                header("location: fotos.php");
            }else{
                $apelido = addslashes($_POST['apelido']);
                $tipo = addslashes($_POST['tipo']);
                $posicao = addslashes($_POST['posicao']);
                $endereco = ($_FILES['endereco']['name']);

                if(!empty($apelido) && !empty($tipo) && !empty($posicao) && !empty($endereco)){

                    if(file_exists("uploads/".$_FILES['endereco']['name'])){
                        $filename = $_FILES['endereco']['name'];
                        echo "esse nome existe";
                    }else{
                            
                        if($p->cadastrarDados($apelido, $tipo, $posicao, $endereco)){
                            move_uploaded_file($_FILES['endereco']['tmp_name'], "uploads/".$_FILES['endereco']['name']);
                            echo "imagem salva";
                                
                            header("location: fotos.php");
                            exit;
                        } else {
                                echo "Erro: Apelido já cadastrado ou falha no banco de dados.";
                        }
                    } 
                }
            }
        }
        ?>

        <?php
        if(isset($_GET['id_up'])){
            $id_update = addslashes($_GET['id_up']);
            $res = $p->buscarDadosEditar($id_update);
        }
        
        ?>
        <form class="login-box" method="POST" enctype="multipart/form-data" >
            <h2 class="titulo">CADASTRO</h2>
            
            <div class="input-container">
                <input type="text" name="apelido" value="<?php if(isset($res)){echo $res['apelido'];}  ?>" required>
            </div>
            
            <div class="input-container">
                <input type="text" name="tipo" value="<?php if(isset($res)){echo $res['tipo'];}  ?>" required>
            </div>

            <div class="input-container">
                <input type="text" name="posicao" value="<?php if(isset($res)){echo $res['posicao'];}  ?>" required>
            </div>

            <div class="input-container">
                <input type="file" name="endereco" value="<?php if(isset($res)){echo $res['endereco'];}  ?>" >
            </div>

            <div class="input-container">
                <input type="hidden" name="velho_endereco" value="<?php if(isset($res)){echo $res['endereco'];}  ?>" >
                <img src="<?php echo "uploads/".$res['endereco'];?>" width=75px alt="">
            </div>

            <button type="submit" class="login-button" value=""><?php 
            if(isset($res)){
                echo "Atualizar";
                }else{
                    echo "Cadastrar";}   ?></button>
        </form>
        
        <!-- <form action="AuthUser.php" method="POST">
            <input type="hidden" name="endereco" value="<?php if(isset($res)){echo $res['endereco'];}  ?>" >
            <button name="deletar">excluir</button>
        </form> -->

        <a href="../views/login.php" class="link-cadastro">Já possui cadastro? <span class="destaque">Clique aqui!</span></a>

        <?php
            $dados = $p->buscarDados();
            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<p> ";
                    if ($dados[$i]['id'] != "id") {
                        echo " ".$dados[$i]['id'];
                        echo " ".$dados[$i]['apelido'];
                        echo " ".$dados[$i]['tipo'];
                        echo " ".$dados[$i]['posicao'];
                        echo '<img src="uploads/'.$dados[$i]['endereco'].'" width=75px alt="imagem">';
                    } 
                    
                    ?>
                    <a href="fotos.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
                    <a href="fotos.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a>
                    <?php
                    echo "</p> ";
                }
            } else {
                echo "Ainda não há imagem cadastrada";
            }
?>


</body>
</html>

<?php
    if(isset($_GET['id'])){
        $id_img = addslashes($_GET['id']);
        $dados_img = $p->buscarEndereco($id_img); 
        $endereco_arquivo = $dados_img['endereco'];
        $p->excluirDados($id_img, $endereco_arquivo);
        
        header("location: fotos.php");
    }
?>