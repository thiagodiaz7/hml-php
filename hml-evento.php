<?
$pg = "Eventos Online";
if ($id) {
	$select = mysqli_query($con,"SELECT titulo FROM evento WHERE url = '$id'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo] | $nmsite";
		$canonical = $url_total . "$atual/$id";
	}
	else {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_total."$atual");  
		exit();	
	}
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_topo.php");
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>


	<? if ($id) {
		
		?>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-md-8">
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single" style="margin-top:0">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">
<?
		
		
		$sql = mysqli_query($con,"SELECT * FROM evento WHERE url = '$id' LIMIT 0,1");
		$d = mysqli_fetch_array($sql);
		print "
			<h1 class='tituloContent'>Evento Online</h1>
			<div class='text-center'><img class='img-responsive' src='/galeria/$d[img_banner]' alt='$d[titulo]' /></div>
			<div class='text-left'><h3 class='data'>".utf8_encode(strftime('%A, %d de %B de %Y', strtotime($d["dt_evento"]))).", das 8:20h às 12:00h da manhã</h3></div>
			<p>&nbsp;</p>
			";
			?>
			
			<?
					$hj = date("Y-m-d");
					if ($hj > $d["dt_evento"]) {
						print "<p>Este evento já foi realizado e está gravado para assinantes Premium!</p>
						<p><a href='".$d["link_restrito"]."' style='color:#006699'>Se você já é assinante Premium assista ao evento aqui.</a></p>
						<p><a href='revista/assinatura' style='color:#006699'>Caso ainda não seja assinante faça sua assinatura aqui!</a></p>
						<p>&nbsp;</p>\n";
					}
			?>
			
			<ul class="w3-navbar w3-black">
				<li><a class="tablink w3-red" onclick="goToByScroll('blocoEvento');"><strong>Evento</strong></a></li>
				<li><a class="tablink" onclick="goToByScroll('blocoAgenda');"><strong>Agenda</strong></a></li>
				<li><a class="tablink" onclick="goToByScroll('blocoComoFunciona');"><strong>Como Funciona</strong></a></li>
				<li><a class="tablink" onclick="goToByScroll('blocoPublico');"><strong>Público</strong></a></li>
				<li><a class="tablink" onclick="goToByScroll('blocoInscricoes');"><strong>Inscrições</strong></a></li>
			</ul>
			
			<h2 style="font-size:1.6em;margin-bottom:1em" id="blocoEvento">Sobre o Evento</h2>
			<?= $d["texto_inicial"]; ?>
			<hr />
			<h2 style="font-size:1.6em;margin-bottom:1em" id="blocoAgenda">Agenda</h2>
			<div class="row tabAgendaHeader">
				<div class="col-md-3">
					Horário
				</div>
				<div class="col-md-6">
					Palestra
				</div>
				<div class="col-md-3">
					Palestrante
				</div>
			</div>
			<div class="linhaBottom"></div>
			<?
			$sql2 = mysqli_query($con,"SELECT * FROM evento_agenda WHERE id_evento = '$d[id]' ORDER BY ordem ASC");
			while ($d2 = mysqli_fetch_array($sql2)) {
				print "<div class='row tabAgendaContent'>
				<div class='col-md-3'>$d2[horario]</div>
				<div class='col-md-6'>$d2[palestra]</div>
				<div class='col-md-3'>
					<div class='text-center'>\n";
				if ($d2["palestrante_img"]) {
					print "<img class='img-responsive' src='/galeria/$d2[palestrante_img]' alt='$d2[palestrante]' />";
				}
				print "$d2[palestrante]
					</div>
				</div>
				</div>
				<div class='linhaBottom'></div>";
			}
			?>
			<h2 style="font-size:1.6em;margin:1em 0" id="blocoComoFunciona">Como Funciona</h2>
			<?= $d["como_funciona"]; ?>
			<hr />
			<h2 style="font-size:1.6em;margin-bottom:1em" id="blocoPublico">Quem deve assistir o evento?</h2>
			<?= $d["publico_alvo"]; ?>
			<hr />
			
			<h2 style="font-size:1.6em;margin-bottom:1em" id="blocoInscricoes">Inscrições</h2>
			<?
			$hj = date("Y-m-d");
			if ($hj > $d["dt_evento"]) {
				print "<p style='color:#c00'>Este evento já foi realizado e não está mais disponível para compra!</p>
				<p>Ele está diponível, em formato gravado, aos assinantes PREMIUM.</p>
				<p>Caso já seja assinante, acesse a área de assinantes!</p>
				<p><a href='revista/assinatura' style='color:#006699'>Caso ainda não seja assinante faça sua assinatura aqui!</a></p>
				<p>&nbsp;</p>\n";
			} else {
			?>
					<h3>Valor da Inscrição</h3>
					<p align="center">Este evento é gratuito para assinantes PREMIUM! Se você é PREMIUM solicite sua inscrição pelo e-mail eventos@mundologistica.com.br<BR><BR>
					<a href='revista/assinatura' style='color:#006699'>Caso ainda não seja assinante faça sua assinatura aqui!</a><BR><BR>
					<strong>Para adquirir somente o evento seguem informações:</strong></p>
						<p>&nbsp;</p>
					<div class="text-center">
						<div class="row tableEW">
							<div class="col-md-5 col-md-offset-1 text-left">
								<strong>Data</strong>
							</div>
							<div class="col-md-5 text-left">
								<strong>Valor</strong>
							</div>
						</div>
						<div class="row tableEW" style='border-bottom:1px solic #ccc'>
							<div class="col-md-5 col-md-offset-1 text-left">
								Pagamentos até <?= formataData($d["dt_pgto1"],'output'); ?>
							</div>
							<div class="col-md-5 text-left">
								<strong>R$ <?= number_format($d["valor1"],2,",","."); ?></strong>
							</div>
						</div>
						<div class="row" style='border-bottom:1px solic #ccc'>
							<div class="col-md-5 col-md-offset-1 text-left">
								Pagamentos até <?= formataData($d["dt_pgto2"],'output'); ?>
							</div>
							<div class="col-md-5 text-left">
								<strong>R$ <?= number_format($d["valor2"],2,",","."); ?></strong>
							</div>
						</div>
					</div>
					<div align="right"><BR>Pagamento à vista no boleto ou em até 3x no cartão</div>
				<form class="form-horizontal form2" id="form" name="dadosMJ" onSubmit="return checa_formulario();" action="https://revistamundologistic.websiteseguro.com/eventoOLForm.jsp" method="POST" accept-charset="ISO-8859-1" >
					<div class="row">
						<div class="col-md-8">
							<h2>Seus dados</h2>
							<div class="control-group">
								<label class="control-label">Nome:</label><input type="text" name="nome" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">E-mail:</label><input type="text" name="email" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">Sexo*:</label>
								<div class="clearfix"></div>
								<div class="text-left">
									<input type="radio" name="sexo" id="M" value="M" checked />
									Masculino 
									<input type="radio" name="sexo" id="F" value="F" />
									Feminino
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">CPF* (só números):</label><input type="text" name="cpf" class="input-block-level" maxlength="11" onkeypress='return SomenteNumero(event)'/>
							</div>
							<div class="clearfix"></div>
							<div class="control-group">
								<label class="control-label">Telefone:</label><input type="text" name="telefoneRes" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">Endereço*:</label><input type="text" name="endereco" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">Cidade*:</label><input type="text" name="cidade" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">Estado*:</label>
								<select name="estado" class="input-block-level"> 
								<option value="0">Selecione seu estado</option> 
								<option value="AC">Acre</option> 
								<option value="AL">Alagoas</option> 
								<option value="AP">Amapá</option> 
								<option value="AM">Amazonas</option> 
								<option value="BA">Bahia</option> 
								<option value="CE">Ceará</option> 
								<option value="DF">Distrito Federal</option> 
								<option value="ES">Espirito Santo</option> 
								<option value="GO">Goias</option> 
								<option value="MA">Maranhão</option> 
								<option value="MT">Mato Grosso</option> 
								<option value="MS">Mato Grosso do Sul</option> 
								<option value="MG">Minas Gerais</option> 
								<option value="PA">Pará</option> 
								<option value="PB">Paraiba</option> 
								<option value="PR">Paraná</option> 
								<option value="PE">Pernambuco</option> 
								<option value="PI">Piauí</option> 
								<option value="RJ">Rio de Janeiro</option> 
								<option value="RN">Rio Grande do Norte</option> 
								<option value="RS">Rio Grande do Sul</option> 
								<option value="RO">Rondônia</option> 
								<option value="RR">Roraima</option> 
								<option value="SC">Santa Catarina</option> 
								<option value="SP">São Paulo</option> 
								<option value="SE">Sergipe</option> 
								<option value="TO">Tocantins</option> 
								</select>					
							</div>
							<div class="control-group">
								<label class="control-label">CEP* (só números):</label><input type="text" name="cep" class="input-block-level" maxlength="8" onkeypress='return SomenteNumero(event)'/>
							</div>
							<div class="control-group">
								<label class="control-label">Empresa:</label><input type="text" name="empresa" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">CNPJ (só números):</label><input type="text" name="cnpj" class="input-block-level" maxlength="14" onkeypress='return SomenteNumero(event)'/>
							</div>
							<div class="control-group">
								<label class="control-label">IE (só números):</label><input type="text" name="ie" class="input-block-level" />
							</div>
							<div class="control-group">
								<label class="control-label">Cargo*:</label>
								<select name="cargo" class="input-block-level">
									<option selected value="selecione">Selecione o cargo</option>
									<option value="Presidente">Presidente</option>
									<option value="Diretor">Diretor</option>
									<option value="Gerente">Gerente</option>
									<option value="Supervisor">Supervisor</option>
									<option value="Coordenador">Coordenador</option>
									<option value="Analista">Analista</option>
									<option value="Assistente">Assistente</option>
									<option value="Comprador">Comprador</option>
									<option value="Consultor">Consultor</option>
									<option value="Professor/Instrutor">Professor/Instrutor</option>
									<option value="Estudante">Estudante</option>
									<option value="Outro">Outro</option>
								  </select>       
							</div>
							<div class="control-group">
								<label class="control-label">Soube do evento por*:</label>
								<select name="soube" class="input-block-level"> 
									<option selected value="Amigo">Amigo</option> 
									<option value="Banca de Revistas">Banca de Revistas</option> 
									<option value="Site">Site</option> 
									<option value="Livraria">Livraria</option> 
									<option value="Outro">Outro</option> 
								</select>
							</div>
							<p class="text-center">Clique em "Não sou um robô"</p>
							<div class="text-center" style="margin:10px 0"><div class="g-recaptcha" data-sitekey="6LfF5iMTAAAAAPnSc_a_vqY8CFJL8lcunazg64HS" style="display:inline-block"></div></div>
							<div class="text-center"><button id="submit" class="button">Fazer minha inscrição!</button></div>

						</div>
						<div class="span4">
							<h2>Forma de pagamento</h2>
							<div class="blockInput">
								<input type="radio" value="B" checked name="formaPgto" /> <img class='img-responsive' src="images/__boleton.jpg" alt="" /> qualquer banco
							</div>
							<div class="blockInput">
								<input type="radio" value="V" name="formaPgto" /> <img class='img-responsive' src="images/__visan.jpg" alt="" /> Visa
							</div>
							<div class="blockInput">
								<input type="radio" value="M" name="formaPgto" /> <img class='img-responsive' src="images/__mastern.jpg" alt="" /> Master
							</div>
							<div class="blockInput">
								<input type="radio" value="D" name="formaPgto" /> <img class='img-responsive' src="images/__dinersn.jpg" alt="" /> Diners
							</div>
							<div class="blockInput">
								<input type="radio" value="A" name="formaPgto" /> <img class='img-responsive' src="images/_amexn.gif" alt="" /> Amex
							</div>
							<div class="blockInput">
								<input type="radio" value="E" name="formaPgto" /> <img class='img-responsive' src="images/__elo.jpg" alt="" /> ELO
							</div>
							<div class="blockInput">
								<input type="radio" value="H" name="formaPgto" /> <img class='img-responsive' src="images/__hipern.jpg">Hiper<BR>        
							</div>
							
							<input type="hidden" name="valor" id="valor" value="0000180.00">
							
							<p>&nbsp;</p>
						</div>
					</div>
				</form>
					<? } ?> <!-- final do else caso já esteja encerrado a data de inscrição no evento -->
				
				<div class="clearfix"></div>
		
			<?= $d["inscricao_texto"]; ?>
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<?
			
			?>
	
		</div>
		</div>
		</div>
	</div>
	<?
	print "
	<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper' style='margin-top:0'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Publicidade</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>\n";
					$b = new banners();
					$b->bannersLaterais($con);
			print "
			</div>
		</div>
	</div>
	
	\n";
	?>
	
	</div>
</div>
</div>
</div>
</div>
</div>
<?
		
		
		
		
	}
	
	else { // Index
	
?>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-md-8">
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
<?								
	
		$sql = mysqli_query($con,"SELECT titulo, img_banner, url FROM evento ORDER BY dt_evento DESC");
		if (mysqli_num_rows($sql)) {
			while ($d = mysqli_fetch_array($sql)) {
				print "<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
					<div class='text-left'><img class='img-responsive' src='/galeria/$d[img_banner]' alt='$d[titulo]' /></div>
				</a>
				<div class='text-center'><div class='bgSombra'></div></div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				\n";
			}
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		
		?>
	
		</div>
		</div>
		</div>
	</div>
	<?
	print "
	<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper' style='margin-top:0'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Publicidade</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>\n";
					$b = new banners();
					$b->bannersLaterais($con);
			print "
			</div>
		</div>
	</div>
	
	\n";
	?>
	
	</div>
</div>
</div>
</div>
</div>
</div>
<?
		
		
	}// Index
	?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script src="js/valida_cpf_cnpj.js"></script>

<script language="javascript"> 
	
	function SomenteNumero(e){
		var tecla=(window.event)?event.keyCode:e.which;   
		if((tecla>47 && tecla<58)) return true;
		else{
			if (tecla==8 || tecla==0) return true;
		else  return false;
		}
	}
	
	
	function checa_formulario(){


		//validar nome
		if (document.dadosMJ.nome.value == ""){
			alert("O campo nome deve ser preenchido!");
			document.dadosMJ.nome.focus();
			return false;
		}
		//validar email
		if (document.dadosMJ.email.value == ""){
			alert("O campo email deve ser preenchido!");
			document.dadosMJ.emaill.focus();
			return false;
		}
		//validar cpf
		if (!valida_cpf_cnpj(document.dadosMJ.cpf.value))
		{
		//if (document.dadosMJ.cpf.value == ""){
			alert("O campo cpf/cnpj é inválido!");
			document.dadosMJ.cpf.focus();
			return false;
		}
		//validar telefone
		if (document.dadosMJ.telefoneRes.value == ""){
			alert("O campo telefone deve ser preenchido!");
			document.dadosMJ.telefoneRes.focus();
			return false;
		}
		//validar endereco
		if (document.dadosMJ.endereco.value == ""){
			alert("O campo endereço deve ser preenchido!");
			document.dadosMJ.endereco.focus();
			return false;
		}
		//validar cidade
		if (document.dadosMJ.cidade.value == ""){
			alert("O campo cidade deve ser preenchido!");
			document.dadosMJ.cidade.focus();
			return false;
		}
		//validar cep
		if (document.dadosMJ.cep.value == ""){
			alert("O campo CEP deve ser preenchido!");
			document.dadosMJ.cep.focus();
			return false;
		}
		if (isNaN(document.dadosMJ.cep.value)){
			alert("O campo CEP deve conter somente números!");
			document.dadosMJ.cep.focus();
			return false;
		}				
		//validar estado
		if (document.dadosMJ.estado.value == "0"){
			alert("O campo Estado deve ser preenchido!");
			document.dadosMJ.cep.focus();
			return false;
		}
		if (document.dadosMJ.cargo.value == "selecione"){
			alert("O campo Cargo deve ser preenchido!");
			document.dadosMJ.cargo.focus();
			return false;
		}

		
		var TOKEN = 'f44ad08e5fd20312485f516a3a99393c'; 

		var form = $('#form');
		var inputNome = form.find('input[name="nome"]');
		var inputEmail = form.find('input[name="email"]');
		var inputTelefoneRes = form.find('input[name="telefoneRes"]');
		var inputCidade = form.find('input[name="cidade"]');
		var inputEstado = form.find('select[name="estado"]');
		var inputFormaPgto = form.find('input[name="formaPgto"]:checked');
		var inputCargo = form.find('select[name="cargo"]');

		  var data_array = [
			{ name: 'email', value: inputEmail.val() },
			{ name: 'identificador', value: 'Evento Op Logísticas Inovadoras' },
			{ name: 'nome', value: inputNome.val() },
			{ name: 'telefone', value: inputTelefoneRes.val() },
			{ name: 'cidade', value: inputCidade.val() },
			{ name: 'estado', value: inputEstado.val() },
			{ name: 'CargoMundoLogistica', value: inputCargo.val() },
			{ name: 'Forma de Pagamento', value: inputFormaPgto.val() },
			{ name: 'token_rdstation', value: TOKEN }
		  ];

        RdIntegration.post(data_array);

		
		
		
		return document.dadosMJ.submit();
	}
	
	
	</script>

<?
include("_rodape.php");
?>




