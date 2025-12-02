<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/estilos_unificado.css"> 
    <title>Modificações - Projeto</title>
</head>
<body>
    <div class="cx-container">

        <div class="menu-lateral">
            <div class="inicio-logo"><div class="img-logo"><img src="../../public/assets/img/logo-circular.png" alt=""></div></div>
            <nav class="links">
                <a>MODIFICAÇÕES</a>
                <a>AGENDA</a>
                <a>CONTA</a>
            </nav>
    
            <div class="saida">
                <img src="../../public/assets/img/sair.png" alt="">
                <p>SAIR</p>
            </div>
        </div>
    
        <div class="cx-principal">
            <div class="pagina-principal">
                <div class="titulo">
                    <h1>SEJA BEM-VINDA,</h1>
                    <img src="../../public/assets/img/logo-nome.png" alt="">
                    <h1>!</h1>
                </div>
            </div>

            <div id="projetos-container"></div>
        </div>

                </div>
            </div>
        </div> 
    </div>
    
<script>
fetch("../controls/imagem/listar-imagem.php")
    .then(r => r.json())
    .then(dados => {
        const container = document.getElementById("projetos-container");
        container.innerHTML = "";

        dados.forEach(item => {
            container.innerHTML += `
            <div id="projetos">
                <div class="projeto-nome">

                    <!-- IMAGEM PRINCIPAL -->
                    <div class="img-principal">
                        <a href="editar-imagem.php?id_img=${item.id}&img=1">
                        <img src="../uploads/${item.endereco1}" alt="">
                    </a>
                    </div>

                    <div class="dado-projeto">
                        <p class="tipo-projeto">${item.tipo}</p>
                        <h1>${item.projeto}</h1>
                        <p class="descricao">${item.descricao}</p>

                        <!-- BOTÃO EXCLUIR -->
                        <a href="../controls/imagem/excluir-imagem.php?id=${item.id}" class="btn-excluir">Excluir</a>

                        <!-- BOTÃO EDITAR -->
                        <a href="editar-texto.php?id_up=${item.id}" class="btn-excluir">Editar</a>


                    </div>

                    <!-- GALERIA DE IMAGENS DO PROJETO -->
                    <div class="img-projeto">
                        <a href="editar-imagem.php?id_img=${item.id}&img=2">
                            <img src="../uploads/${item.endereco2}" alt="">
                        </a>

                        <a href="editar-imagem.php?id_img=${item.id}&img=3">
                            <img src="../uploads/${item.endereco3}" alt="">
                        </a>

                        <a href="editar-imagem.php?id_img=${item.id}&img=4">
                            <img src="../uploads/${item.endereco4}" alt="">
                        </a>

                        <a href="editar-imagem.php?id_img=${item.id}&img=5">
                            <img src="../uploads/${item.endereco5}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            `;
        });
    })
    .catch(err => console.error("Erro ao carregar projetos:", err));
</script>


</body>
</html>
