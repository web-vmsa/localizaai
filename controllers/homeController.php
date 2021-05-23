<?php 
class homeController extends controller {

	// Página inicial
	public function index(){
		
		$p = 1; // Número página

		$init = 0; // Início da contagem
		$max = $p*10; // Máximo de resultados

		$recentes = new Empresas();
		$recentes->status = 2;
		$recentes->init = $init;
		$recentes->max = $max;

		$all = new Empresas();
		$all->status = 2;
		$total = $all->All();

		$resultado = count($total); // Conta todas as empresas com status = 2

		$dados = array(
			'recentes' => $recentes->getAll(),
			'p' => $p,
			'resultado' => $resultado,
			'max' => $max
		);

		$this->loadTemplate('home', $dados);

	}

	// Resultados da pesquisa
	public function resultado(){

		$dados = array();

		$this->loadTemplate('resultado', $dados);

	}

	// Carrega mais empresas na home
	public function pagina($p){
		
		$init = 0; // Valor inicial
		$max = $p*10; // Máximo de resultados

		$recentes = new Empresas();
		$recentes->status = 2;
		$recentes->init = $init;
		$recentes->max = $max;

		$all = new Empresas();
		$all->status = 2;
		$total = $all->All(); 

		$resultado = count($total); // Conta o total de empresas com status = 2

		$dados = array(
			'recentes' => $recentes->getAll(),
			'p' => $p,
			'resultado' => $resultado,
			'max' => $max
		);

		$this->loadTemplate('home', $dados);

	}
	
}