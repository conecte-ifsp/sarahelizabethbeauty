<?php
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);

session_start();
require '../core/conn.php';

if(isset($_POST['img-adicionar'])){
    $apelido = mysqli_real_escape_string($conn, trim($_POST['f-apelido']));
    $tipo = mysqli_real_escape_string($conn, trim($_POST['f-tipo'])) ;
    $posicao = mysqli_real_escape_string($conn, trim($_POST['f-posicao'])) ;
    $endereco = mysqli_real_escape_string($conn, trim($_POST['f-endereco'])) ;

    $sql = "INSERT INTO imagens (apelido, tipo, posicao, endereco) VALUES ('$apelido', '$tipo', '$posicao', '$endereco')";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensagem'] = 'Imagem adicionada com sucesso!';
        header('Location: ../views/img-gerenciar.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Falha ao adicionar imagem';
        header('Location: ../views/img-gerenciar.php');
        exit;
    }
    
}

if(isset($_POST['img-editar'])){
    $imagem_id = mysqli_real_escape_string($conn, $_POST['imagem_id']);

    $apelido = mysqli_real_escape_string($conn, trim($_POST['f-apelido']));
    $tipo = mysqli_real_escape_string($conn, trim($_POST['f-tipo'])) ;
    $posicao = mysqli_real_escape_string($conn, trim($_POST['f-posicao'])) ;
    $endereco = mysqli_real_escape_string($conn, trim($_POST['f-endereco'])) ;

    $sql = "UPDATE imagens SET apelido = '$apelido', tipo = '$tipo', posicao = '$posicao', endereco = '$endereco' WHERE id = '$imagem_id' ";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['mensagem'] = 'Imagem atualizada com sucesso!';
        header('Location: ../views/img-gerenciar.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Falha ao alterar imagem';
        header('Location: ../views/img-gerenciar.php');
        exit;
    }
    
}
if(isset($_POST['img-excluir'])){
    $imagem_id = mysqli_real_escape_string($conn, $_POST['img-excluir']);
    $sql = "DELETE FROM imagens WHERE id ='$imagem_id'";

    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)>0){
        $_SESSION['mensagem'] = 'Imagem apagada com sucesso!';
        header('Location: ../views/img-gerenciar.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Falha ao apagar imagem';
        header('Location: ../views/img-gerenciar.php');
        exit;
    }
}

?>