<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/estilos_unificado.css"> 
    <title>Painel de Edição - Adição de Projeto</title>
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
                <h1>PAINEL DE EDIÇÃO - ADIÇÃO DE PROJETO</h1>
        
                <form method="POST" enctype="multipart/form-data" action="../controls/imagem/processar-imagem.php">
                    <input type="text" name="projeto" placeholder="Digite o nome do projeto" required>
                    
                    <select name="tipo" required>
                        <option value="" disabled selected>Tipo de projeto</option>
                        <option value="maquiagem">Maquiagem</option>
                        <option value="cabelo">Cabelo</option>
                    </select>

                    <select name="posicao" required>
                        <option value="" disabled selected>Posição da imagem</option>
                        <option value="Imagem 1">Imagem 1</option>
                        <option value="Paralax 2">Paralax 2</option>
                        <option value="Imagem Sarah">Imagem Sarah</option>
                        <option>Nenhum</option>
                    </select>
                    
                    <textarea name="descricao" placeholder="Descrição do projeto" rows="6" required></textarea>

                    <div id="img-add-proj">

                        <label class="upload-circle user-pic" for="file1">
                            +
                            <input type="file" name="endereco1" id="file1" accept="image/*">
                        </label>

                        <label class="upload-circle" for="file2">
                            +
                            <input type="file" name="endereco2" id="file2" accept="image/*">
                        </label>

                        <label class="upload-circle" for="file3">
                            +
                            <input type="file" name="endereco3" id="file3" accept="image/*">
                        </label>

                        <label class="upload-circle"  for="file4">
                            +
                            <input type="file" id="file4" name="endereco4" accept="image/*">
                        </label>

                        <label class="upload-circle" for="file5">
                            +
                            <input type="file" id="file5" name="endereco5" accept="image/*">
                        </label>
                    
                    </div>
        
                    <button type="submit" class="btn-adicionar">ADICIONAR</button>
                    <a href="#" class="btn-voltar">VOLTAR</a>
                </form>
            </div>

        </div> 
    </div> 
</body>
</html>

    <?php
        // if(isset($_POST['projeto'])){
        //     $projeto = addslashes($_POST['projeto']);
        //         $tipo = addslashes($_POST['tipo']);
        //         $posicao = addslashes($_POST['posicao']);
        //         $descricao = addslashes($_POST['descricao']);
        //         $endereco1 = ($_FILES['endereco1']['name']);
        //         $endereco2 = ($_FILES['endereco2']['name']);
        //         $endereco3 = ($_FILES['endereco3']['name']);
        //         $endereco4 = ($_FILES['endereco4']['name']);
        //         $endereco5 = ($_FILES['endereco5']['name']);

        //         if(!empty($projeto) && !empty($tipo) && !empty($posicao) && !empty($endereco1) && !empty($endereco2) && !empty($endereco3) && !empty($endereco4) && !empty($endereco5) && !empty($descricao)){

        //             if(file_exists("../uploads/".$_FILES['endereco1']['name'])){
        //                 $filename1 = $_FILES['endereco1']['name'];
        //                 echo "esse nome existe";
        //             }else{
                            
        //                 if($p->cadastrarDados($projeto, $tipo, $posicao, $endereco1, $endereco2, $endereco3, $endereco4, $endereco5, $descricao)){
        //                     move_uploaded_file($_FILES['endereco1']['tmp_name1'], "../uploads/".$_FILES['endereco1']['name']);
        //                     move_uploaded_file($_FILES['endereco2']['tmp_name2'], "../uploads/".$_FILES['endereco2']['name']);
        //                     move_uploaded_file($_FILES['endereco3']['tmp_name3'], "../uploads/".$_FILES['endereco3']['name']);
        //                     move_uploaded_file($_FILES['endereco4']['tmp_name4'], "../uploads/".$_FILES['endereco4']['name']);
        //                     move_uploaded_file($_FILES['endereco5']['tmp_name5'], "../uploads/".$_FILES['endereco5']['name']);

        //                     echo "imagem salva";
                                
        //                     header("location: cadastro-imagem.php");
        //                     exit;
        //                 } else {
        //                         echo "Erro: Apelido já cadastrado ou falha no banco de dados.";
        //                 }
        //             } 
        //         }
        //     }
        ?>