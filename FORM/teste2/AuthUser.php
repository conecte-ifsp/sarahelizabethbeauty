<?php

$connection = mysqli_connect("localhost", "root", "", "dbsarah");

if(isset($_POST['salve'])){
    $apelido= $_POST['apelido'];
    $tipo= $_POST['tipo'];
    $posicao= $_POST['posicao'];
    $endereco= $_FILES['endereco']['name'];

    if(file_exists("uploads/".$_FILES['endereco']['name'])){
        $filename= $_FILES['endereco']['name'];
        echo $filename." ja existe";
    } else {
        $insert_image_query = "INSERT INTO imagem(apelido, tipo, posicao, endereco) VALUES ('$apelido', '$tipo', '$posicao', '$endereco')";
        $insert_image_query_run = mysqli_query($connection, $insert_image_query);

        if($insert_image_query_run){
            move_uploaded_file($_FILES['endereco']['tmp_name'], "uploads/".$_FILES['endereco']['name']);
            echo "imagem salva";
        }else{
            echo "imagem nao salva";
        }
    }
}

if(isset($_POST['edicao'])){
    $user_id =$_POST['id'];
    $apelido= $_POST['apelido'];
    $tipo= $_POST['tipo'];
    $posicao= $_POST['posicao'];
    $novo_endereco= $_FILES['endereco']['name'];
    $velho_endereco= $_POST['velho_endereco'];

    if($novo_endereco !=''){
        $update_filename = $novo_endereco;
        if(file_exists("uploads/".$_FILES['endereco']['name'])){
            $filename = $_FILES['endereco']['name'];
            echo "esse nome existe";
        }
    }else{
        $update_filename = $velho_endereco;
    }

    $update_image_query = "UPDATE imagem SET apelido='$apelido', tipo='$tipo', posicao='$posicao', endereco='$update_filename' WHERE id='$user_id'";
    $update_image_query_run = mysqli_query($connection, $update_image_query);

    if($update_image_query_run){
        if($_FILES['endereco']['name'] != ''){
            move_uploaded_file($_FILES['endereco']['tmp_name'], "uploads/".$_FILES['endereco']['name']);
            unlink("uploads/".$velho_endereco);
        }
        echo "editada a imagem";
    } else {
        echo "nao foi editada";
    }
}

if(isset($_POST['deletar'])){
    $id = $_POST['id'];
    $endereco = $_POST['endereco'];

    $delete_image_query = "DELETE FROM imagem WHERE id='$id'";
    $delete_image_query_run = mysqli_query($connection, $delete_image_query);

    if($delete_image_query_run){
        unlink("uploads/".$endereco);
        echo "imagem deletada";
    }else{
            echo "imagem nao deletada";
    }
}

?>