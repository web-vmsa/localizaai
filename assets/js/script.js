$(document).ready(function(){

	var environment = "development";

	if (environment == "development") {
		var raiz = "http://localhost/localizaai/";
	} else {
		var raiz = "http://localhost/localizaai/";
	}

	// Não exibi
	$("#fundo_escuro").hide();

	$("#fundo_escuro_leia_mais").hide();

	$("#verifica_email").hide();

	// Rolagem lenta para o formulário de pesquisa
	$('.pesquisa-menu a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  var id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Rolagem lenta para o formulário de pesquisa do rodapé
	$('.navegacao-menu a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  var id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Rolagem lenta para o topo
	$('.rodape a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  var id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Abrir modal de registro
	$("#abrir_registro").on("click", function(){

		$("#fundo_escuro").show();

	});

	// Fechar modal de registro
	$("#fechar_registro").on("click", function(){

		$("#fundo_escuro").hide();

	});

	// Valida formulário de registro
	$("#form_registro").submit(function(e){

		e.preventDefault();

		var registro_dados = new FormData();

		var arquivos = $('#foto_local')[0].files;

		var nome_da_empresa = $("#nome_empresa_registro").val();
		var cnpj = $("#cnpj").val();
		var servico = $("#servico").val();
		var retirada = $("#retirada").val();
		var telefone = $("#telefone").val();
		var email = $("#email").val();
		var cep = $("#cep").val();
		var bairro = $("#bairro").val();
		var cidade = $("#cidade").val();
		var estado = $("#estado").val();
		var whatsapp = $("#whatsapp").val();
		var foto_local = $("#foto_local").val();

		// Anexos
		registro_dados.append('nome_empresa_registro', $("#nome_empresa_registro").val());
		registro_dados.append('cnpj', $("#cnpj").val());
		registro_dados.append('servico', $("#servico").val());
		registro_dados.append('retirada', $("#retirada").val());
		registro_dados.append('telefone', $("#telefone").val());
		registro_dados.append('email', $("#email").val());
		registro_dados.append('cep', $("#cep").val());
		registro_dados.append('bairro', $("#bairro").val());
		registro_dados.append('cidade', $("#cidade").val());
		registro_dados.append('estado', $("#estado").val());
		registro_dados.append('whatsapp', $("#whatsapp").val());
		registro_dados.append('facebook', $("#facebook").val());
		registro_dados.append('instagram', $("#instagram").val());
		registro_dados.append('site', $("#site").val());
		registro_dados.append('arquivos', arquivos[0]);

		if (nome_da_empresa == "" || cnpj == "" || servico == "Serviço oferecido" || retirada == "Modo de serviço" 
			|| telefone == "" || email == "" || cep == "" || bairro == "" || cidade == "" || estado == "" || whatsapp == "" ||
			foto_local == "") {
			$("#nome_empresa_registro").css('border', '2px solid #FE0000');
			$("#cnpj").css('border', '2px solid #FE0000');
			$("#servico").css('border', '2px solid #FE0000');
			$("#retirada").css('border', '2px solid #FE0000');
			$("#telefone").css('border', '2px solid #FE0000');
			$("#email").css('border', '2px solid #FE0000');
			$("#cep").css('border', '2px solid #FE0000');
			$("#bairro").css('border', '2px solid #FE0000');
			$("#cidade").css('border', '2px solid #FE0000');
			$("#estado").css('border', '2px solid #FE0000');
			$("#whatsapp").css('border', '2px solid #FE0000');
			$("#deixa_vermelho").css('border', '2px solid #FE0000');
		} else {
			$.ajax({
				type:'POST',
				url:raiz+'ajax',
				data:registro_dados,
				contentType:false,
				processData:false,
				success:function(result){
					$("#form_registro input").val("");
					$("#nome_empresa_registro").css('border', '2px solid #F7DC5F');
					$("#cnpj").css('border', '2px solid #F7DC5F');
					$("#servico").css('border', '2px solid #F7DC5F');
					$("#retirada").css('border', '2px solid #F7DC5F');
					$("#telefone").css('border', '2px solid #F7DC5F');
					$("#email").css('border', '2px solid #F7DC5F');
					$("#cep").css('border', '2px solid #F7DC5F');
					$("#bairro").css('border', '2px solid #F7DC5F');
					$("#cidade").css('border', '2px solid #F7DC5F');
					$("#estado").css('border', '2px solid #F7DC5F');
					$("#whatsapp").css('border', '2px solid #F7DC5F');
					$("#deixa_vermelho").css('border', '2px solid #F7DC5F');
					$("#verifica_email").show();
					$("#verifica_email p").html(result);
				}
			});
		}

	});

	// Abrir modal da empresa
	$(".ler-mais").on("click", function(){

		$("#fundo_escuro_leia_mais").show();

		var email_empresa = $(this).data("email");

		$.ajax({
			url:raiz+'ajax/dados',
			type:'POST',
			data:{email_empresa:email_empresa},
			dataType:'json',
			success:function(resultado){

				// Modifica textos e links
				$(".dados-empresa-left p").html(resultado.nome+' - '+resultado.tipo_servico);
				$(".modo-entrega").html(resultado.tipo_retirada);
				$(".info-localizacao a").html(resultado.bairro+', '+resultado.cidade+', '+resultado.estado);
				$(".info-telefone a").html(resultado.telefone);
				$(".info-email a").html(resultado.email);
				$(".website a").html(resultado.site);

				// Modifica apenas os links
				$(".info-localizacao a").attr('href', 'https://www.google.com/maps?q='+resultado.bairro+', '+resultado.cidade+', '+resultado.estado);
				$(".info-telefone a").attr('href', 'https://api.whatsapp.com/send?phone='+resultado.telefone);
				$(".info-email a").attr('href', 'mailto:'+resultado.email);
				$('.website a').attr('href', resultado.site);

				$("#website-empresa").attr('href', resultado.site);
				$("#facebook-empresa").attr('href', resultado.facebook);
				$("#instagram-empresa").attr('href', instagram.facebook);
				$("#whatsapp-empresa").attr('href', 'https://api.whatsapp.com/send?phone='+resultado.telefone);

				$(".foto-empresa img").attr('src', resultado.foto);

			}
		});

	});

	// Fechar modal da empresa
	$("#fechar_modal_empresa").on("click", function(){

		$("#fundo_escuro_leia_mais").hide();

	});

	// Passa próxima página na home
	$("#mais-empresas").on("click", function(){

		let proxima = $(this).data("next");

		window.location.href=raiz+"home/pagina/"+proxima+"#resultados";

	});

	// Passa próxima página em resultados
	$("#mais-resultados").on("click", function(){

		let proxima = $(this).data("next");

		window.location.href=proxima;

	});

});