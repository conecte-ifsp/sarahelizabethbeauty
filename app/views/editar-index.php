<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/estilos_unificado.css"> 
        <link rel="stylesheet" href="../../public/assets/css/estilos_add_proj.css">
    <title>Painel de Edição - Edição da pagina inicial</title>
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
                <h1>PAINEL DE EDIÇÃO - EDIÇÃO DA PAGINA INICIAL</h1>
        
                <form method="POST" enctype="multipart/form-data" action="../controls/imagem/processar-imagem.php">
                    <input type="text" name="projeto" placeholder="Digite o nome da imagem" required>

                    <select name="posicao" required>
                        <option value="" disabled selected>Posição da imagem</option>
                        <option value="Imagem 1">Imagem 1</option>
                        <option value="Paralax 2">Paralax 2</option>
                        <option value="Imagem Sarah">Imagem Sarah</option>
                        <option>Nenhum</option>
                    </select>
                    
                    <textarea name="descricao" placeholder="Descrição da imagem para acessibilidade" rows="6" required></textarea>

                    <div id="img-add-proj">

                        <label class="upload-circle user-pic" for="file1">
                            +
                            <input type="file" name="endereco1" id="file1" accept="image/*">
                        </label>

                    
                    </div>
        
                    <button type="submit" class="btn-adicionar">ADICIONAR</button>
                    <a href="#" class="btn-voltar">VOLTAR</a>
                </form>
            </div>

        </div> 
    </div>
<script src="../../public/assets/js/script.js"></script> 
</body>
</html>