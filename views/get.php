<?php

$json = array();

if (!empty($_POST['identifier'])) {
	
	$email = htmlspecialchars($_POST['identifier']);

	$empresa = new Empresas();
	$empresa->email = $email;
	$dados = $empresa->get();

	$json['result'] = $dados;

	$getCep = new Empresas();
	$getCep->cep = $dados['cep'];
	$infoCep = $getCep->getCep();

	$json['rua'] = $infoCep->logradouro;
	$json['bairro'] = $infoCep->bairro;
	$json['cidade'] = $infoCep->localidade;

}

echo json_encode($json);