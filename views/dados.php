<?php
	
	// Pega o e-mail da empresa que foi passada
	$email_empresa = htmlspecialchars($_POST['email_empresa']);

	// Pega os dados pelo e-mail da empresa
	$data = new Empresas();
	$data->email = $email_empresa;
	$dados = $data->get();
	$array['nome'] = mb_strtoupper($dados['nome']);
	$array['foto'] = BASE_URL.'users/imgs/'.$dados['foto'];
	$array['tipo_servico'] = $dados['tipo_servico'];
	$array['tipo_retirada'] = $dados['tipo_retirada'];
	$array['telefone'] = $dados['telefone'];
	$array['email'] = $dados['email'];
	$array['whatsapp'] = $dados['whatsapp'];
	$array['facebook'] = $dados['facebook'];
	$array['instagram'] = $dados['instagram'];
	$array['site'] = $dados['site'];

	// Pega a localização pelo CEP
	$endereco = new Empresas();
	$endereco->cep = $dados['cep'];
	$endereco = $endereco->getCep();

	$array['rua'] = $endereco->logradouro;
	$array['bairro'] = $endereco->bairro;
	$array['cidade'] = $endereco->localidade;

	// Manda esses dados para o ajax
	echo json_encode($array);
?>