<?
$msgAgradecimento = false;
if ($_POST["nome"] && $_POST["email"]) {
	
	
	foreach($_POST as $chave => $valor) {
		$_POST[$chave] = strip_tags($valor);
	}
	extract($_POST);
	
	$mensagem = nl2br($mensagem);
	
	if (!$pagina_referencia) {
		$pagina_referencia = "inicial";
	}
	
	
	/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
			$emailsender= 'comercial@mundologistica.com.br';
	} else {
			$emailsender = 'comercial@mundologistica.com.br';
			//    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
			// você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
	}
	 
	/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
	 
	// Passando os dados obtidos pelo formulário para as variáveis abaixo
	$nomeremetente     = $nome;
	$emailremetente    = $email;
	$emaildestinatario = 'publicidade@revistamundologistica.com.br';
	//$comcopiaoculta    = trim($_POST['comcopiaoculta']);
	$assunto           = "Anuncie ($nome)";
	
	$mensagem = nl2br($mensagem);
	
	/* Montando a mensagem a ser enviada no corpo do e-mail. */
	$mensagemHTML = "<p>Nome: $nome<br />E-mail: $email<br />Telefone: $telefone<br /><br />Mensagem:<br />$mensagem</p>";
	 
	 
	/* Montando o cabeçalho da mensagem */
	$headers = "MIME-Version: 1.1".$quebra_linha;
	$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
	// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
	$headers .= "From: ".$emailsender.$quebra_linha;
	$headers .= "Return-Path: " . $emailsender . $quebra_linha;
	// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
	// Se não houver um valor, o item não deverá ser especificado.
	if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
	if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
	$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
	// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
	 
	if (mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender)) {
	
	?>
	<script type="text/javascript">	
	window.location = '<?= $url_total . $atual; ?>/agradecimento';
	</script>
	<?
	}
	else {
		?>
		<script type="text/javascript">
		alert("Erro ao enviar e-mail. Por favor, tente novamente.");
		window.location = '<?= $url_total . $atual; ?>';
		</script>
		<?
	}
	exit();
}

$pg = "Anuncie";
$titulo = "$pg | $nmsite";
$mapaFrame = true;
include("_topo.php");
?>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="ne_busness_main_slider_wrapper ne_busness_main_slider_wrapper_lifestyle">
										<div class="ne_recent_heading_main_wrapper">
											<h1><?=$pg?></h1>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">

			<p>Você precisa anunciar seus produtos ou serviços para um público qualificado e tomador de decisão?</p>
			<p>A MundoLogística atinge um público extremamente qualificado e tomador de decisões em logística e supply chain.</p>
			<p>Hoje dispomos de diversos canais como a revista impressa e digital, portal e redes sociais. E temos opções de ações, para cada uma das necessidades: anúncios, banners, webinars, landing pages, etc...</p>
			<div class="row">
				<div class="col-md-4">
					<h2 class="txtCenter h2rounded">Portal e Redes Sociais</h2>
					<p>O portal da MundoLogística e nossas Redes Sociais atingem dezenas de milhares de profissionais. Utilize-se de todo o potencial das mídias digitais (publicando banners, palestras online e diversas outras opções de interação com um público especializado).</p>
				</div>
				<div class="col-md-4">
					<h2 class="txtCenter h2rounded">Revista Impressa e Digital</h2>
					<p>Apareça em mídia impressa e digital, especializada e de longa vida útil – consultada frequentemente por tomadores de decisões em logística e Supply Chain. Ideal para reforço da sua marca!</p>
					<p>Solicite o Mídia Kit e conheça melhor o perfil da revista, informações sobre distribuição, público, valores e formato dos anúncios.</p>
				</div>
				<div class="col-md-4">
					<h2 class="txtCenter h2rounded">Eventos</h2>
					<p>Os eventos promovidos pela MundoLogística seguem o mesmo perfil da revista: são eventos de alta qualidade técnica e especializados em temas relacionados à àrea, perfeitos para a sua empresa ter contato direto com o público decisor, que acompanha a revista.</p>
				</div>
			</div>
			
		</div>
		<div class="ne_map_contact_form_right_wrapper ne_map_contact_form_right_wrapper2">
			<p>Entre em contato conosco por telefone ou pelo email.</p>
			<!-- <p>Preencha o formulário abaixo com suas dúvidas, sugestões, solicitações que responderemos o mais breve possível.</p>
			<form id="form" action="<?= $url_total . $atual ?>/envia" method="POST">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<input type="text" name="nome" placeholder="Nome" class="require" required>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<input type="email" name="email" placeholder="E-mail" class="require" data-valid="email" data-error="E-mail tem que ser válido." required>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<input type="text" name="telefone" placeholder="Telefone" class="require" required>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<select name="area">
								<option value="">Área</option>
								<option value="Anúncio no Portal">Anúncio no Portal</option>
								<option value="Anúncio na Revista">Anúncio na Revista</option>
								<option value="Patrocinar Evento">Patrocinar Evento</option>
							</select>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<textarea rows="6" name="mensagem" placeholder="Mensagem" class="require" required></textarea>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<button type="button" class="submitForm">Enviar</button>
						</div>
					</div>
				</div>
			</form> -->
		</div>
		
		<div class="ne_map_contact_form_left_wrapper ne_map_contact_form_left_wrapper2">
			<div class="parte1">
				<h4 class="titleAzul">Telefone</h4>
				<p><img src="/images/i-tel.jpg" alt="" /> (44) 3041-3919</p>
				<h4 class="titleAzul">E-mail</h4>
				<p><i class="fa fa-envelope"></i> <strong><a href="mailto:publicidade@mundologistica.com.br">publicidade@mundologistica.com.br</a></strong> <br />
				</p>
			</div>
			<p>&nbsp;</p>
		</div>
		<div class="clearfix"></div>
	</div>
	</div>
</div>
</div>
</div>
</div>
</div>

<? include("_rodape.php"); ?>