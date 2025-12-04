<?php

require_once '../../core/DBConnection.php';
require_once '../../models/Imagem.php';

$db = new DBConnection();
$i = new Imagem($db->get_connection());
$dados = $i->buscarDados();

echo json_encode($dados);


?>