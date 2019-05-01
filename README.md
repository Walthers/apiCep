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
