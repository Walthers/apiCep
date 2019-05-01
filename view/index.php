<?php
header('Content-Type: text/json; charset=UTF-8');
$cep = new \Api\Cep;
if (isset($_GET['cep'])) {
    $cep->buscarCep(preg_replace('/[^0-9]/', '', $_GET['cep']));
	die(json_encode($cep ? $cep[0] : null));
} else if (isset($_GET['endereco'])) {
    $cep->buscarCep($_GET['endereco']);
	die(json_encode($cep));
}
?>