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

        <div class="header">
            <span>Editar Imagem</span>
            <a href="../views/img-gerenciar.php"><button>Voltar</button></a>
        </div>

        <div class="DivForm">
            <?php
                if(isset($_GET['id'])){
                    $imagem_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $sql = "SELECT * FROM imagens WHERE id = '$imagem_id'";
                    $query = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($query)> 0){
                        $imagem = mysqli_fetch_array($query);

            ?>
            <form action="img-acao.php" method="POST">
                <input name="imagem_id"  type="hidden" value="<?=$imagem['id'] ?>">
                <div>
                    <label for="f-apelido">Apelido</label>
                    <input name="f-apelido" type="text" value="<?=$imagem['apelido'] ?>" required />
                </div>

                <div>
                    <label for="f-tipo">Tipo</label>
                    <input name="f-tipo" type="text" value="<?=$imagem['tipo'] ?>" required />
                </div>

                <div>
                    <label for="f-posicao">Posição</label>
                    <input name="f-posicao" type="number" value="<?=$imagem['posicao'] ?>" required />
                </div>

                <div>
                    <label for="f-endereco">Endereço</label>
                    <input name="f-endereco" type="text" value="<?=$imagem['endereco'] ?>" required />
                </div>

                <div><button name="img-editar" type="submit">Salvar</button></div>

            </form>
            <?php
                } else {
                    echo '<h5>Imagens não encontradas</h5>';
                }
            }
            ?>

        </div>
    </div>
    
</body>
</html>