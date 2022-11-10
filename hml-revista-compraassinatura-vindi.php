
<?
$pg = "Assine Aqui!";
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
								
								<h2><strong>Preencha os dados abaixo, faça sua assinatura e esteja sempre atualizado em logística!</strong></h2>
								<p><strong>Valor da assinatura anual:</strong> R$468,00 a vista no boleto ou parcelado em até 12x de R$39,90 no cartão de crédito<BR>&nbsp;</p>
								<p class='txtCenter h2rounded'><strong>APROVEITE O BENEFÍCIO:</strong><BR> Assinando agora, além da revista atual, GANHE 2 EDIÇÕES anteriores -<BR> "<a href="https://mundologistica.com.br/revista/edicoes-anteriores/tecnologia-e-transporte-inseparaveis" target="_blank">Tecnologia e transporte - inseparáveis</a>" e<BR> "<a href="https://mundologistica.com.br/revista/edicoes-anteriores/e-commerce-e-logistica-uma-relacao-elementar" target="_blank">Tudo sobre logística para e-commerce</a>"</p>
								<p><BR><BR>*campos obrigatórios&nbsp;</p>
								<form class="form-horizontal form2" onSubmit="return checa_formulario();" name="assinaturaMLOG" id="form" action="https://revistamundologistica.com.br/hml-Assinatura-Vindi.jsp" method="POST" accept-charset="ISO-8859-1">
								<div class="row">
									<div class="col-md-8">
										<h2>Seus dados</h2>
										
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="nome" placeholder="Nome*" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="ac" placeholder="Aos cuidados" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="email" placeholder="E-mail*" required />
										</div>
										<!-- <div class="ne_map_form_input1 ne_map_form_input2">
											<div style="padding-top:15px">
											<div class="row">
												<div class="col-md-3"><strong>Sexo*:</strong></div>
												<div class="col-md-4">
													<input type="radio" name="sexo" id="M" value="M" class="inputRadio" checked required />
													Masculino 
												</div>
												<div class="col-md-4">
													<input type="radio" name="sexo" id="F" value="F" class="inputRadio" required />
													Feminino
												</div>
											</div>
											</div>
										</div> -->
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="telefoneRes" placeholder="Telefone/Celular*" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="telefoneCom" placeholder="Celular" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="cep" id="cep" placeholder="CEP* (somente números)" maxlength="8" onblur="pesquisacep(this.value);" required />
										</div>										
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" id="endereco" name="endereco" placeholder="Endereço*" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="numero" placeholder="Numero*" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="complemento" placeholder="Complemento" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" id="cidade" name="cidade" placeholder="Cidade*" required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<select name="estado" id="estado" placeholder="" required> 
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
											<input type="text" name="cpf" placeholder="CPF/CNPJ* (somente números)" maxlength="14" onkeypress='return SomenteNumero(event)' required />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="empresa" placeholder="Empresa" />
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<select name="cargo" placeholder="" required>
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
											<select name="soube" placeholder="" required> 
												<option selected value="">Soube da revista por*</option> 
												<option value="Amigo">Amigo</option> 
												<option value="Banca de Revistas">Banca de Revistas</option> 
												<option value="Site">Site</option> 
												<option value="Livraria">Livraria</option> 
												<option value="Outro">Outro</option> 
											</select>
										</div>
										<div class="ne_map_form_input1 ne_map_form_input2">
											<input type="text" name="cupom" placeholder="Cupom de Desconto" />
										</div>
									</div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-1"><input type="radio" name="tipoAssinatura" value="PR" checked /></div>
											<div class="col-md-11">
											<p class="mini"><strong>ASSINATURA MUNDOLOGÍSTICA</strong> - 1 ano - R$468 - (em até 12x de R$39,00 no cartão ou a vista no boleto)</p>
											<!-- <p class="mini" style="text-align:left!important"><strong>PREMIUM - Plataforma de conhecimento</strong><BR> - 1 ano - PROMOÇÃO - de R$468,00 por R$397,80 - parcele em até 12x de R$33,15 no cartão ou à vista no boleto</p> -->
											<!-- parcele em até 12x de R$39,00 no cartão ou R$468,00 à vista no boleto)</p> -->
											</div>
										</div>
									
										<h2>Forma de pagamento</h2>
										<div class="blockInput">
											<input type="radio" value="B" checked name="formaPgto" /> <img src="/images/__boleton.jpg" alt="" /> Boleto
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
		<input type="hidden" name="sexo" value="M" />
		<input type="hidden" name="fax" value="" />
		<input type="hidden" name="dataNascimento" value="" />
		<input type="hidden" name="edInicial" value="90" />
										
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<div class="text-center" style="margin:20px 0">
										<div class="g-recaptcha" data-sitekey="6LfF5iMTAAAAAPnSc_a_vqY8CFJL8lcunazg64HS" style="display:inline-block"></div>
										</div>
										<div class="text-center"><button id="submit" class="button">Comprar</button></div>
									</div>
								</div>
								
								</form>
								<div class="clearfix"></div>

								<!-- <p><img src='/images/camiseta-tabela.jpg' /></p> -->
