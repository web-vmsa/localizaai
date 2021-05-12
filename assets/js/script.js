$(document).ready(function(){

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

		var dados = $(this).serialize();

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

		if (nome_da_empresa == "" || cnpj == "" || servico == "Serviço oferecido" || retirada == "Modo de serviço" 
			|| telefone == "" || email == "" || cep == "" || bairro == "" || cidade == "" || estado == "" || whatsapp == "") {
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
		} else {
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
			$("#verifica_email").show();
		}

	});

	// Abrir modal da empresa
	$(".ler-mais").on("click", function(){

		$("#fundo_escuro_leia_mais").show();

	});

	// Fechar modal da empresa
	$("#fechar_modal_empresa").on("click", function(){

		$("#fundo_escuro_leia_mais").hide();

	});

});