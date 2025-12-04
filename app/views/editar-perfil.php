
<?php
require_once '../models/perfil.php';

// $host= "177.136.241.55";
// $user= "hostdeprojetos_dbsarah";
// $pass= "admin@sarahElizabeth";
// $port = "3128";
// $dbase = "hostdeprojetos_dbsarah";

$host = "localhost";
$user = "root";
$pass = "";
$dbase = "dbsarah";

$p = new Perfil($dbase, $host, $user, $pass);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Edição - Edição do perfil</title>
</head>
<body>

<?php
        if(isset($_POST['apelido'])){

            if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
                $id_upd = addslashes($_GET['id_up']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $telefone = addslashes($_POST['telefone']);
                $cep = addslashes($_POST['cep']);
                $rua = addslashes($_POST['rua']);
                $bairro = addslashes($_POST['bairro']);
                $numero = addslashes($_POST['numero']);
                if(!empty($email) && !empty($senha) && !empty($telefone) && !empty($cep) && !empty($bairro) && !empty($rua) && !empty($numero)){
                    $p->atualizarDados($id_upd, $email, $senha, $telefone, $cep, $bairro, $numero);
                    header("location: editar-perfil.php");
                }   
            // }else{
            //     $id_upd = addslashes($_GET['id_up']);
            //     $email = addslashes($_POST['email']);
            //     $senha = addslashes($_POST['senha']);
            //     $telefone = addslashes($_POST['telefone']);
            //     $cep = addslashes($_POST['cep']);
            //     $bairro = addslashes($_POST['bairro']);
            //     $numero = addslashes($_POST['numero']);
            //     if(!empty($email) && !empty($senha) && !empty($telefone) && !empty($cep) && !empty($beirro) && !empty($numero)){
            //         if(!$i->cadastrarDados($apelido, $tipo, $posicao, $endereco)){
            //         }
            //     }else{   
            //         echo "Preencha todos os campos";
            //     }
            }
        }
        ?>

        <?php
        if(isset($_GET['id_up'])){
            $id_update = addslashes($_GET['id_up']);
            $res = $p->buscarDadosEditar($id_update);
        }
        
        ?>

        <div class="pagina-principal">
            <div class="titulo">
                <h1>SEJA BEM-VINDA,</h1>
                <img src="" alt="">
            </div>
        </div>
    
        <div>
            <h1>PAINEL DE EDIÇÃO - EDIÇÃO DO PERFIL</h1>

            <form method="POST">
              <input type="email" name="email" placeholder="Digite seu e-mail" value="<?php if(isset($res)){echo $res['email'];}  ?>" required>

              <input type="password" name="senha" placeholder="Digite sua senha" value="<?php if(isset($res)){echo $res['senha'];}  ?>" required>

              <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" maxlength="15" value="<?php if(isset($res)){echo $res['telefone'];}  ?>" required>

              <input type="text" id="cep" name="cep" placeholder="Digite seu CEP" maxlength="9" value="<?php if(isset($res)){echo $res['cep'];}  ?>" required>

              <input type="text" name="bairro" placeholder="Digite seu bairro" value="<?php if(isset($res)){echo $res['bairro'];}  ?>" required>

              <input type="text" name="rua" placeholder="Digite o nome da rua" value="<?php if(isset($res)){echo $res['rua'];}  ?>" required>

              <input type="text" name="numero" placeholder="Número da residência" value="<?php if(isset($res)){echo $res['numero'];}  ?>" required>

                  <button type="submit" id="button-ed-proj" name="button-add-proj" value="salve">Salvar</button>
            </form>

            <a>VOLTAR</a>
            
        </div>    
</body>
<script>
  // Máscara de telefone (formato: (XX) XXXXX-XXXX)
  const telefone = document.getElementById('telefone');
  telefone.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
    if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos

    if (value.length > 10) {
      e.target.value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
    } else if (value.length > 6) {
      e.target.value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
    } else if (value.length > 2) {
      e.target.value = value.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
    } else {
      e.target.value = value.replace(/^(\d*)/, '($1');
    }
  });

  // Máscara de CEP (formato: 00000-000)
  const cep = document.getElementById('cep');
  cep.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 8) value = value.slice(0, 8);
    if (value.length > 5) {
      e.target.value = value.replace(/^(\d{5})(\d{0,3}).*/, '$1-$2');
    } else {
      e.target.value = value;
    }
  });
</script>
</html>