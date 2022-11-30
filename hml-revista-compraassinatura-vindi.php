<?
$pg = "Assine Aqui!";
if ($id2) {
	
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}

?>
<!DOCTYPE html>
<html lang="ot-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize a compra da sua assinatura - MundoLogística</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/assinatura.css">
    <link rel="stylesheet" href="assets/checkout.css">

</head>
<body class="mld-black-mode">
    <div class="container">
        <header class="mdl-header-clean mdl-header d-flex flex-wrap justify-content-center py-3 mb-4">
            <div class="mdl-header-logo-responsive">MundoLogística</div>
        </header>
    </div>


    <div class="container">
        <div class="mdl-checkout-steps">
           
            <div class="row justify-content-center">

                <div class="col-md-8 text-center">
                    <div class="row">
                        <div class="col">
                            <div class="mdl-checkout-steps--item active">
                                
                                <div class="mdl-checkout-steps--title"><span class="mdl-checkout-steps--circle"></span> Identificação</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mdl-checkout-steps--item">
                                
                                <div class="mdl-checkout-steps--title"><span class="mdl-checkout-steps--circle"></span> Pagamento</div>
                            </div>
                        </div>
                    </div>
                </div>
           
               

            </div>
            <div class="mdl-checkout-steps-line"></div>
        </div>


        <div class="mdl-spacing"></div>
        <div class="mdl-spacing"></div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="mdl-checkout-box-carrinho">
                            <div class="mdl-checkout-box-carrinho--title">
                                Muito bem! Você está assinando por:
                            </div>
        
                            <div class="mdl-checkout-box-carrinho--price">
                                <small>12x de</small>
                                R$ 39,00
                            </div>
        
                            <div class="mdl-checkout-box-carrinho--perks">
                                <ul class="list-unstyled mt-3 mb-4 mld-card-pricing-list">
                                    <li>Acesso ilimitado as notícias</li>
                                    <li>Receba a revista na sua casa</li>
                                    <li>Cursos, Webinars, Ebooks, Descontos e tudo que tem direito</li>
                                </ul>
                            </div>

                            <div class="row text-center">
                                <div class="col">
                                    <div class="mdl-checkout-box-carrinho--total">Valor total</div>
                                </div>
            
                                <div class="col">
                                    <div class="mdl-checkout-box-carrinho--number">R$ 468,00</div>
                                </div>
                            </div>

                            <hr>

                            <div id="payment-method" class="mdl-checkout-box-carrinho--total">Escolha a forma de pagamento</div> <Br>

                            <div class="row" >
                                <div class="col"> <input type="radio" value="B" checked name="formaPgto" id="Boleto" />  <label for="Boleto">Boleto</label> </div>
                                <div class="col"><input type="radio" value="V" name="formaPgto" id="Visa" />  <label for="Visa">Visa</label></div>
                                <div class="col"> <input type="radio" value="M" name="formaPgto" id="Mastercard" /> <label for="Mastercard">Mastercard</label></div>
                            </div>

                            <div class="row">
                                <div class="col"> <input type="radio" value="D" name="formaPgto" id="Dinner"/>  <label for="Dinner">Dinner</label></div>
                                <div class="col"> <input type="radio" value="A" name="formaPgto" id="Amex" />  <label for="Amex">Amex</label></div>
                                <div class="col"><input type="radio" value="E" name="formaPgto" id="Elo"/>  <label for="Elo">ELO</label></div>
                                
                            </div>

                           <div class="row">
                            <div class="col"><input type="radio" value="H" name="formaPgto" id="Hiper" /> <label for="Hiper">Hiper</label></div>
                           </div>
                        

                        </div>
        
                       
        
                    </div>
        
                    <div class="col-md-6">
                        <div class="mdl-checkout-box-carrinho--form">
                            <h2 class="mdl-checkout-box-carrinho-form--title">Cadastro</h2>
        
                            <form onSubmit="return checa_formulario();" name="assinaturaMLOG" id="form" action="https://revistamundologistica.com.br/hml-Assinatura-Vindi.jsp" method="POST" accept-charset="ISO-8859-1" >
                                <input type="hidden" value="" name="formaPgto" >
                                <div class="mb-3">
                                    <label for="nome" class="form-label mdl-checkout-label">Nome completo</label>
                                    <input name="nome" type="text" class="form-control mdl-checkout-form-control" id="nome" aria-describedby="emailHelp" placeholder="Gustavo Soares" required>
                                </div>
        
                                <div class="mb-3">
                                    <label for="email" class="form-label mdl-checkout-label">E-mail</label>
                                    <input name="email" type="email" class="form-control mdl-checkout-form-control" id="email" aria-describedby="emailHelp" placeholder="gustavo.soares@loglog.com.br" required>
                                    <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com ninguém. E nem enviaremos SPAM. :)</div>
                                </div>
        
                                <div class="mb-3">
                                    <label for="telefone" class="form-label mdl-checkout-label">Telefone/Celular</label>
                                    <input name="telefoneRes" type="number" class="form-control mdl-checkout-form-control" id="telefone" aria-describedby="emailHelp" placeholder="(11) 91234-5676">
                                </div>

                                <div class="mb-3">
                                    <label for="cep" class="form-label mdl-checkout-label">CEP</label>
                                    <input name="cep" type="number" class="form-control mdl-checkout-form-control" id="cep" aria-describedby="emailHelp" placeholder="06753030" onblur="pesquisacep(this.value);" required >
                                </div>

                                <div class="mb-3">
                                    <label for="endereco" class="form-label mdl-checkout-label">Endereço completo</label>
                                    <input name="endereco" type="text" class="form-control mdl-checkout-form-control" id="endereco" aria-describedby="emailHelp" placeholder="Rua/Av/Logradouro">
                                </div>
                                
                                 <div class="mb-3">
                                    <label for="cidade" class="form-label mdl-checkout-label">Cidade</label>
                                    <input name="cidade" type="text" class="form-control mdl-checkout-form-control" id="cidade" aria-describedby="emailHelp" >
                                </div>

                                <div class="mb-3">
                                    <label for="numero" class="form-label mdl-checkout-label">Número</label>
                                    <input name="numero" type="number" class="form-control mdl-checkout-form-control" id="numero" aria-describedby="emailHelp" >
                                </div>
                                
                                <div class="mb-3">
                                    <label for="complemento" class="form-label mdl-checkout-label">Complemento</label>
                                    <input name="complemento" type="text" class="form-control mdl-checkout-form-control" id="complemento" aria-describedby="emailHelp" >
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label mdl-checkout-label">Estado</label>
                                    <select  class="form-select form-control mdl-checkout-form-control" name="estado" id="estado" aria-label="Default select example">
											<option value="0" selected>Estado*</option> 
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

                                <div class="mb-3">
                                    <label for="cpf" class="form-label mdl-checkout-label">CPF/CNPJ*</label>
                                    <input name="cpf" type="number" class="form-control mdl-checkout-form-control" id="cpf" placeholder="000 000 000 00" maxlength="14" onkeypress='return SomenteNumero(event)' required>
                                </div>

                                <div class="mb-3">
                                    <label for="empresa" class="form-label mdl-checkout-label">Empresa*</label>
                                    <input  class="form-control mdl-checkout-form-control" id="empresa" aria-describedby="emailHelp" placeholder="Nome da empresa">
                                </div>

                                <div class="mb-3">
                                    <label for="cargo" class="form-label mdl-checkout-label">Cargo*</label>
                                    <select class="form-select form-control mdl-checkout-form-control" name="cargo" id="cargo" aria-label="Default select example" reqqiured>
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

                                <input type="hidden" name="sexo" value="M" />
                                <input type="hidden" name="fax" value="" />
                                <input type="hidden" name="dataNascimento" value="" />
                                <input type="hidden" name="edInicial" value="91" />

                                <div class="mb-3">
                                    <label for="cupom" class="form-label mdl-checkout-label">Cupom de desconto</label>
                                    <input type="text" class="form-control mdl-checkout-form-control" id="cupom" aria-describedby="emailHelp" placeholder="Insira seu cupom (opcional)">
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Aceito os <a href="#" style="color:#fff">termos e condições</a></label>
                                </div>

                                <div class="text-center" style="margin:20px 0">
										<div class="g-recaptcha" data-sitekey="6LfF5iMTAAAAAPnSc_a_vqY8CFJL8lcunazg64HS" style="display:inline-block"></div>
										</div>
        
                                <button type="submit" class="btn btn-primary mdl-btn-primary-checkout">Concluir cadastro e próximo</button>
                                
                                <div class="mdl-spacing"></div>
                                <p>
                                    Em caso de problemas, entre em contato com o suporte através do e-mail suporte@mundologistica.com
                                </p>
        
                                <p>
                                    Ao clicar no botão Concluir cadastro, você aceita nossos termos de uso e política de privacidade
                                </p>
                                

                                <div class="mdl-spacing"></div>
                            </form>
                        </div>
                        
                    </div>
        
        
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>  
<script src="js/valida_cpf_cnpj.js"></script>

    <!-- Adicionando Javascript -->
    <script>
    document.querySelector('#cep').onBlur = () => {
        pesquisacep()
    }
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
        $('#form').find('input[name="formaPgto"]').val($('input[name="formaPgto"]:checked').val())
		


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
var inputFormaPgto = payment_method.querySelector('input[name="formaPgto"]:checked');
var inputTipoAssinatura = form.find('select[name="tipoAssinatura"]:checked');
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



    //    RdIntegration.post(data_array);
		
		return document.assinaturaMLOG.submit();
}
    

	
	</script>

<!--<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '3c23fb9f-5837-463b-9b7c-03c5ca2286ab', f: true }); done = true; } }; })();</script>
-->
<?
include("_hml-rodape.php");
?>