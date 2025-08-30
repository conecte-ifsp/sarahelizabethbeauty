<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Sarah Elizabeth Beauty</title>
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <main class="container">

        <form class="login-box" action="processar-cadastro.php" method="POST">
            <h2 class="titulo">CADASTRO</h2>
            
            <div class="input-container">
                <input type="text" name="cadastro-nome" placeholder="Digite seu nome completo" required>
            </div>
            
            <div class="input-container">
                <input type="text" name="cadastro-apelido" placeholder="Digite seu apelido" required>
            </div>

            <div class="input-container">
                <input type="date" name="cadastro-data-nascimento" placeholder="Digite sua data de nascimento" required>
            </div>

            <button type="submit" class="login-button">PRÓXIMO</button>
        </form>

        <a href="../views/login.php" class="link-cadastro">Já possui cadastro? <span class="destaque">Clique aqui!</span></a>
    </main>

</body>
</html>