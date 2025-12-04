<?php

// session_start();
// if(!isset($_SESSION['id'])){
//     header("Location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      type="text/css"
      href="../../public/assets/css/estilos_unificado.css"
    />
    <title>Modificações</title>
  </head>
  <body>
    <div class="cx-container">
      <div class="menu-lateral">
        <div class="inicio-logo">
          <div class="img-logo">
            <img src="../../public/assets/img/logo-circular.png" alt="" />
          </div>
        </div>
        <nav class="links">
          <a href="modprojetos.php">MODIFICAÇÕES</a>
          <a href="">AGENDA</a>
          <a>CONTA</a>
        </nav>

        <div class="saida">
          <img src="../../public/assets/img/sair.png" alt="" />
          <p>SAIR</p>
        </div>
      </div>

      <div class="cx-principal">
        <div class="pagina-principal">
          <div class="titulo">
            <h1>SEJA BEM-VINDA,</h1>
            <img src="../../public/assets/img/logo-nome.png" alt="" />
            <h1>!</h1>
          </div>
        </div>

        <div id="edicoes">
          <div id="ed-projetos" class="card">
            <a href="modprojetos.php">EDITAR PROJETOS</a>
          </div>

          <div id="ed-galeria" class="card">
            <a href="galeria.php">EDITAR GALERIA</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
