<?php
require_once '../core/DBConnection.php';
require_once '../models/Imagem.php';

// $host= "177.136.241.55";
// $user= "hostdeprojetos_dbsarah";
// $pass= "admin@sarahElizabeth";
// $port = "3128";
// $dbase = "hostdeprojetos_dbsarah";

$dbConnection = new DBConnection();
$p = new Imagem($dbConnection->get_connection());

if (isset($_GET['id_up'])) {
    $id_update = (int)$_GET['id_up'];
    $res = $p->buscarDadosEditar($id_update);
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/estilos_unificado.css"> 
    <title>Painel de Edição - Projeto</title>
</head>
<body>
    <div class="cx-container">

        <div class="menu-lateral">
            <div class="inicio-logo"><div class="img-logo"><img src="../../public/assets/img/logo-circular.png" alt=""></div></div>
            <nav class="links">
                <a>MODIFICAÇÕES</a>
                <a>AGENDA</a>
                <a>CONTA</a>
            </nav>
    
            <div class="saida">
                <img src="../../public/assets/img/sair.png" alt="">
                <p>SAIR</p>
            </div>
        </div>
    
        <div class="cx-principal">
            
            <div class="pagina-principal">
                <div class="titulo">
                    <h1>SEJA BEM-VINDA,</h1>
                    <img src="../../public/assets/img/logo-nome.png" alt="">
                    <h1>!</h1>
                </div>
            </div>

            <div class="form-container">
                <h1>PAINEL DE EDIÇÃO - EDIÇÃO DE TEXTO</h1>
        
                <form method="POST" enctype="multipart/form-data" action="../controls/imagem/processar-imagem.php">

                    <input type="hidden" name="id_up" value="<?php echo $res['id']; ?>">

                    <input type="text" name="projeto" value="<?php if(isset($res)){echo $res['projeto'];} ?>" placeholder="Digite o nome do projeto" required>
                    
                    <select name="tipo"required>
                        <option value="" disabled selected>Tipo de projeto</option>
                        <option value="maquiagem" <?php if(isset($res) && $res['tipo']=="maquiagem") echo "selected"; ?>>Maquiagem</option>
                        <option value="cabelo" <?php if(isset($res) && $res['tipo']=="cabelo") echo "selected"; ?>>Cabelo</option>
                    </select>

                    <select name="posicao" required>
                        <option value="" disabled selected>Posição da imagem</option>
                        <option value="Imagem 1" <?php if(isset($res) && $res['posicao']=="Imagem 1") echo "selected"; ?>>Imagem 1</option>
                        <option value="Paralax 2" <?php if(isset($res) && $res['posicao']=="Paralax 2") echo "selected"; ?>>Paralax 2</option>
                        <option value="Imagem Sarah" <?php if(isset($res) && $res['posicao']=="Imagem Sarah") echo "selected"; ?>>Imagem Sarah</option>
                        <option value="Nenhum" <?php if(isset($res) && $res['posicao']=="Nenhum") echo "selected"; ?>>Nenhum</option>
                    </select>
                    
                    <textarea name="descricao" placeholder="Descrição do projeto" rows="6" required><?php if(isset($res)){echo $res['descricao'];} ?></textarea>
        
                    <button type="submit" class="btn-adicionar">EDITAR</button>
                    <a href="#" class="btn-voltar">VOLTAR</a>
                </form>
                
            </div>

        </div> 
    </div> 
</body>
</html>