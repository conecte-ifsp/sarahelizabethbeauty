<?php
require_once 'AuthUser.php';

$host= "177.136.241.55";
$user= "talentos_dbsarah";
$pass= "admin@sarahElizabeth";
$port = "3128";
$dbase = "talentos_dbsarah";
$i = new Imagem($dbase, $host, $user, $pass);

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
                $tipo= addslashes($_POST['tipo']);
                $posicao= addslashes($_POST['posicao']);
                $endereco= addslashes($_POST['endereco']);
                if(!empty($apelido) && !empty($tipo) && !empty($posicao) && !empty($endereco)){
                    $i->atualizarDados($id_upd, $apelido, $tipo, $posicao, $endereco);
                    header("location: fotos.php");
                }   
            }else{
                $apelido = addslashes($_POST['apelido']);
                $tipo= addslashes($_POST['tipo']);
                $posicao= addslashes($_POST['posicao']);
                $endereco= addslashes($_POST['endereco']);
                if(!empty($apelido) && !empty($tipo) && !empty($posicao) && !empty($endereco)){
                    if(!$i->cadastrarDados($apelido, $tipo, $posicao, $endereco)){
                    }
                }else{   
                    echo "Preencha todos os campos";
                }
            }
        }

        ?>

        <?php
        if(isset($_GET['id_up'])){
            $id_update = addslashes($_GET['id_up']);
            $res = $i->buscarDadosEditar($id_update);
        }
        
        ?>
        <form class="login-box" method="POST">
            <h2 class="titulo">CADASTRO</h2>
            
            <div class="input-container">
                <input type="text" name="apelido" value="<?php if(isset($res)){echo $res['apelido'];}  ?>" >
            </div>
            
            <div class="input-container">
                <input type="text" name="tipo" value="<?php if(isset($res)){echo $res['tipo'];}  ?>">
            </div>

            <div class="input-container">
                <input type="text" name="posicao" value="<?php if(isset($res)){echo $res['posicao'];}  ?>" >
            </div>

            <div class="input-container">
                <input type="text" name="endereco" value="<?php if(isset($res)){echo $res['endereco'];}  ?>" >
            </div>

            <button type="submit" class="login-button" value=""><?php 
            if(isset($res)){
                echo "Atualizar";
                }else{
                    echo "Cadastrar";}   ?></button>
        </form>

        <a href="../views/login.php" class="link-cadastro">Já possui cadastro? <span class="destaque">Clique aqui!</span></a>

        <?php
            $dados = $p->buscarDados();
            if(count($dados) > 0){
                for ($i=0; $i < count($dados); $i++){
                    echo "<p> ";
                    foreach ($dados[$i] as $k => $v){
                        if($k != "id"){
                            echo " <b>".$v."</b> ";
                        }
                    }
                    ?>
                    <a href="fotos.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a> 
                    <a href="fotos.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a>
                    <?php
                    echo "</p> ";
                }
            } else{
                echo "Ainda não há posicao cadastrada";
            }
            
        ?>

</body>
</html>

<?php
    if(isset($_GET['id'])){
        $id_img = addslashes($_GET['id']);
        $i->excluirDados($id_img);
        header("location: fotos.php");
    }
?>