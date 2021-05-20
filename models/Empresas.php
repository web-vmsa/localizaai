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

}