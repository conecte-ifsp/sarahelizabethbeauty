<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sarah Elizabeth Beauty</title>
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
</head>
<body>

    <main class="container">

        <form class="login-box" action="../models/validar-login.php" method="POST">
            <h2 class="titulo">Login</h2>

            <div class="input-container">
                <input type="email" name="login-mail" placeholder="Digite o seu e-mail" required>
            </div>

            <div class="input-container">
                <input type="password" name="login-password" placeholder="Digite a sua senha" required>
            </div>

            <button type="submit" class="login-button">ENTRAR</button>
        </form>

        <a href="../views/cadastro.php" class="link-cadastro">Não possui cadastro? <span class="destaque">Clique aqui!</span></a>

    </main>

</body>
</html>