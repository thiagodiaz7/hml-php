<?
$msgAgradecimento = false;
@ini_set('session.referer_check', 'TRUE');
if ($_POST["nome"] && $_POST["email"]) {
	
	foreach($_POST as $chave => $valor) {
		$_POST[$chave] = strip_tags($valor);
	}
	extract($_POST);
	
	$mensagem = nl2br($mensagem);
	
	if (!$pagina_referencia) {
		$pagina_referencia = "inicial";
	}
	
	if(isset($_SERVER['HTTP_REFERER'])) {
		$pagina_referencia2= $_SERVER['HTTP_REFERER'];
	}
	
	
}

$pg = "Contato";
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
		<div class="ne_map_contact_form_right_wrapper">
			<?if($id){?>
			<h3>Enviado com sucesso!</h3>
			<p>Seu e-mail foi enviado com sucesso para nossa equipe.</p>
			<p>Retornaremos o contato o mais breve possível.</p>
			<?}else{?>
			<p>Escolha uma das formas de contato conosco. Por telefone, whatsapp ou e-mail, estamos à sua disposição.</p>
			<!-- <p>Preencha o formulário abaixo com suas dúvidas, sugestões, solicitações que responderemos o mais breve possível.</p>
			<form id="formContato" action="<?= $url_total . $atual ?>/envia" method="POST">
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
							<textarea rows="6" name="mensagem" placeholder="Mensagem" class="require" required></textarea>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<div class="ne_map_form_input1">
							<button type="submit" class="submitForm">Enviar</button>
						</div>
					</div>
				</div>
			</form> -->
			<?}?>
		</div>
		
		<div class="ne_map_contact_form_left_wrapper">
			<div class="row">
				<div class="col-md-5 parte1">
					<h4 class="titleAzul">Telefone</h4>
					<p><img src="/images/i-tel.jpg" alt="" /> (44) 3041-3919</p>
					<h4 class="titleAzul">Whatsapp</h4>
					<p><img src="/images/i-whats.jpg" alt="" /> (44) 98812-3785</p>
					<h4 class="titleAzul">Horário de Atendimento</h4>
					<p>Seg à Sex das 8h às 18h</p>
					<h4 class="titleAzul">Endereço</h4>
					<div class="iconeContato">
						<img src="/images/i-endereco.jpg" alt="" /> 
						<address>Av. Joaquim Duarte Moleirinho, 2775 <br/>Sala 03 - Maringá - PR</address>
					</div>
				</div>
				<div class="col-md-7">
					<h4 class="titleAzul">E-mails</h4>
					<p><i class="fa fa-envelope"></i> <strong>Quer anunciar seus produtos e serviços?</strong> <br />
					<a href="mailto:publicidade@mundologistica.com.br">publicidade@mundologistica.com.br</a></p>
					<p><i class="fa fa-envelope"></i> <strong>É assinante e precisa de ajuda?</strong> <br />
					<a href="mailto:assinaturas@mundologistica.com.br">assinaturas@mundologistica.com.br</a></p>
					<p><i class="fa fa-envelope"></i> <strong>Assuntos diversos:</strong> <br />
					<a href="mailto:comercial@mundologistica.com.br">comercial@mundologistica.com.br</a></p>
					<p><i class="fa fa-envelope"></i> <strong>Pautas ou sugestões de notícias e artigos?</strong> <br />
					<a href="mailto:pauta@mundologistica.com.br">pauta@mundologistica.com.br</a></p>
				</div>
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
</div>



<div class="mapsGoogle">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.3628292986723!2d-51.946304885024375!3d-23.447373384739716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd775b405c453%3A0x1cf8d4b1a6e2222e!2sAv.+Joaquim+Duarte+Moleirinho%2C+2775+-+Jardim+Cidade+Moncoes%2C+Maring%C3%A1+-+PR%2C+87060-390!5e0!3m2!1spt-BR!2sbr!4v1562179929562!5m2!1spt-BR!2sbr" width="100%" height="280" frameborder="0" style="border:0; margin-bottom:-10px" allowfullscreen></iframe>
	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.333055968684!2d-51.948561885444924!3d-23.448447884739068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd74fdb61b763%3A0x7048c6a522528953!2sAv.+Arquiteto+Nildo+Ribeiro+da+Rocha%2C+3982+-+Jardim+Higien%C3%B3polis%2C+Maring%C3%A1+-+PR%2C+87060-390!5e0!3m2!1spt-BR!2sbr!4v1476815294872" width="100%" height="250" frameborder="0" style="border:0; border-top:thin solid #ccc" allowfullscreen></iframe> -->
</div>
<? include("_rodape.php"); ?>