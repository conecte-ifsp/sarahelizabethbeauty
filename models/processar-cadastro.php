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

        <form class="login-box" action="../views/login.php" method="POST">
            <?php
                        include_once "../core/conn.php";
                        $email = $_POST["cadastro-mail"];
                        $senha = $_POST["cadastro-password"];
                        $select = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
                        $result = mysqli_query ($conn,$select);
                        if(mysqli_num_rows($result) > 0){
                            echo "Usuário já cadastrado!"; 
                            header ('location:../views/login.php');
                        } else {
                            $insert = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
                            $result = mysqli_query ($conn,$insert);
                            echo "Cadastro bem sucedido!";
                        }

                    ?>

            <button type="submit" class="login-button">ENTRAR</button>
        </form>

        <a href="../views/cadastro.php" class="link-cadastro">Não possui cadastro? <span class="destaque">Clique aqui!</span></a>

    </main>

</body>
</html>
