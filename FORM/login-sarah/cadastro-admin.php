<?php
require_once 'validar-login.php';
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
    <title>Login Sarah Elizabeth Beauty</title>
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
                <input type="text" name="permissao" value="" >
            </div>
            
            <div class="input-container">
                <input type="text" name="email" value="">
            </div>

            <div class="input-container">
                <input type="text" name="senha" value="" >
            </div>

            <div class="input-container">
                <input type="text" name="nome" value="" >
            </div>

            <button type="submit" class="login-button" value="">cadastrar</button>
        </form>

        <!-- <form class="login-box" method="POST">
            <h2 class="titulo">Login</h2>

            <div class="input-container">
                <input type="email" name="email" placeholder="Digite o seu e-mail" required>
            </div>

            <div class="input-container">
                <input type="password" name="senha" placeholder="Digite a sua senha" required>
            </div>

            <button type="submit" class="login-button">ENTRAR</button>
        </form> -->

        <a href="../views/cadastro.php" class="link-cadastro">Não possui cadastro? <span class="destaque">Clique aqui!</span></a>

    </main>

    <?php
        if(isset($_POST['email'])){
                $permissao = addslashes($_POST['permissao']);
                $email= addslashes($_POST['email']);
                $senha= addslashes($_POST['senha']);
                $nome= addslashes($_POST['nome']);
                $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
                if(!empty($permissao) && !empty($email) && !empty($senha) && !empty($nome)){
                    if($u->cadastrarDados($permissao, $email, $senha_criptografada, $nome)){ // Removida a negação `!`
                         echo "Cadastro realizado com sucesso!"; // Mensagem mais clara
                    } else {
                     echo "Erro ao cadastrar. Tente novamente."; // Adicione uma mensagem de erro em caso de falha
                    }
                    
}
    // trim() para remover espaços em branco e addslashes() para escapar caracteres
    // $email = trim(addslashes($_POST['email']));
    // $senha = trim(addslashes($_POST['senha']));

    // // 1. Chame a função cadastrar()
    // if($u->cadastrar($email, $senha)){
    //     // Se o cadastro foi BEM-SUCEDIDO
    //     echo "Usuário cadastrado com sucesso!";
        
    //     // CORREÇÃO: Redirecione para a página de LOGIN, não para a área restrita.
    //     header("Location: login.php?cadastro=sucesso"); 
    //     exit;
    //         } else {
    //             echo "Email e/ou senha incorretos!";
    //         }
        }
    
    ?>

</body>
</html>
