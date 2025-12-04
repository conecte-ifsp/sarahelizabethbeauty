<?php
require_once '../models/validar-login.php';
// senha CRIPTO76@26

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
    <title>Cadastro Sarah Elizabeth Beauty</title>
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <main class="container">

        <form class="login-box" method="POST">
            <h2 class="titulo">CADASTRO</h2>
            
            <div class="input-container">
                <input type="text" name="permissao" placeholder="" required>
            </div>

            <div class="input-container">
                <input type="email" name="email" placeholder="Digite seu email" required>
            </div>
            
            <div class="input-container">
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>

            <div class="input-container">
                <input type="nome" name="nome" placeholder="Digite seu nome" required>
            </div>

            <button type="submit" class="login-button">CADASTRO</button>
        </form>
    </main>

    <?php
        if(isset($_POST['email'])){
                $permissao = addslashes($_POST['permissao']);
                $email= addslashes($_POST['email']);
                $senha= addslashes($_POST['senha']);
                $nome= addslashes($_POST['nome']);
                $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
                if(!empty($permissao) && !empty($email) && !empty($senha) && !empty($nome)){
                    if($u->cadastrarDados($permissao, $email, $senha_criptografada, $nome)){
                        header("Location: login.php");
                    } else {
                     echo "Erro ao cadastrar. Tente novamente."; 
                    }
                    
                }
        }
?>

</body>
</html>