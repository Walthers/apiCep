<?php
require_once '../api/apiSearchCep.php';

header("Content-type: text/plain; charset=UTF-8");

$cep = new Cep();
if (isset($_GET['cep'])) {
    $result = $cep->buscarCep(preg_replace('/[^0-9]/', '', $_GET['cep']));
	die(json_encode($result ? $result[0] : null));
} else if (isset($_GET['endereco'])) {
    $result = $cep->buscarCep($_GET['endereco']);
	die(json_encode($result));
}
?>