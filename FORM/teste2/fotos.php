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

        <form class="login-box" action="AuthUser.php" method="POST" enctype="multipart/form-data" >
            <h2 class="titulo">CADASTRO</h2>

            <?php
            
            if(isset($_SESSION['status']) && $_SESSION != ''){
                
            }

            ?>
            
            <div class="input-container">
                <input type="text" name="apelido" value="" >
            </div>
            
            <div class="input-container">
                <input type="text" name="tipo" value="">
            </div>

            <div class="input-container">
                <input type="text" name="posicao" value="" >
            </div>

            <div class="input-container">
                <input type="file" name="endereco" value="" >
            </div>

            <button type="submit" class="login-button" name="salve" value="salve">salve</button>
        </form>

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
                                    <a href="edit.php?id=<?php echo $row['id'];?>">editar</a>
                                </td>
                                <td>
                                    <form action="AuthUser.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
                                        <input type="hidden" name="endereco" value="<?php echo $row['endereco'];?>" >
                                        <button name="deletar">excluir</button>
                                    </form>
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


