<?php
    session_start();
    require '../core/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div> <?php include('../models/mensagem.php'); ?> </div>
        <div class="header">
            <span>Gerenciamento de Portifólio</span>
            <a href="../models/img-adicionar.php"><button>Incluir</button></a>
        </div>

        <div class="DivTable">
            <table>
                <thead>
                    <tr>
                        <th>Apelido</th>
                        <th>Tipo</th>
                        <th>Posição</th>
                        <th>Endereço</th>
                        <th class="">Editar</th>
                        <th class="">Excluir</th>
                    </tr>
                </thead>
                    <?php 
                        $sql = 'SELECT * FROM imagens';
                        $imagens = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($imagens)>0){
                            foreach($imagens as $imagem){
                    ?>
                    <tr>
                        <td><?= $imagem['apelido'] ?></td>
                        <td><?= $imagem['tipo'] ?></td>
                        <td><?= $imagem['posicao'] ?></td>
                        <td><?= $imagem['endereco'] ?></td>
                        <td><a href="../models/img-editar.php?id=<?= $imagem['id'] ?>"><button type="button">Edita</button></a></td>
                        <td><form action="../models/img-acao.php" method="post"><button type="submit" name="img-excluir" value="<?= $imagem['id']?>" >Excloi</button></form></td>
                    </tr>
                    <?php 
                            }
                        } else {
                            echo '<h5> Nenhuma imagem encontrada </h5>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>