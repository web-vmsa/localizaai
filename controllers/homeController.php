<?php 
class homeController extends controller {

	public function index(){

		$recentes = new Empresas();
		$recentes->status = 2;

		$dados = array(
			'recentes' => $recentes->getAll()
		);

		$this->loadTemplate('home', $dados);

	}

	public function resultado(){

		$dados = array();

		$this->loadTemplate('resultado', $dados);

	}
	
}