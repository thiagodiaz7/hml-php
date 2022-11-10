<?
$pg = "Comprar Edições";
if ($id2) {
	
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_topo.php");
?>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="ne_busness_main_slider_wrapper ne_busness_main_slider_wrapper_lifestyle">
										<div class="ne_recent_heading_main_wrapper">
											<h1><?=$pg?></h1>
										</div>
									</div>
								</div>
							</div>
						</div>
						<p>&nbsp;</p>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">
								
								<p><strong>O valor de cada edição é de R$40,00 - já com frete incluso!</strong></p>
								<p>Selecione abaixo a quantidade de cada exemplar desejado e preencha o formulário após as edições. Para finalizar escolha a forma de pagamento (em cartão ou boleto bancário).<BR>Após a confirmação do pagamento suas edições serão enviadas e você receberá a confirmação por e-mail.</p>
								<p>&nbsp;</p>
								<form class="form-horizontal form2" id="form" name="dadosMJ" onSubmit="return checa_formulario();" action="https://revistamundologistic.websiteseguro.com/EdicoesAnterioresVindi.jsp" method="POST" accept-charset="ISO-8859-1">
								<?
								$sql = mysqli_query($con,"SELECT titulo, edicao, data, img, url FROM revista WHERE estoque = '1' ORDER BY edicao + 1 DESC");
								if (mysqli_num_rows($sql)) {
									print "<div class='gridEdicaoShow'>
									<div class='row gridComprarEdicao'>";
									$i = 1;
									while ($d = mysqli_fetch_array($sql)) {
										list($a, $edicao) = explode(" ",$d["edicao"]);
										$l = $d["edicao"];
										print "<div class='col-md-6'>
											<div style='padding:10px;margin-bottom:30px'>
											<div class='row'>
											<div class='col-md-4'>
											<a href='".$url_total."revista/edicoes-anteriores/$d[url]' title='$d[titulo]' target='_blank'>
												<div class='blocoImg'><img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' /></div>
											</a>
											</div>
											<div class='col-md-4'>
												<p>$d[edicao]</p>
												<p class='data'>$d[data]</p>
											</div>
											<div class='col-md-4'>
												<label>Quantidade</label> <input type='text' name='edicao".$l."' value='0' onKeyPress='Mascara(this,Integer);' size='3' />
											</div>
											</div>
											</div>
										</div>\n";
										$i++;
										if ($i > 2) {
											$i = 1;
											print "</div>
										</div>
										<div class='clearfix'></div>
										<div class='gridEdicaoShow'>
										<div class='row gridComprarEdicao'>\n";
										}
									}
									print "</div>
										</div>
										<div class='clearfix'></div>
										<br />
										<div class='text-center'><a class='loadMore button'>Ver mais edições</a></div>\n";
								}
							
							?>
							<p>&nbsp;</p>
								<div class="row">
									<div class="col-md-8">
										<h2>Seus dados</h2>
										
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="nome" placeholder="Nome" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="email" placeholder="E-mail" />
										</div>
										<!-- <div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="dataNascimento" placeholder="Data Nascimento" />
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
										</div> -->
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="telefoneRes" placeholder="Telefone/Celular*" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="telefoneCom" placeholder="Celular" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="endereco" placeholder="Endereço*" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="numero" placeholder="Número*" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="complemento" placeholder="Complemento*" />
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
											<input type="text" name="cpf" placeholder="CPF/CNPJ* (somente números)" maxlength="14" onkeypress='return SomenteNumero(event)'/>
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
												<option selected value="">Soube da revista por*</option> 
												<option value="Amigo">Amigo</option> 
												<option value="Banca de Revistas">Banca de Revistas</option> 
												<option value="Site">Site</option> 
												<option value="Livraria">Livraria</option> 
												<option value="Outro">Outro</option> 
											</select>
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

										<p>&nbsp;</p>
										<p class="text-center">Clique em "Não sou um robô"</p>
										<div class="text-center" style="margin:20px 0"><div class="g-recaptcha" data-sitekey="6LfF5iMTAAAAAPnSc_a_vqY8CFJL8lcunazg64HS" style="display:inline-block"></div></div>
										<div class="text-center"><button id="submit" class="button">Comprar Edições</button></div>
									</div>
								</div>
							</form>
								
								
								
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
var inputTelefoneCom = form.find('input[name="telefoneCom"]');
var inputCidade = form.find('input[name="cidade"]');
var inputEstado = form.find('input[name="estado"]');
var inputFormaPgto = form.find('input[name="formaPgto"]:checked');
var inputCargo = form.find('select[name="cargo"]');


  var data_array = [
    { name: 'email', value: inputEmail.val() },
    { name: 'identificador', value: 'Formulário Compra de Edições' },
    { name: 'nome', value: inputNome.val() },
    { name: 'telefone', value: inputTelefoneRes.val() },
    { name: 'Telefone Comercial', value: inputTelefoneCom.val() },
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