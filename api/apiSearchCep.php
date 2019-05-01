<?php   
namespace Cep;

class Cep
{
    public function buscarCep($endereco){
		$curl = curl_init('http://www.buscacep.correios.com.br/sistemas/buscacep/resultadoBuscaCepEndereco.cfm');
		curl_setopt ($curl, CURLOPT_POST, 1);
		curl_setopt ($curl, CURLOPT_POSTFIELDS, http_build_query(array(
			'relaxation' =>	$endereco,
			'tipoCEP' =>	'ALL',
			'semelhante' =>	'N',
		)));
		curl_setopt ($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$html = curl_exec ($curl);
		\phpQuery::newDocumentHTML($html, $charset = 'utf-8');
		$pesquisa = array();
		foreach(pq('.tmptabela tr:not(:first-child)') as $pq_div){
			$dados = array();
			$dados['logradouro'] = pq('td:nth-child(1)', $pq_div)->text();
			$dados['bairro'] = pq('td:nth-child(2)', $pq_div)->text();
			$dados['cidade/uf'] = pq('td:nth-child(3)', $pq_div)->text();
			$dados['cep'] = pq('td:nth-child(4)', $pq_div)->text();
			$dados['cidade/uf'] = explode('/',$dados['cidade/uf']);
			$dados['cidade'] = trim($dados['cidade/uf'][0]);
			$dados['uf'] = trim($dados['cidade/uf'][1]);
			unset($dados['cidade/uf']);
			$pesquisa[] = $dados;
		}
		return $pesquisa;
	}
}