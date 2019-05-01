<?php
require_once '../api/apiSearchCep.php';

$cep = new Cep();
if (isset($_GET['cep'])) {
    $result = $cep->buscarCep(preg_replace('/[^0-9]/', '', $_GET['cep']));
} else if (isset($_GET['endereco'])) {
    $result = $cep->buscarCep($_GET['endereco']);
}

header('Content-type: text/html; charset=UTF-8');
echo "
    <style type='text/css'>
    .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
    .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
    .tg .tg-baqh{text-align:center;vertical-align:top}
    @media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
    <div class='tg-wrap'>
        <table class='tg'>
            <tr>
                <th class='tg-baqh'>Localização</th>
                <th class='tg-baqh'>Dados</th>
            </tr>";
            foreach ($result as $values) {
                foreach ($values as $key => $value){
                    echo "<tr>
                        <td class='tg-baqh'>{$key}</td>
                        <td class='tg-baqh'>{$value}</td>
                    </tr>";
                }
            }
           echo "
        </table>
    </div>";
?>