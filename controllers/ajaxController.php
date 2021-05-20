<?php 
class ajaxController extends controller {

	public function index(){


		$dados = array();

		if (!empty('nome_empresa_registro') && !empty('cnpj') && !empty('servico') && !empty('retirada') && !empty('telefone') && !empty('email') && !empty('cep') && !empty('bairro') && !empty('cidade') && !empty('estado') && !empty('whatsapp')) {


			$nome = htmlspecialchars($_POST['nome_empresa_registro']);
			$cnpj = htmlspecialchars($_POST['cnpj']);
			$foto = $nome.".png";
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

			$mensagem = "Minha empresa é a".$nome.". Meu CNPJ é ".$cnpj.". Minha foto é ".$foto.".Meu serviço é ".$servico.". Pode-se retirar por ".$retirada.". Atendo pelo telefone ".$telefone." e pelo whatsapp ".$whatsapp.". Meu e-mail é ".$email.". Meu CEP é ".$cep.". Resido em ".$cidade.", estado do ".$estado." no bairro ".$bairro.". Minhas redes sociais são: instagram (".$instagram."), facebook (".$facebook.") e meu site é o ".$site.". Minha chave é a ".$chave." e meu status ".$status.". Estou esperando o resultado do meu registro.";

			$dados['resultado'] = $mensagem;
			
		}

		$this->loadView('ajax', $dados);

	}
}