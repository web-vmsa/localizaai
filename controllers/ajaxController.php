<?php 
class ajaxController extends controller {

	// Função de realizar o registro da empresa
	public function index(){


		$dados = array();	

		// Verifica se os dados foram passados corretamente
		if (!empty('nome_empresa_registro') && !empty('cnpj') && !empty('servico') && !empty('retirada') && !empty('telefone') && !empty('email') && !empty('cep') && !empty('bairro') && !empty('cidade') && !empty('estado') && !empty('whatsapp')) {

			// Pega e salva os dados em vairáveis
			$nome = htmlspecialchars($_POST['nome_empresa_registro']);
			$cnpj = htmlspecialchars($_POST['cnpj']);
			$servico = htmlspecialchars($_POST['servico']);
			$retirada = htmlspecialchars($_POST['retirada']);
			$telefone = htmlspecialchars($_POST['telefone']);
			$email = htmlspecialchars($_POST['email']);
			$cep = htmlspecialchars($_POST['cep']);
			$bairro = htmlspecialchars($_POST['bairro']);
			$cidade = htmlspecialchars($_POST['cidade']);
			$estado = htmlspecialchars($_POST['estado']);
			$whatsapp = htmlspecialchars($_POST['whatsapp']);
			$facebook = htmlspecialchars($_POST['facebook']);
			$instagram = htmlspecialchars($_POST['instagram']);
			$site = htmlspecialchars($_POST['site']);
			$chave = md5($nome.$email);
			$status = 1;
			
			// Verifica se empresa esta registrada pelo nome e e-mail fornecido
			$check = new Empresas();
			$check->nome = $nome;
			$check->email = $email;
			$check = $check->check();

			if ($check == true) { // Retorna true se já está na base de dados
				
				$dados['resultado'] = "Esta empresa já está registrada :(";

			} else { // Realiza o registro caso não esteja na base de dados

				$formatosPermitidos = array("png", "jpeg", "jpg"); // Extensões permitidas
				$extensao = pathinfo($_FILES['arquivos']['name'],  PATHINFO_EXTENSION); // Pega a extensão

				if (in_array($extensao, $formatosPermitidos)) { 
			
					$pasta = "users/imgs/"; // Define a pasta de destino da imagem
					$temporario = $_FILES['arquivos']['tmp_name']; // Pega seu nome temporário no servidor
					$novoNome = uniqid().".$extensao"; // Define um novo nome a imagem

					move_uploaded_file($temporario, $pasta.$novoNome);

					$foto = $novoNome;	

					// Seta todos os dados e realiza o envio ao servidor
					$set = new Empresas();
					$set->nome = $nome;
					$set->cnpj = $cnpj;
					$set->foto = $foto;
					$set->servico = $servico;
					$set->retirada = $retirada;
					$set->telefone = $telefone;
					$set->email = $email;
					$set->cep = $cep;
					$set->bairro = $bairro;
					$set->cidade = $cidade;
					$set->estado = $estado;
					$set->whatsapp = $whatsapp;
					$set->facebook = $facebook;
					$set->instagram = $instagram;
					$set->site = $site;
					$set->chave = $chave;
					$set->status = $status;
					$set->set();

					// Retorna true se der tudo certo
					$dados['resultado'] = "* Por favor, verifique o seu e-mail para concluirmos o cadastro.";
				}
				
			}
			
		}

		$this->loadView('ajax', $dados);

	}

	// Abre a view para pegar os dados da empresa
	public function dados(){

		$dados = array();

		$this->loadView('dados', $dados);

	}

}