<BR><BR>							
								
								<p>• O pagamento pode ser feito por boleto bancário ou cartão de crédito. O boleto é gerado automaticamente após o preenchimento do formulário acima e poderá ser pago em qualquer agência bancária ou via Internet Banking. O pagamento por cartão de crédito é feito de forma online.</p>
								<p>• Após o pagamento, em até 1 dia útil você receberá um e-mail de confirmação da assinatura e seu código de assinante para acesso a área de assinantes. Você receberá seu primeiro exemplar impresso dentro de 5 a 10 dias úteis.</p>
								<p>• Dúvidas podem ser enviadas para <a href="mailto:assinaturas@mundologistica.com.br">assinaturas@mundologistica.com.br</a></p>
								<p>&nbsp;</p>
								
								
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

    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>


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
		if (document.assinaturaMLOG.nome.value == ""){
			alert("O campo nome deve ser preenchido!");
			document.assinaturaMLOG.nome.focus();
			return false;
		}
		//validar email
		if (document.assinaturaMLOG.email.value == ""){
			alert("O campo email deve ser preenchido!");
			document.assinaturaMLOG.email.focus();
			return false;
		}
		//validar cpf
		if (!valida_cpf_cnpj(document.assinaturaMLOG.cpf.value))
		{
		//if (document.assinaturaMLOG.cpf.value == ""){
			alert("O campo cpf/cnpj é inválido!");
			document.assinaturaMLOG.cpf.focus();
			return false;
		}
		//validar telefone
		if (document.assinaturaMLOG.telefoneRes.value == ""){
			alert("O campo telefone deve ser preenchido!");
			document.assinaturaMLOG.telefoneRes.focus();
			return false;
		}
		//validar endereco
		if (document.assinaturaMLOG.endereco.value == ""){
			alert("O campo endereço deve ser preenchido!");
			document.assinaturaMLOG.endereco.focus();
			return false;
		}
		//validar cidade
		if (document.assinaturaMLOG.cidade.value == ""){
			alert("O campo cidade deve ser preenchido!");
			document.assinaturaMLOG.cidade.focus();
			return false;
		}
		//validar cep
		if (document.assinaturaMLOG.cep.value == ""){
			alert("O campo CEP deve ser preenchido!");
			document.assinaturaMLOG.cep.focus();
			return false;
		}
		if (isNaN(document.assinaturaMLOG.cep.value)){
			alert("O campo CEP deve conter somente números!");
			document.assinaturaMLOG.cep.focus();
			return false;
		}				
		//validar estado
		if (document.assinaturaMLOG.estado.value == "0"){
			alert("O campo Estado deve ser preenchido!");
			document.assinaturaMLOG.cep.focus();
			return false;
		}
		if (document.assinaturaMLOG.cargo.value == "selecione"){
			alert("O campo Cargo deve ser preenchido!");
			document.assinaturaMLOG.cargo.focus();
			return false;
		}


		
		if (document.assinaturaMLOG.cupom.value.match(/PR/) && document.assinaturaMLOG.tipoAssinatura.value != "PR"){
			alert("Este cupom de desconto só é válido para assinaturas Premium!");
			document.assinaturaMLOG.cupom.focus();
			return false;
		}
		
		
/*		if (document.assinaturaMLOG.g-recaptcha.getResponse() == "")
		{
			alert("Você não clicou em \"Não sou um robô\", por favor, clique!");
			document.assinaturaMLOG.g-recaptcha.focus();
			return false;
		}		
*/
		
var TOKEN = 'f44ad08e5fd20312485f516a3a99393c'; 

var form = $('#form');
var inputNome = form.find('input[name="nome"]');
var inputEmail = form.find('input[name="email"]');
var inputTelefoneRes = form.find('input[name="telefoneRes"]');
var inputTelefoneCom = form.find('input[name="telefoneCom"]');
var inputCidade = form.find('input[name="cidade"]');
var inputEstado = form.find('select[name="estado"]');
var inputFormaPgto = form.find('input[name="formaPgto"]:checked');
var inputTipoAssinatura = form.find('input[name="tipoAssinatura"]:checked');
var inputCargo = form.find('select[name="cargo"]');

  var data_array = [
    { name: 'email', value: inputEmail.val() },
    { name: 'identificador', value: 'Formulário de Assinatura' },
    { name: 'nome', value: inputNome.val() },
    { name: 'telefone', value: inputTelefoneRes.val() },
    { name: 'Telefone Comercial', value: inputTelefoneCom.val() },
    { name: 'cidade', value: inputCidade.val() },
    { name: 'estado', value: inputEstado.val() },
    { name: 'CargoMundoLogistica', value: inputCargo.val() },
    { name: 'Forma de Pagamento', value: inputFormaPgto.val() },
    { name: 'Tipo de Assinatura', value: inputTipoAssinatura.val() },
    { name: 'token_rdstation', value: TOKEN }
  ];

        RdIntegration.post(data_array);
		
		return document.assinaturaMLOG.submit();
}
	

	
	</script>

<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '3c23fb9f-5837-463b-9b7c-03c5ca2286ab', f: true }); done = true; } }; })();</script>

<?
include("_rodape.php");
?>