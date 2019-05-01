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
<h1>API não oficial para pesquisa de CEP e endereços</h1>
<p>Desenvolvido em php com host em XAMPP, pesquisando no site oficial dos correios (www.buscacep.correios.com.br)</p>

<h2>Consulta de CEP</h2>
<p>Envia-se o CEP ou endereço desejado pela url e é retornado os dados em uma tabela. Utilizar um host a sua escolha.</p>
<p>Exemplo de uso para cep:</p>
<pre>http://localhost/apiCep/view/index.php?cep=xxxxxxxx</pre>
<p>Exemplo de uso para endereço:</p>
<pre>http://localhost/apiCep/view/index.php?endereco=xxxxxxxx</pre>
<p>Exemplo de uso para endereço composto (separar com _):</p>
<pre>http://localhost/apiCep/view/index.php?endereco=enrereco_composto</pre>
<h2>Resultado:</h2>
";

if (!empty($result)) {
    echo "
        <style type='text/css'>
        .tg {border-collapse:collapse;border-spacing:0;margin:10px auto;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-baqh{text-align:center;vertical-align:top;}
        .tg .tg-baqh-title{font-weight: bold;}
        .tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}</style>
        <div class='tg-wrap'>";
    foreach ($result as $values) {
        echo "
                <table class='tg'>
                    <tr>
                        <th class='tg-baqh-title'>Localização</th>
                        <th class='tg-baqh-title'>Dados</th>
                    </tr>";
        foreach ($values as $key => $value) {
            echo "
                    <tr>
                        <td class='tg-baqh'>{$key}</td>
                        <td class='tg-baqh'>{$value}</td>
                    </tr>";
        }
        echo "</table>";
    }
    echo "</div>";
} else {
    echo "<h2>CEP/Endereço inválido!</h2>";
}
?>