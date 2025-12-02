<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/estilos_unificado.css"> 
        <link rel="stylesheet" href="../../public/assets/css/estilos_add_proj.css"> 

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
        
                <form method="POST" enctype="multipart/form-data" action="../controls/imagem/cadastrar-imagem.php">
                    <input type="text" name="projeto" placeholder="Digite o nome do projeto" required>
                    
                    <select name="tipo" required>
                        <option value="" disabled selected>Tipo de projeto</option>
                        <option value="maquiagem">Maquiagem</option>
                        <option value="cabelo">Cabelo</option>
                        <option value="peles">Peles</option>
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
<script src="../../public/assets/js/script.js"></script> 
</body>
</html>