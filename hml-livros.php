<?
$pg = "Livros";
if ($id && $id != "comprar-livro") {
	$select = mysqli_query($con,"SELECT titulo FROM livro WHERE url = '$id'");
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
elseif ($id && $id == "comprar-livro") {
	$titulo = "Comprar Livro de Logística | $nmsite";
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_topo.php");
?>

	<? 
	if ($id && $id != "comprar-livro") {
		
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
		
		
		$arrs = array("<img/>","<span>&nbsp;");
		
		
		$sql = mysqli_query($con,"SELECT * FROM livro WHERE url = '$id'");
		$d = mysqli_fetch_array($sql);
		print "
		<div class='row'>
			<div class='col-md-8'>
				<h1 class='tituloContent2'>$d[titulo]</h1>
				<h2 class='destaqueCor'>$d[subtitulo]</h2>
				<p class='mini' style='font-style:italic; align=right' >Por $d[autor]</p>";
				
			/*	if ($d["id"] == 7 or $d["id"] == 3){
					print "<h3 class='price'>Promoção: de R$89,00 por R$$d[valor] </h3>";
				}
				else{
					print "<h3 class='price'>Valor: R$$d[valor] </h3>";
				}*/
				print "<h3 class='price'>Valor: R$$d[valor] </h3>";

				print "<p class='mini'>Boleto ou em até 3x no cartão</p>
				";
				if ($d["estoque"] == 1) {
 				   //if ($d["id"] == 7){
				   //		print "<p class='mini'>Disponibilidade: PRÉ-LANÇAMENTO - disponível a partir de 14/08</p>
				   //		<div class='txtLeft'><a href='$atual/comprar-livro' class='button'>Comprar</a></div>\n";
				   //} else{
						print "<p class='mini'>Disponibilidade: produto em estoque.</p>
						<div class='text-center' style='margin-bottom:10px'><a href='$atual/comprar-livro' class='button'>Comprar</a></div>\n";
				   //}
				}
				else {
					print "<p class='mini'>Disponibilidade: produto esgotado.</p>
					<div class='text-center' style='margin-bottom:10px'><a href='$atual/comprar-livro' class='button'>Esgotado</a></div>\n";
				}
				print "<p class='mini'>$d[descricao]</p>
			</div>
			<div class='col-md-4'>
				<img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' />
			</div>
		</div>
		<div class='clearfix'></div>
		<div class='text-center'><hr class='style14' /></div>
		<h2>Sinopse</h2>
		$d[sinopse]
		<div class='text-center'><hr class='style14' /></div>
		<h2>Características Detalhadas</h2>
		$d[caracteristicas]
		<div class='text-center'><hr class='style14' /></div>
		<h2>Capítulos do livro:</h2>
		$d[capitulos]
		<p>&nbsp;</p>
		<div class='clearfix'></div>
		". str_replace($arrs,"",$d["texto2"]) . "
		\n";
		
		// Edições Recentes
		$sql = mysqli_query($con,"SELECT titulo, img, url FROM livro WHERE url != '$id' ORDER BY ordem DESC LIMIT 0,4");
		
		if (mysqli_num_rows($sql)) {
			print "<p>&nbsp;</p>
			<h2>Confira outros livros:</h2>
			<div class='row'>\n";
			$i = 1;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-3'>
				<div class='gridEdicao'>
				<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
					<div class='blocoImg'><img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' /></div>
					<p class='titulo'>$d[titulo]</p>
				</a>
				</div>
				</div>
				\n";
				$i++;
				if ($i > 4) {
					$i = 1;
					print "</div>
					<div class='row'>\n";
				}
			}
			print "</div>\n";
		}
		// Edições Recentes
		
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
	// Exemplar
	
	// Comprar livros
	elseif ($id && $id == "comprar-livro") {
		
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
											<h1>Compra de Livros</h1>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">
									


<?
		
		print "
		<p class='mini text-center'>Para adquirir os livros preencha o formulário abaixo e escolha sua forma de pagamento.</p>
		<p class='mini text-center'><strong>IMPORTANTE: frete grátis.</strong> Prazo de entrega de 5 a 15 dias úteis.</p>
		<p>&nbsp;</p>
		<!-- <h2 class='destaqueCor text-center'>PROMOÇÃO: LIVROS DE R$89,00 POR APENAS R$69,00 <br><br>Indique a quantidade dos livros que deseja adquirir abaixo de cada um deles</h2> -->
		\n";
		?>
		<form class="form-horizontal form2" id="form" name="dadosMJ" onSubmit="return checa_formulario();" action="https://revistamundologistic.websiteseguro.com/livrosForm.jsp" method="POST" accept-charset="ISO-8859-1" >
		<?
		$sql = mysqli_query($con,"SELECT titulo, img, id, estoque, valor FROM livro ORDER BY ordem DESC");
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			while ($d = mysqli_fetch_array($sql)) {
				if ($d["estoque"] == 1) {
				print "<div class='col-md-2'>
				<div class='blocoImg'><img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' /></div>\n";
				if ($d["estoque"] == 2) {
					print "<p class='text-center' style='line-height:2.5em'>Esgotado.</p>\n";
				}
				else {
					print "<div class='text-center' style='margin:10px 0'><input type='text' value='0' name='livro$d[id]' id='livro_$d[id]' class='livroVerifica' style='max-width:20px' onKeyPress='Mascara(this,Integer);' /><input type='hidden' class='livro_$d[id]' value='$d[valor]' /></div>\n";
				}
				print "
				<p class='titulo'>$d[titulo]</p><p class='mini text-center'>Valor: <strong>R$$d[valor]</strong></p>
				</div>\n";
				$i++;
				if ($i > 6) {
					$i = 1;
					print "</div>
					<div class='row'>\n";
				}
				}
			}
			print "</div>\n";
		}
		
		print "<p>&nbsp;</p>
		<h2 class='destaqueCor text-center'>Valor total da compra: R$ <span class='valorTotal destaqueCor'>0,00</span></h2>
		<p>&nbsp;</p>
		";
		?>
			<div class="row">
				<div class="col-md-8">
					<h2>Seus dados</h2>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="nome" placeholder="Nome" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="email" placeholder="E-mail" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<div style="padding-top:15px">
						<div class="row">
							<div class="col-md-3"><strong>Sexo*:</strong></div>
							<div class="col-md-4">
								<input type="radio" name="sexo" id="M" value="M" class="inputRadio" checked />
								Masculino 
							</div>
							<div class="col-md-4">
								<input type="radio" name="sexo" id="F" value="F" class="inputRadio" />
								Feminino
							</div>
						</div>
						</div>
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="cpf" placeholder="CPF/CNPJ* (somente números)" maxlength="14" onkeypress='return SomenteNumero(event)'/>
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="telefoneRes" placeholder="Telefone/Celular*" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="endereco" placeholder="Endereço*" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="cidade" placeholder="Cidade*" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<select name="estado" placeholder=""> 
						<option value="0">Estado*</option> 
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
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="cep" placeholder="CEP* (somente números)" maxlength="8" onkeypress='return SomenteNumero(event)'/>
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="empresa" placeholder="Empresa" />
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<select name="cargo" placeholder="">
							<option selected value="">Cargo*</option>
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
					<div class="ne_map_form_input1 ne_map_form_input2">
						<select name="soube" placeholder=""> 
							<option selected value="">Soube do livro por*</option> 
							<option value="Amigo">Amigo</option> 
							<option value="Banca de Revistas">Banca de Revistas</option> 
							<option value="Site">Site</option> 
							<option value="Livraria">Livraria</option> 
							<option value="Outro">Outro</option> 
						</select>
					</div>
					<div class="ne_map_form_input1 ne_map_form_input2">
						<input type="text" name="cupom" placeholder="Cupom de Desconto" maxlength="8" />
					</div>
					
					
				</div>
				<div class="col-md-4">
					<h2>Forma de pagamento</h2>
					<div class="blockInput">
						<input type="radio" value="B" checked name="formaPgto" /> <img src="/images/__boleton.jpg" alt="" /> Pagamento em qualquer banco
					</div>
					<div class="blockInput">
						<input type="radio" value="V" name="formaPgto" /> <img src="/images/__visan.jpg" alt="" /> Visa
					</div>
					<div class="blockInput">
						<input type="radio" value="M" name="formaPgto" /> <img src="/images/__mastern.jpg" alt="" /> Mastercard
					</div>
					<div class="blockInput">
						<input type="radio" value="D" name="formaPgto" /> <img src="/images/__dinersn.jpg" alt="" /> Diners
					</div>
					<div class="blockInput">
						<input type="radio" value="A" name="formaPgto" /> <img src="/images/_amexn.gif" alt="" /> Amex
					</div>
					<div class="blockInput">
						<input type="radio" value="E" name="formaPgto" /> <img src="/images/__elo.jpg" alt="" /> ELO
					</div>
					<div class="blockInput">
						<input type="radio" value="H" name="formaPgto" /> <img src="/images/__hipern.jpg">Hiper<BR>        
					</div>
					
					<input type="hidden" name="soube" value="ML">
                    <input type="hidden" name="valor" id="valorSoma" value="0">
					
					<p>&nbsp;</p>
					<p class="text-center">Clique em "Não sou um robô"</p>
					<div class="text-center" style="margin:20px 0"><div class="g-recaptcha" data-sitekey="6LfF5iMTAAAAAPnSc_a_vqY8CFJL8lcunazg64HS" style="display:inline-block"></div></div>
					<div class="text-center"><button id="submit" class="button">Comprar Livro(s)</button></div>
				</div>
			</div>
		</form>
		<div class="clearfix"></div>
		<p>&nbsp;</p>
		<ul class="listaLivros">
			<li>Preencha os dados solicitados no formulário acima efetuar sua inscrição. Clique em PROSSEGUIR para confirmar seus dados e a forma de pagamento desejada.</li>
			<li>O pagamento no cartão de crédito pode ser parcelado em até 3x. O pagamento no boleto só poderá ser efetuado em parcela única.</li>
			<li>Após o pagamento, em até 1 dia útil você receberá um email de confirmação da sua compra e do envio dol(s) seu(s) exemplar(es).</li>
			<li>Caso deseje realizar o pagamento via depósito bancário, por favor, entre em contato conosco através do email livros@mundologistica.com.br
			<li>Dúvidas podem ser enviadas para <a href="mailto:livros@mundologistica.com.br">livros@mundologistica.com.br</a></li>
		</ul>
		<?
		
		?>
	
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
		
		
<?
		
	}
	// Comprar livros
	
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
	
	
		$sql = mysqli_query($con,"SELECT titulo, img, url, estoque FROM livro ORDER BY ordem DESC");
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			while ($d = mysqli_fetch_array($sql)) {
				if ($d["estoque"] == 1) {
					print "<div class='col-md-3'>
					<div class='gridEdicao'>
					<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
						<div class='blocoImg'><img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' /></div>
						<p class='titulo'>$d[titulo]</p>
						<p class='data'>$d[data]</p>
					</a>
					</div>
					</div>
					\n";
				}
					$i++;
					if ($i > 4) {
						$i = 1;
						print "</div>
						<div class='row'>\n";
					}
			}
			print "</div>\n";
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

		// validar livros
		if ((document.dadosMJ.livro1.value == 0 || document.dadosMJ.livro1.value == '') && (document.dadosMJ.livro2.value == 0 || document.dadosMJ.livro2.value == '') &&
            (document.dadosMJ.livro4.value == 0 || document.dadosMJ.livro4.value == '') &&
			(document.dadosMJ.livro3.value == 0 || document.dadosMJ.livro3.value == '') && (document.dadosMJ.livro6.value == 0 || document.dadosMJ.livro6.value == '') &&
			(document.dadosMJ.livro7.value == 0 || document.dadosMJ.livro7.value == '') && (document.dadosMJ.livro8.value == 0 || document.dadosMJ.livro8.value == '')){
			alert("Selecione a quantidade do(s) livro(s) que deseja comprar!");
			document.dadosMJ.livro7.focus();
			return false;
		}
	
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
			{ name: 'identificador', value: 'Formulário de Livros' },
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