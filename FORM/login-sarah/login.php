<?php
require_once 'validar-login.php';
// $host= "177.136.241.55";
// $user= "hostdeprojetos_dbsarah";
// $pass= "admin@sarahElizabeth";
// $port = "3128";
// $dbase = "hostdeprojetos_dbsarah";

$host= "localhost";
$user= "root";
$pass= "";
$dbase = "dbsarah";

$u = new Usuarios($dbase, $host, $user, $pass);

?>

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
        
        <form class="login-box" method="POST">
            <h2 class="titulo">Login</h2>

            <div class="input-container">
                <input type="email" name="email" placeholder="Digite o seu e-mail" required>
            </div>

            <div class="input-container">
                <input type="password" name="senha" placeholder="Digite a sua senha" required>
            </div>

            <button type="submit" class="login-button">ENTRAR</button>
        </form>

        <a href="../views/cadastro.php" class="link-cadastro">Não possui cadastro? <span class="destaque">Clique aqui!</span></a>

    </main>

    <?php
        if(isset($_POST['email'])){
                $email= addslashes($_POST['email']);
                $senha= addslashes($_POST['senha']);
                if(!empty($email) && !empty($senha)){
                    if($u->logar($email, $senha)){ 
                        header("Location: pagina-de-gerenciamento.php"); 
                    } else {
                        echo "Erro ao cadastrar. Tente novamente."; 
                    }
                    
                }
        }
    
    ?>

</body>
</html>
