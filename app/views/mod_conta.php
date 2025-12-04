<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Edição - Conta</title>
    <link rel="stylesheet" href="css/layout.css"> 
    <link rel="stylesheet" href="css/mod_conta.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="cx-container">
        <div class="menu-lateral">
            <div class="inicio-logo"><div class="img-logo"><img src="img/logo-circular.png" alt=""></div></div>
            
            <nav class="links">
                <a href="modprojetos.html">MODIFICAÇÕES</a>
                <a href="agenda.html">AGENDA</a>
                <a href="conta.html" class="active">CONTA</a>
            </nav>

            <div class="saida">
                <img src="img/sair.png" alt="">
                <p>SAIR</p>
            </div>
        </div>
        
        <div class="cx-principal">

            <div class="pagina-principal">
                <div class="titulo">
                    <h1>SEJA BEM-VINDA,</h1>
                    <img src="img/logo-nome.png" alt="">
                    <h1>!</h1>
                </div>
            </div>

            <div class="form-edicao-container">
                <div class="form-edicao-card">
                    <h3>PAINEL DE EDIÇÃO - PERFIL</h3>

                    <div class="foto-upload">
                        <img src="img/perfil.png" alt="Foto de Perfil" class="foto-atual">
                        <div class="icone-camera-overlay">
                            <i class="bi bi-camera-fill"></i>
                        </div>
                        <input type="file" id="upload-foto" style="display: none;">
                    </div>

                    <form action="#" method="POST">
                        <input type="email" name="" placeholder="Digite seu novo e-mail">
                        <input type="password" name="" placeholder="Digite sua nova senha">
                        <input type="password" name="" placeholder="Confirme sua nova senha">
                        <input type="tel" name="" placeholder="Digite seu novo telefone">
                        <input type="text" name="" placeholder="Digite seu novo CEP">
                        <input type="text" name="" placeholder="Digite o novo nome da sua rua">
                        <input type="text" name="" placeholder="Digite o novo bairro">
                        <input type="text" name="" placeholder="Digite o novo número">

                        <button type="submit" class="btn-alterar">ALTERAR</button>
                        <a href="conta.html" class="btn-voltar-form">VOLTAR</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>