<?php 
class homeController extends controller {

	public function index(){

		$cidades = array('Selecione um estado');

		$dados = array(
			'cidades' => $cidades
		);

		$this->loadView('home', $dados);

	}

	public function estado($estado) {

		if ($estado == "") {
			
			$cidades = array('Selecione um estado');

		} else {

			if ($estado == "amazonas") {

				$cidades = array('Manaus', 'Parintis', 'Itacoatiara', 'Manacapuru', 'Coari', 'Tabatinga', 'Maués', 'Tefé', 'Manicoré', 'Humaitá', 'Iranduba', 'Lábrea', 'São Gabriel da Cachoeira', 'Benjamin Constant', 'Borba', 'Autazes', 'São Paulo de Olivença', 'Careiro', 'Nova Olinda do Norte', 'Presidente Figueiredo', 'Eirunepé', 'Boca do Acre', 'Rio Preto da Eva', 'Manaquiri', 'Barreirinha', 'Careiro da Várzea', 'Ipixuna', 'Codajás', 'Carauari', 'Barcelos', 'Novo Aripuanã', 'Santa Isabel do Rio Negro', 'Urucurituba', 'Apuí', 'Anori', 'Nhamundá', 'Santo Antônio do Içá', 'Atalaia do Norte', 'Envira', 'Beruri', 'Itapiranga', 'Silves', 'Itamarati', 'Japurá', 'Novo Airão', 'Boa Vista do Ramos', 'Pauini', 'Tonantis', 'Maraã', 'Tapauá', 'Fonte Boa', 'Guajará', 'Alvarães', 'Urucará', 'Canutama', 'Juruá', 'São Sebastião do Uatumã', 'Anamã', 'Jutaí', 'Uarini', 'Caapiranga', 'Amaturá');

			} else {

				$cidades = array('Selecione um estado');

			}

		}

		$dados = array('cidades' => $cidades);

		$this->loadView('home', $dados);

	}
	
}