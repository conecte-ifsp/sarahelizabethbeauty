<?php

require_once '../../core/DBConnection.php';
require_once '../../models/Imagem.php';

// $host= "177.136.241.55";
// $user= "hostdeprojetos_dbsarah";
// $pass= "admin@sarahElizabeth";
// $port = "3128";
// $dbase = "hostdeprojetos_dbsarah";


$p = new Imagem();

$upload_dir = __DIR__ . '/../../uploads/';

if (isset($_POST['id_img']) && isset($_POST['img']) && isset($_FILES['endereco'])) {

    $id_img         = $_POST['id_img'];
    $img            = $_POST['img'];
    $novo_endereco  = $_FILES['endereco']['name'];
    $velho_endereco = $_POST['velho_endereco'];

    if ($novo_endereco != '') {

        if (file_exists($upload_dir . $novo_endereco)) {
            echo "Esse nome já existe!";
            die();
        }

        $update_filename = $novo_endereco;

    } else {
        $update_filename = $velho_endereco;
    }

    if ($p->atualizarDadosImagem($id_img, $img, $update_filename)) {

        if (!empty($novo_endereco)) {
            move_uploaded_file($_FILES['endereco']['tmp_name'], $upload_dir . $novo_endereco);
            unlink($upload_dir . $velho_endereco);
        }

        header("Location: ../../views/modprojetos.php");
        exit;

    } else {
        echo "Erro ao atualizar";
    }
}
/* ======================================================
    2) EDITAR APENAS TEXTO (SEM IMAGENS)
   ====================================================== */
if (isset($_POST['projeto']) && isset($_POST['id_up'])) {

    $id      = (int)$_POST['id_up'];
    $projeto = addslashes($_POST['projeto']);
    $tipo    = addslashes($_POST['tipo']);
    $posicao = addslashes($_POST['posicao']);
    $descricao = addslashes($_POST['descricao']);

    if (!empty($projeto) && !empty($tipo) && !empty($posicao)) {

        if ($p->atualizarDadosTexto($id, $projeto, $tipo, $posicao, $descricao)){
                header("Location: ../../views/modprojetos.php");
                exit;
            };
    }

    echo "Preencha todos os campos do texto.";
    exit;
}

// ======================================================
// 2) CADASTRAR NOVOS DADOS (5 IMAGENS)
// ======================================================
if (isset($_POST['projeto']) && empty($_POST['id_up'])) {
    $projeto   = addslashes($_POST['projeto']);
    $tipo      = addslashes($_POST['tipo']);
    $posicao   = addslashes($_POST['posicao']);
    $descricao = addslashes($_POST['descricao']);

    // Pega as 5 imagens
    $enderecos = [];
    for ($i = 1; $i <= 5; $i++) {
        $enderecos[$i] = $_FILES["endereco$i"]['name'] ?? '';
    }

    // Verifica se todos os campos foram preenchidos
    $todosPreenchidos = !empty($projeto) && !empty($tipo) && !empty($posicao) && !empty($descricao);

    foreach ($enderecos as $nome) {
        if (empty($nome)) {
            $todosPreenchidos = false;
        }
    }

    if ($todosPreenchidos) {

        // Verifica se algum arquivo com o mesmo nome já existe
        $arquivosExistentes = [];
        foreach ($enderecos as $nome) {
            if (file_exists($upload_dir . $nome)) {
                $arquivosExistentes[] = $nome;
            }
        }

        if (!empty($arquivosExistentes)) {
            echo "Os seguintes arquivos já existem:<br>";
            foreach ($arquivosExistentes as $index => $arquivo) {
                echo ($index + 1) . " - $arquivo<br>";
            }
            exit;
        }

        // Cadastra no BD
        if ($p->cadastrarDados(
            $projeto,
            $tipo,
            $posicao,
            $enderecos[1],
            $enderecos[2],
            $enderecos[3],
            $enderecos[4],
            $enderecos[5],
            $descricao
        )) {

            // Move as 5 imagens
            for ($i = 1; $i <= 5; $i++) {
                move_uploaded_file($_FILES["endereco$i"]['tmp_name'], $upload_dir . $enderecos[$i]);
            }

            header("Location: ../../views/cadastro-imagem.php");
            exit;
        }

        echo "Erro: falha ao cadastrar os dados.";
        exit;
    }

    echo "Preencha todos os campos e envie as 5 imagens.";
    exit;
}


// ======================================================
// 4) EXCLUIR DADOS
// ======================================================

if (isset($_POST["id"])) {
    $id = (int)$_POST['id'];
    $p->excluirDados($id);
    header("Location: ../../views/modprojetos.php");
    exit;
}


?>