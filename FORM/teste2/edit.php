<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Sarah Elizabeth Beauty</title>
</head>
<body>

    <?php
    
        $connection = mysqli_connect("localhost", "root", "", "dbsarah");
        $id =$_GET['id'];


        $fetch_image_query = "SELECT * FROM imagem WHERE id='$id'";
        $fetch_image_query_run = mysqli_query($connection, $fetch_image_query);

        if(mysqli_num_rows($fetch_image_query_run) > 0){
            foreach($fetch_image_query_run as $row){
                ?>

                <form class="login-box" action="AuthUser.php" method="POST" enctype="multipart/form-data" >
                    <h2 class="titulo">edita</h2>
                    
                    <div class="input-container">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
                    </div>

                    <div class="input-container">
                        <input type="text" name="apelido" value="<?php echo $row['apelido'];?>" >
                    </div>
                    
                    <div class="input-container">
                        <input type="text" name="tipo" value="<?php echo $row['tipo'];?>">
                    </div>

                    <div class="input-container">
                        <input type="text" name="posicao" value="<?php echo $row['posicao'];?>" >
                    </div>

                    <div class="input-container">
                        <input type="file" name="endereco" value="<?php echo $row['endereco'];?>" >
                    </div>

                    <div class="input-container">
                        <input type="hidden" name="velho_endereco" value="<?php echo $row['endereco'];?>" >
                        <img src="<?php echo "uploads/".$row['endereco'];?>" width=75px alt="">
                    </div>

                    <button type="submit" class="login-button" name="edicao" value="salve">salve</button>
                </form>

                <?php
            }
        }else{
            echo "nao existe";
        }

    ?>

    

        <a href="../views/login.php" class="link-cadastro">Já possui cadastro? <span class="destaque">Clique aqui!</span></a>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>apelido</th>
                    <th>tipo</th>
                    <th>posicao</th>
                    <th>endereco</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    $connection = mysqli_connect("localhost", "root", "", "dbsarah");

                    $fetch_image_query = "SELECT * FROM imagem";
                    $fetch_image_query_run = mysqli_query($connection, $fetch_image_query);

                    if(mysqli_num_rows($fetch_image_query_run) > 0){
                        foreach($fetch_image_query_run as $row){
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['apelido'];?></td>
                                <td><?php echo $row['tipo'];?></td>
                                <td><?php echo $row['posicao'];?></td>
                                <td>
                                    <img src="<?php echo "uploads/".$row['endereco'];?>" width=75px alt="imagem">
                                </td>
                                <td>
                                    <a href="edit.php">editar</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {

                        ?>
                        <tr>nada aq</tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
</body>
</html>


