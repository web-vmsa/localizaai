	<div class="corpo">
		
		<!-- Descrição -->
		<div class="descricao" id="caixa_pesquisa">
			<h2>PESQUISAR</h2>
			<p>Procure uma empresa em qualquer lugar do país</p>
		</div>

		<!-- Formulário de pesquisa -->
		<form name="form_pesquisa" class="formulario-de-pesquisa" method="GET" action="<?php echo BASE_URL; ?>home/resultado#resultados" autocomplete="off">
			<input id="nome_empresa" type="text" name="nome_empresa" placeholder="Nome da empresa">

			<div class="selects">
				<select id="servico_oferecido" name="servico_oferecido">
					<option>Serviço oferecido</option>
					<option value="Academia">Academia</option>
					<option value="Supermercados & mercearias">Supermercado e mercearia</option>
					<option value="Agricultura">Agricultura</option>
					<option value="Bancas & papelarias">Bancas e papelarias</option>
					<option value="Bancos & lotéricas">Bancos e lotéricas</option>
					<option value="Beleza">Beleza</option>
					<option value="Oficinas mecânicas">Oficinas mecânicas</option>
					<option value="Casa e decoração">Casa e decoração</option>
					<option value="Educação">Educação</option>
					<option value="Floricultura, paisagismo e jardinagem">Floricultura, paisagismo e jardinagem</option>
					<option value="Informática e tecnologia">Informática e tecnologia</option>
					<option value="Loja de carros">Loja de carros</option>
					<option value="Loja de departamentos">Loja de departamentos</option>
					<option value="Loja de roupas e calçados">Loja de roupas e calçados</option>
					<option value="Loja de tecidos e aviamento">Loja de tecidos e aviamento</option>
					<option value="Materiais de construção">Materiais de construção</option>
					<option value="Óticas, relojoarias, joalherias e perfumarias">Óticas, relojoarias, joalherias e perfumarias</option>
					<option value="Saúde e bem-estar">Saúde e bem-estar</option>
					<option value="Outros serviços">Outros serviços</option>
					<option value="Turismo">Turismo</option>
				</select>

				<input type="text" name="bairro" placeholder="Bairro">

				<input type="text" name="cidade" placeholder="Cidade">

				<input type="text" name="estado" placeholder="Estado">

				<input type="text" name="page" style="display: none;" value="1">

			</div>

			<button type="submit" onclick="return validar()">Pesquisar</button>
		</form>

		<!-- Resultados -->
		<div id="resultados" class="linha">
			<p>Resultados da pesquisa</p>
		</div>

		<?php 
			// Pega os dados por GET
			$nome_empresa = htmlspecialchars($_GET['nome_empresa']);
			$servico_oferecido = htmlspecialchars($_GET['servico_oferecido']);
			$bairro = htmlspecialchars($_GET['bairro']);
			$cidade = htmlspecialchars($_GET['cidade']);
			$estado = htmlspecialchars($_GET['estado']);

			$status = 2;
			$pagina = htmlspecialchars($_GET['page']); // Pega a página atual

			$init = 0; // Início da contagem
			$max = $pagina*10; // Máximo de resultados

			// Busca os resultados na base de dados
			$resultado = new Empresas();
			$resultado->servico = $servico_oferecido;
			$resultado->status = $status;
			$resultado->init = $init;
			$resultado->max = $max;
			$recentes = $resultado->find($nome_empresa);

			// Exibe e dá o loop caso exista resultados
			if($recentes == true):
				foreach($recentes as $dados):

				// Pega o cep da empresa
				$endereco = new Empresas();
				$endereco->cep = $dados['cep'];
				$endereco = $endereco->getCep();
		?>

		<!-- Resultado -->
		<div class="resultado">
			<div class="div-menor">
				<img src="<?php echo BASE_URL; ?>users/imgs/<?php echo $dados['foto']; ?>">
			</div>
			<div class="div-maior">
				<p><?php echo mb_strtoupper($dados['nome']); ?> - <?php echo $dados['tipo_servico']; ?></p>

				<div class="contato">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-location-2.svg">
					<a href="https://www.google.com/maps?q=<?php echo $endereco->logradouro; ?>, <?php echo $endereco->bairro; ?>, <?php echo $endereco->localidade; ?>"><?php echo $endereco->logradouro; ?>, <?php echo $endereco->bairro; ?>, <?php echo $endereco->localidade; ?></a>
				</div>
				<div class="contato link-escuro">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-phone-2.svg">
					<a href="https://api.whatsapp.com/send?phone=<?php echo $dados['whatsapp']; ?>"><?php echo $dados['telefone']; ?></a>
				</div>
				<div class="redes-sociais">
					<p>Redes sociais:</p>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $dados['whatsapp']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-whatsapp-1"></a>
					<a href="<?php echo $dados['facebook']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-facebook-5"></a>
					<a href="<?php echo $dados['instagram']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-instagram-11"></a>
					<a href="<?php echo $dados['site']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-globe-3"></a>
				</div>
			</div>
			<div class="div-menor">
				<div data-email="<?php echo $dados['email']; ?>" class="ler-mais">
					Leia mais >>>
				</div>
			</div>
		</div>

		<?php endforeach; ?>

		<?php else: // Caso Não exista resultados exibe erro ?> 

		<!-- Nenhum resultado -->
		<div class="sem-resultados">
			<h2>Nenhum resultado com base na busca</h2>
		</div>

		<?php endif; ?>


		<?php
			// Função que vai contar todos os resultados possíveis
			$resultado = new Empresas();
			$resultado->servico = $servico_oferecido;
			$resultado->status = $status;
			$recentes = $resultado->countResults($nome_empresa);

			if($recentes == true): // Se houver resultados mostra a barra de carregar mais
				$resultado = count($recentes); // Conta os resultados
		?>


		<?php if($max < $resultado): ?>
		<!-- Carregar mais -->
		<button data-next="<?php echo BASE_URL; ?>home/resultado?nome_empresa=<?php echo $nome_empresa; ?>&servico_oferecido=<?php echo $servico_oferecido; ?>&bairro=<?php echo $bairro; ?>&cidade=<?php echo $cidade; ?>&estado=<?php echo $estado; ?>&page=<?php echo $pagina+1; ?>#resultados" class="carregar-mais" id="mais-resultados">Carregar mais resultados</button>
		<?php endif; ?>

		<?php endif; ?>

	</div>