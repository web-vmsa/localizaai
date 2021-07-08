<!DOCTYPE html>
<html>
<head>
	<!-- Primary Meta Tags -->
	<title>Procure Aki — Valorizando o comércio local</title>
	<meta name="title" content="Procure Aki — Valorizando o comércio local">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Nós somos uma opção para divulgação de empresas gratuitamente. Procure um negócio ou cadastre a sua empresa.">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo BASE_URL; ?>">
	<meta property="og:title" content="Procure Aki — Valorizando o comércio local">
	<meta property="og:description" content="Nós somos uma opção para divulgação de empresas gratuitamente. Procure um negócio ou cadastre a sua empresa.">
	<meta property="og:image" content="<?php echo BASE_URL; ?>assets/imgs/Procure Aki - Logotipo.png">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo BASE_URL; ?>">
	<meta property="twitter:title" content="Procure Aki — Valorizando o comércio local">
	<meta property="twitter:description" content="Nós somos uma opção para divulgação de empresas gratuitamente. Procure um negócio ou cadastre a sua empresa.">
	<meta property="twitter:image" content="<?php echo BASE_URL; ?>assets/imgs/Procure Aki - Logotipo.png">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">

	<!-- CSS: Video js -->
	<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />

	<!-- Favicon -->
	<link rel="icon" href="<?php echo BASE_URL; ?>assets/imgs/favicon.png" type="image/x-icon" />

	<!-- Fonte 1: Libre Baskerville -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

	<!-- Fonte 2:  -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
	<!-- Fundo escuro: leia mais -->
	<div class="fundo-escuro-leia-mais" id="fundo_escuro_leia_mais">
		
		<!-- Leia mais -->
		<div class="modal-empresa" id="modal_empresa">
			<div class="fechar-modal">
				<div class="fechar-modal-box" id="fechar_modal_empresa">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-x-mark-2">
				</div>
			</div>

			<div class="foto-empresa"><img src="https://www.tribunadeituverava.com.br/wp-content/uploads/2020/11/inss-previdencia-agencia-aposentadoria_chapecoonline.jpg"></div>

			<div class="dados-empresa">
				<div class="dados-empresa-left">
					<div class="modo-entrega">Delivery</div>
					<p>DULCE SABOR - Informática</p>
				</div>
				<div class="dados-empresa-right">
					<a id="website-empresa" href=""><div class="rede-social-empresa"><img src="https://www.freepnglogos.com/uploads/logo-website-png/logo-website-website-icon-with-png-and-vector-format-for-unlimited-22.png"></div></a>
					<a id="facebook-empresa" href=""><div class="rede-social-empresa"><img src="https://www.facebook.com/images/fb_icon_325x325.png"></div></a>
					<a id="instagram-empresa" href=""><div class="rede-social-empresa"><img src="https://www.instagram.com/static/images/ico/favicon-200.png/ab6eff595bb1.png"></div></a>
					<a id="whatsapp-empresa" href=""><div class="rede-social-empresa"><img src="https://lopescastelo.adv.br/wp-content/uploads/2019/10/WhatsApp.png"></div></a>
				</div>
			</div>

			<div class="div-info">
				<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-location-2.svg">
				<div class="info info-localizacao">
					<p>LOCALIZAÇÃO</p>
					<a href="">Rua Dr. Severino, Centro, Manaus</a>
				</div>
			</div>
			<div class="div-info">
				<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-phone-2.svg">
				<div class="info info-telefone">
					<p>TELEFONE</p>
					<a href="">(92) 99419-3639</a>
				</div>
			</div>
			<div class="div-info">
				<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-email-2.svg">
				<div class="info info-email">
					<p>E-MAIL</p>
					<a href="">suporte@empresa.com.br</a>
				</div>
			</div>
			<div class="website"><a href="">www.dulcesabor.com.br</a></div>
		</div>

	</div>

	<!-- Fundo escuro: registro -->
	<div class="fundo-escuro" id="fundo_escuro">
		
		<!-- Registro -->
		<div class="modal-registro" id="modal_registro">
			<div class="fechar-modal">
				<div class="fechar-modal-box" id="fechar_registro">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-x-mark-2">
				</div>
			</div>

			<div class="descricao" id="registro_modal">
				<h2>CADASTRO</h2>
				<p>Preencha os campos para cadastrar sua empresa</p>
			</div>

			<form method="POST" id="form_registro" enctype="multipart/form-data">
				<input type="text" name="nome_da_empresa" id="nome_empresa_registro" placeholder="Nome da empresa">
				<input type="text" name="cnpj" id="cnpj" placeholder="CNPJ">

				<div class="selects-registro">
					<select id="servico" name="servico">
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
					<select id="retirada" name="retirada">
						<option>Modo de serviço</option>
						<option value="Apenas delivery">Apenas delivery</option>
						<option value="Presencialmente">Presencialmente</option>
						<option value="Delivery & presencial">Delivery & presencial</option>
					</select>
				</div>

				<input type="text" name="telefone" id="telefone" placeholder="Telefone">
				<input type="email" name="email" id="email" placeholder="E-mail">
				<input type="text" name="cep" id="cep" placeholder="CEP">
				<input type="text" name="bairro" id="bairro" placeholder="Bairro">
				<input type="text" name="cidade" id="cidade" placeholder="Cidade">
				<input type="text" name="estado" id="estado" placeholder="Estado">
				<input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp">
				<input type="text" name="facebook" id="facebook" placeholder="Facebook">
				<input type="text" name="instagram" id="instagram" placeholder="Instagram">
				<input type="text" name="site" id="site" placeholder="Site">
				<label id="deixa_vermelho" for="foto_local">Foto do local</label>
				<input type="file" name="foto_local" id="foto_local" style="display: none;">
				<button type="submit">Registrar minha empresa</button>
			</form>

			<div class="verifica-email" id="verifica_email">
				<p>* Por favor, verifique o seu e-mail para completar seu registro</p>
			</div>
		</div>

	</div>

	<!-- Topo escuro -->
	<div class="topo-escuro" id="topo">
		
		<!-- Topo menu -->
		<div class="topo-menu">
			
			<div class="logotipo">
				<a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/logotipo-deitada.png"></a>
			</div>

			<div class="menu">
				<a href="mailto:suporte@procureaki.com">SUPORTE</a>
				<a href="https://www.instagram.com/procure__aki/">INSTAGRAM</a>
			</div>

			<div class="pesquisa-menu">
				<a href="#caixa_pesquisa">
					<p>PESQUISAR</p>
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-search-thin.svg">
				</a>
			</div>

		</div>

		<!-- Texto principal -->
		<div class="texto-principal">
			
			<div class="texto">
				<h2>Valorizando o comércio local</h2>
				<p>Nós somos uma opção para divulgação de empresas gratuitamente. Procure um negócio ou cadastre a sua empresa.</p>
				<div class="botao-registrar" id="abrir_registro">Registrar minha empresa</div>
			</div>

			<div class="imagem">
				<video id="my-video" class="video-js" controls poster="<?php echo BASE_URL; ?>assets/imgs/Como fazer o cadastro (Procure Aki).png" preload="auto" data-setup="{}">
					<source src="<?php echo BASE_URL; ?>assets/videos/Como fazer o cadastro.mp4" type="video/mp4">
				</video>
			</div>

		</div>

	</div>

	<!-- Corpo -->
	<?php $this->loadViewInTemplate($viewName, $viewData); ?>

	<!-- Navegação -->
	<div class="navegacao">
		<div class="navegacao-social">
			<a href="https://api.whatsapp.com/send?phone=92994193639"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-whatsapp-2"></a>
			<a href="https://www.instagram.com/procure__aki/"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-instagram-12"></a>
			<a href="mailto:suporte@procureaki.com">suporte@procureaki.com</a>
		</div>
		<div class="navegacao-menu">
			<a href="mailto:suporte@procureaki.com">Suporte</a>
			<a href="#caixa_pesquisa">Pesquisar</a>
		</div>
	</div>

	<!-- Rodapé -->
	<div class="rodape">
		<div class="direitos">
			<img src="<?php echo BASE_URL; ?>assets/imgs/icone.png"><p>PROCURE AKI | @2021 - TODOS OS DIREITOS RESERVADOS</p>
		</div>
		<a href="#topo">
			<div class="voltar-topo">
				<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-arrow-25">
			</div>
		</a>
	</div>

	<!-- Vídeo js script -->
	<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>