<?php 

/*
* Classe para Empresas
*
* @package Site
* @author Victor <vmsa03@gmail.com>
*/
class Empresas extends model {

	public $id;
	public $nome;
	public $cnpj;
	public $foto;
	public $servico;
	public $retirada;
	public $telefone;
	public $email;
	public $cep;
	public $bairro;
	public $cidade;
	public $estado;
	public $whatsapp;
	public $facebook;
	public $instagram;
	public $site;
	public $chave;
	public $status;
	public $init;
	public $max;

	/*
	* Função de verificar se e-mail já está registrado
	*
	* Esta função vai verificar se a empresa já está cadastrada
	*
	* @param $nome varchar é o nome da empresa
	* @param $email varchar é o e-mail da empresa
	* @return true or false
	*/
	public function check(){

		$sql = "SELECT * FROM empresas WHERE nome = :nome AND email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $this->nome);
		$sql->bindValue(':email', $this->email);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}

	}

	/*
	* Função de adicionar/registrar uma empresa
	* 
	* Esta função vai dar um insert na base de dados na tabela empresas e adicionar a nova empresa
	*
	* @param $nome varchar é o nome da empresa
	* @param $cnpj varchar é o cnpj da empresa
	* @param $foto varchar é a foto da empresa
	* @param $tipo_servico varchar é o serviço oferecido pela empresa
	* @param $tipo_retirada varchar é o modo de retirada da empresa
	* @param $telefone varchar é o telefone da empresa
	* @param $email varchar é o email da empresa
	* @param $cep varchar é o cep da empresa
	* @param $bairro varchar é o bairro da empresa
	* @param $cidade varchar é a cidade da empresa
	* @param $estado varchar é o estado da empresa
	* @param $whatsapp varchar é o whatsapp da empresa
	* @param $facebook varchar é o facebook da empresa
	* @param $instagram varchar é o instagram da empresa
	* @param $site varchar é o site da empresa
	* @param $chave varchar é a chave de registro da empresa
	* @param $status tinyint é o status da empresa
	* @return true or false
	*/
	public function set(){

		$sql = "INSERT INTO empresas SET nome = :nome, cnpj = :cnpj, foto = :foto, tipo_servico = :servico, tipo_retirada = :retirada, telefone = :telefone, email = :email, cep = :cep, bairro = :bairro, cidade = :cidade, estado = :estado, whatsapp = :whatsapp, facebook = :facebook, instagram = :instagram, site = :site, chave = :chave, status = :status";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $this->nome);
		$sql->bindValue(':cnpj', $this->cnpj);
		$sql->bindValue(':foto', $this->foto);
		$sql->bindValue(':servico', $this->servico);
		$sql->bindValue(':retirada', $this->retirada);
		$sql->bindValue(':telefone', $this->telefone);
		$sql->bindValue(':email', $this->email);
		$sql->bindValue(':cep', $this->cep);
		$sql->bindValue(':bairro', $this->bairro);
		$sql->bindValue(':cidade', $this->cidade);
		$sql->bindValue(':estado', $this->estado);
		$sql->bindValue(':whatsapp', $this->whatsapp);
		$sql->bindValue(':facebook', $this->facebook);
		$sql->bindValue(':instagram', $this->instagram);
		$sql->bindValue(':site', $this->site);
		$sql->bindValue(':chave', $this->chave);
		$sql->bindValue(':status', $this->status);
		$sql->execute();

	}

	/*
	* Função de pegar as empresas cadastradas recentemente
	*
	* Esta função vai apenas pegar todas as empresas cadastradas recentemente na base de dados
	*
	* @param $status tinyint é o status das empresas, deve estar setado em 2
	* @param $init int é de onde ele começa a contar
	* @param $max int é até onde ele vai pegar
	* @return true or false
	*/
	public function getAll(){

		$sql = "SELECT * FROM empresas WHERE status = :status ORDER BY id DESC LIMIT :init,:max";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':status', $this->status);
		$sql->bindValue(':init', $this->init, PDO::PARAM_INT);
		$sql->bindValue(':max', $this->max, PDO::PARAM_INT);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de pegar o cep da empresa
	*
	* Esta função os dados da localidade de acordo com o CEP
	*
	* @param $cep varchar é o cep da empresa
	* @return true or false
	*/
	function getCep(){

	    $cep = preg_replace("/[^0-9]/", "", $this->cep);
	    $url = "http://viacep.com.br/ws/$cep/xml/";

	    $xml = simplexml_load_file($url);
	    return $xml;
	}

	/*
	* Função de pegar as empresas com base nos dados da pesquisa
	*
	* Esta função vai resgatar todas as empresas que correspondem um pouco a pesquisa do usuário
	*
	* @param $nome varchar é o nome da empresa
	* @param $servico varchar é o tipo de serviço da empresa
	* @param $status tinyint é o status da empresa
	* @param $init int é de onde ele começa a contar
	* @param $max int é até onde ele vai pegar
	* @return true or false
	*/
	public function findByNome($nome){

		$sql = "SELECT * FROM empresas WHERE nome LIKE '%$nome%' AND tipo_servico = :servico AND status = :status ORDER BY id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':servico', $this->servico);
		$sql->bindValue(':status', $this->status);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de pegar as empresas com base nos dados da pesquisa
	*
	* Esta função vai resgatar todas as empresas que correspondem um pouco a pesquisa do usuário
	*
	* @param $servico varchar é o tipo de serviço da empresa
	* @param $bairro varchar é o bairro da empresa
	* @param $cidade varchar é a cidade da empresa
	* @param $estado varchar é o estado da empresa
	* @param $status tinyint é o status da empresa
	* @return true or false
	*/
	public function findByLocation(){

		$sql = "SELECT * FROM empresas WHERE tipo_servico = :servico AND bairro = :bairro AND cidade = :cidade AND estado = :estado AND status = :status ORDER BY id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':servico', $this->servico);
		$sql->bindValue(':bairro', $this->bairro);
		$sql->bindValue(':cidade', $this->cidade);
		$sql->bindValue(':estado', $this->estado);
		$sql->bindValue(':status', $this->status);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de pegar as empresas com base nos dados da pesquisa
	*
	* Esta função vai resgatar todas as empresas que correspondem um pouco a pesquisa do usuário
	*
	* @param $nome varchar é o nome da empresa
	* @param $servico varchar é o tipo de serviço da empresa
	* @param $bairro varchar é o bairro da empresa
	* @param $cidade varchar é a cidade da empresa
	* @param $estado varchar é o estado da empresa
	* @param $status tinyint é o status da empresa
	* @return true or false
	*/
	public function find($nome){

		$sql = "SELECT * FROM empresas WHERE nome LIKE '%$nome%' AND tipo_servico = :servico AND bairro = :bairro AND cidade = :cidade AND estado = :estado AND status = :status ORDER BY id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':servico', $this->servico);
		$sql->bindValue(':bairro', $this->bairro);
		$sql->bindValue(':cidade', $this->cidade);
		$sql->bindValue(':estado', $this->estado);
		$sql->bindValue(':status', $this->status);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return false;
		}

	}

	/*
	* Função de pegar a empresa seleciona
	*
	* Esta função vai pegar os dados da empresa quando o usuário clicar no modal
	*
	* @param $email varchar é o email da empresa
	* @return true or false
	*/
	public function get(){

		$sql = "SELECT * FROM empresas WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $this->email);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}

	}

	/*
	* Função de filtrar um resultado específico
	*
	* Esta função vai resgatar a empresa da base de dados de acordo com todos os dados passados
	* na pesquisa
	*
	* @param $nome varchar é o nome da empresa
	* @param $servico varchar é o tipo de serviço da empresa
	* @param $bairro varchar é o bairro da empresa
	* @param $cidade varchar é a cidade da empresa
	* @param $estad0 varchar é o estado da empresa
	* @param $status tinyint é o status da empresa
	* @return true or false
	*/
	public function filter($nome){

		$sql = "SELECT * FROM empresas WHERE nome LIKE '%$nome%' AND tipo_servico = :servico AND bairro = :bairro AND cidade = :cidade AND estado = :estado AND status = :status";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':servico', $this->servico);
		$sql->bindValue(':bairro', $this->bairro);
		$sql->bindValue(':cidade', $this->cidade);
		$sql->bindValue(':estado', $this->estado);
		$sql->bindValue(':status', $this->status);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}

	}

}