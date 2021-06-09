<?php 
class homeController extends controller {

	public function index(){

		// Pega as empresas recentemente cadastradas
		$empresasRecentes = new Empresas();
		$empresasRecentes->init = 0;
		$empresasRecentes->max = 10;
		$empresasRecentes->status = 2;

		$dados = array(
			'empresasRecentes' => $empresasRecentes->getAll()
		);

		$this->loadTemplate('home', $dados);

	}

	public function resultado(){

		// Exibe os resultados encontrados
		$dados = array();

		// Apenas pelo nome e tipo de serviço
		if (!empty($_POST['nome_empresa']) && !empty($_POST['servico_oferecido'])) {
			
			$nome = htmlspecialchars($_POST['nome_empresa']);
			$servico = htmlspecialchars($_POST['servico_oferecido']);
			$status = 2;

			$empresasResultados = new Empresas();
			$empresasResultados->servico = $servico;
			$empresasResultados->status = $status;

			$dados = array(
				'resultados' => $empresasResultados->findByNome($nome)
			);

		} elseif(!empty($_POST['servico_oferecido']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado'])) { // Por todos os dados exceto o nome

			$servico = htmlspecialchars($_POST['servico_oferecido']);
			$bairro = htmlspecialchars($_POST['bairro']);
			$cidade = htmlspecialchars($_POST['cidade']);
			$estado = htmlspecialchars($_POST['estado']);
			$status = 2;

			$empresasResultados = new Empresas();
			$empresasResultados->servico = $servico;
			$empresasResultados->bairro = $bairro;
			$empresasResultados->cidade = $cidade;
			$empresasResultados->estado = $estado;
			$empresasResultados->status = $status;

			$dados = array(
				'resultados' => $empresasResultados->findByLocation()
			);

		} elseif(!empty($_POST['nome_empresa']) && !empty($_POST['servico_oferecido']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado'])) { // Busca completa por um resultado

			$nome = htmlspecialchars($_POST['nome_empresa']);
			$servico = htmlspecialchars($_POST['servico_oferecido']);
			$bairro = htmlspecialchars($_POST['bairro']);
			$cidade = htmlspecialchars($_POST['cidade']);
			$estado = htmlspecialchars($_POST['estado']);
			$status = 2;

			$empresasResultados = new Empresas();
			$empresasResultados->servico = $servico;
			$empresasResultados->bairro = $bairro;
			$empresasResultados->cidade = $cidade;
			$empresasResultados->estado = $estado;
			$empresasResultados->status = $status;

			$dados = array(
				'resultados' => $empresasResultados->find($nome)
			);

		}

		$this->loadTemplate('resultado', $dados);

	}
	
}