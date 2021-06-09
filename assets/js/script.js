$(document).ready(function(){

	// Raiz do site
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
	  let id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Rolagem lenta para o formulário de pesquisa do rodapé
	$('.navegacao-menu a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  let id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Rolagem lenta para o topo
	$('.rodape a[href^="#"]').on('click', function(e) {
	  e.preventDefault();
	  let id = $(this).attr('href'),
	  targetOffset = $(id).offset().top;
	    
	  $('html, body').animate({ 
	    scrollTop: targetOffset - 100
	  }, 500);
	});

	// Abrir modal de registro
	$("#abrir_registro").on("click", function(){

		$("#fundo_escuro").fadeIn();

	});

	// Fechar modal de registro
	$("#fechar_registro").on("click", function(){

		$("#fundo_escuro").fadeOut();

	});

	// Abrir modal da empresa
	$(".ler-mais").on("click", function(){

		let identifier = $(this).data("email");

		$.ajax({
			type:'POST',
			url:raiz+'ajax/get',
			data:{identifier:identifier},
			dataType:'json',
			success:function(json){
				$(".foto-empresa img").attr('src', raiz+'users/imgs/'+json.result.foto);
				$(".dados-empresa p").html(json.result.nome.toUpperCase()+" - "+json.result.tipo_servico);
				$(".modo-entrega").html(json.result.tipo_retirada);
				$("#website-empresa").attr('href', json.result.site);
				$("#instagram-empresa").attr('href', json.result.instagram);
				$("#facebook-empresa").attr('href', json.result.facebook);
				$("#whatsapp-empresa").attr('href', 'https://api.whatsapp.com/send?phone='+json.result.whatsapp);
				$(".info-localizacao a").html(json.rua[0]+", "+json.bairro[0]+", "+json.cidade[0]);
				$(".info-localizacao a").attr('href', 'https://www.google.com/maps?q='+json.rua[0]+", "+json.bairro[0]+", "+json.cidade[0]);
				$(".info-telefone a").html(json.result.telefone);
				$(".info-telefone a").attr('href', 'https://api.whatsapp.com/send?phone='+json.result.whatsapp);
				$(".info-email a").html(json.result.email);
				$(".info-email a").attr('href', 'https://api.whatsapp.com/send?phone='+json.result.email);
				$(".website a").attr('href', json.result.site);
				if (json.result.site.includes("https")) {
					$(".website a").html(json.result.site.substring(8));
				} else {
					$(".website a").html(json.result.site.substring(7));
				}
			}
		});

		$("#fundo_escuro_leia_mais").fadeIn();

	});

	// Fechar modal da empresa
	$("#fechar_modal_empresa").on("click", function(){

		$("#fundo_escuro_leia_mais").fadeOut();

	});

	// Verifica se a barra de pesquisa está preenchida
	$("#enviar").on("click", function(){

        let servico_oferecido = form_pesquisa.servico_oferecido.value;

        if(servico_oferecido == "Serviço oferecido"){
            document.getElementById("servico_oferecido").style.border = "2px solid #FE0000";
            return false;
        }

	});

	// Valida formulário de registro
	$("#form_registro").submit(function(e){

		e.preventDefault();

		let registro_dados = new FormData();

		let arquivos = $('#foto_local')[0].files;

		let nome_da_empresa = $("#nome_empresa_registro").val();
		let cnpj = $("#cnpj").val();
		let servico = $("#servico").val();
		let retirada = $("#retirada").val();
		let telefone = $("#telefone").val();
		let email = $("#email").val();
		let cep = $("#cep").val();
		let bairro = $("#bairro").val();
		let cidade = $("#cidade").val();
		let estado = $("#estado").val();
		let whatsapp = $("#whatsapp").val();
		let foto_local = $("#foto_local").val();

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

});