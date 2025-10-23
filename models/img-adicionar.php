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
            <span>Adicionar Imagem</span>
            <a href="../views/img-gerenciar.php"><button>Voltar</button></a>
        </div>

        <div class="DivForm">
            <form action="img-acao.php" method="POST">
                <div>
                    <label for="f-apelido">Apelido</label>
                    <input name="f-apelido" type="text" required />
                </div>

                <div>
                    <label for="f-tipo">Tipo</label>
                    <input name="f-tipo" type="text" required />
                </div>

                <div>
                    <label for="f-posicao">Posição</label>
                    <input name="f-posicao" type="number" required />
                </div>

                <div>
                    <label for="f-endereco">Endereço</label>
                    <input name="f-endereco" type="text" required />
                </div>

                <div><button name="img-adicionar" type="submit">Salvar</button></div>

            </form>
        </div>
    </div>
    
</body>
</html>