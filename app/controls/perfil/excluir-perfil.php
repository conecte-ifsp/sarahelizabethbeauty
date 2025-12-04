<?php

require_once '../../core/DBConnection.php';
require_once '../../models/Imagem.php';

$db = new DBConnection();
$i = new Imagem($db->get_connection());

// Diretório das imagens
$upload_dir = __DIR__ . '/../uploads/';

// 1 — Verifica ID
if (!isset($_GET["id"])) {
    echo "ID não informado.";
    exit;
}

$id = (int)$_GET["id"];

// 2 — Busca TODOS os dados do registro
$dados = $i->buscarDadosEditar($id);

// Se não existir o registro
if (!$dados) {
    echo "Registro não encontrado.";
    exit;
}

// 3 — Lista de possíveis colunas de imagens
$colunas_imagens = [
    'endereco1',
    'endereco2',
    'endereco3',
    'endereco4',
    'endereco5'
];

// 4 — Apagar todos os arquivos físicos existentes
foreach ($colunas_imagens as $coluna) {

    if (!empty($dados[$coluna])) {

        $arquivo = $dados[$coluna];
        $caminho = $upload_dir . $arquivo;

        if (file_exists($caminho)) {
            unlink($caminho);
        }
    }
}

// 5 — Excluir do banco
$i->excluirDados($id);

// 6 — Redirecionar
header("Location: ../../views/editar-imagem.php");
exit;
