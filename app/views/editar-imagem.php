<?php
require_once '../models/Imagem.php';
require_once '../core/DBConnection.php';

$dbConnection = new DBConnection();
$p = new Imagem($dbConnection->get_connection());

if (isset($_GET['id_img']) && isset($_GET['img'])) {
    $id_img = (int)$_GET['id_img'];
    $img    = (int)$_GET['img'];
    $res = $p->buscarDadosEditarImagem($id_img, $img);}
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
                <h1>PAINEL DE EDIÇÃO - EDIÇÃO DE IMAGEM</h1>

                <form method="POST" enctype="multipart/form-data" action="../controls/imagem/processar-imagem.php">

                    <input type="hidden" name="id_img" value="<?php echo $id_img; ?>">

                    <input type="hidden" name="img" value="<?php echo $img; ?>">

                    <div id="img-ed-proj">
                        <label class="upload-circle user-pic" for="file1">
                            <input type="hidden" name="velho_endereco" value="<?= $res["endereco$img"]; ?>">
                            <img src="../uploads/<?= $res["endereco$img"]; ?>" width=75px>
                            <input type="file" name="endereco" id="file1" accept="image/*">
                        </label>
                    </div>

                    <button type="submit" class="btn-adicionar">Atualizar</button>
                </form>
            </div>

        </div> 
    </div>

    </body>
</html>