<%@page contentType="text/html; charset=UTF-8"%>
<%@page pageEncoding="UTF-8"%>
<%@page import="net.tanesha.recaptcha.ReCaptchaImpl" %>
<%@page import="net.tanesha.recaptcha.ReCaptchaResponse" %>

<%@ include file="Parte1MDN.htm" %>

<jsp:useBean id="boleto" scope="session" class="mundologistica.assinatura.Boleto" />

<script src="https://static.traycheckout.com.br/js/finger_print.js" type="text/javascript"></script>

<%
String gRecaptchaResponse = request.getParameter("g-recaptcha-response");

if (!mundologistica.util.MJUtils.verifyRecaptcha(gRecaptchaResponse)){
%>
<div align="center"><BR><BR><BR><span class="destaqueCor"><strong>Você não clicou em "Não sou um robô" - na página anterior!<strong></span><BR><a href="javascript:history.back()">Clique aqui para tentar novamente!</a><BR>
    Ou entre em contato conosco pelo telefone (44) 3041-3919 ou email assinaturas@mundologistica.com.br<BR><BR><BR><BR>
</div>
<%
}else{

    session.setAttribute("login", "OK");

String jspPath = request.getServletPath();
String absoluteJspPath = application.getRealPath(jspPath);
boolean promo = false;

    mundologistica.assinatura.Assinante assinante = new mundologistica.assinatura.Assinante();
    String tipoAssinatura = request.getParameter("tipoAssinatura");
    String descAssinatura = null;
    String valorStr = null;
    String valorC = null;
    if (tipoAssinatura.equals("PR")){
        descAssinatura = "MUNDOLOGÍSTICA - R$";
        valorStr = "468.00";
        valorC = "46800";
    }else if (tipoAssinatura.equals("IV1")){
        descAssinatura = "Plano Promocional - Ganhe Livro - Valor: R$256,50 <BR><b>Livro Escolhido: Logística Coletânea de Artigos 1</b>";
        valorStr = "285.00";
        valorC = "28500";
    }else if (tipoAssinatura.equals("IV2")){
        descAssinatura = "Plano Promocional - Ganhe Livro - Valor: R$256,50 <BR><b>Livro Escolhido: Logística Coletânea de Artigos 2</b>";
        valorStr = "285.00";
        valorC = "28500";
    }else if (tipoAssinatura.equals("IV3")){
        descAssinatura = "Plano Promocional - Ganhe Livro - Valor: R$256,50 <BR><b>Livro Escolhido: Logística Tributária e Fiscal</b>";
        valorStr = "285.00";
        valorC = "28500";
    }else if (tipoAssinatura.equals("IV4")){
        descAssinatura = "Plano Promocional - Ganhe Livro - Valor: R$256,50 <BR><b>Livro Escolhido: Custos Logísticos</b>";
        valorStr = "285.00";
        valorC = "28500";
    }else if (tipoAssinatura.equals("IV5")){
        descAssinatura = "Plano Promocional - Ganhe Livro - Valor: R$256,50 <BR><b>Livro Escolhido: Gestão estratégica de estoques <BR>e Planejamento avançado de demanda</b>";
        valorStr = "285.00";
        valorC = "28500";
    }else if (tipoAssinatura.equals("2IV")){
        descAssinatura = "2 anos Black Friday- Impressa + Digital - Valor: R$299,00";
        valorStr = "299.00";
        valorC = "29900";
    }else if(tipoAssinatura.equals("2I")){
        descAssinatura = "2 anos - Impressa - R$";
        valorStr = "299.00";
        valorC = "29900";
    }else if(tipoAssinatura.equals("2V")){
        descAssinatura = "2 anos - Digital - R$";
        valorStr = "299.00";
        valorC = "29900";
    }else if(tipoAssinatura.equals("1IV")){
        descAssinatura = "1 ano Black Friday - Impressa + Digital - Valor: R$159,00";
        valorStr = "159.00";
        valorC = "15900";
    }else if(tipoAssinatura.equals("1V")){
        descAssinatura = "1 ano - Digital - R$";
        valorStr = "159.00";
        valorC = "15900";
   }else{
        descAssinatura = "1 ano - Impressa - R$";
        valorStr = "159.00";
        valorC = "15900";
   }
	String cupomDesconto = request.getParameter("cupom");
	if (cupomDesconto != null && !cupomDesconto.equals("")){
			valorC = assinante.calculaDesconto(valorC, cupomDesconto);
			assinante.insereAssinanteCupom(request.getParameter("email"), cupomDesconto);
	}
	
	StringBuilder stringBuilder = new StringBuilder(valorC);
	StringBuilder strFloat = new StringBuilder(valorC);
    stringBuilder.insert(valorC.length() - 2, ",");
    strFloat.insert(valorC.length() - 2, ".");
    descAssinatura = descAssinatura.concat(stringBuilder.toString());
	
	String p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12;
	float valorf = Float.parseFloat(strFloat.toString());
	p1 = String.format("%.2f", valorf);
	p2 = String.format("%.2f", valorf/2);
	p3 = String.format("%.2f", valorf/3);
	p4 = String.format("%.2f", valorf/4);
	p5 = String.format("%.2f", valorf/5);
	p6 = String.format("%.2f", valorf/6);
	p7 = String.format("%.2f", valorf/7);
	p8 = String.format("%.2f", valorf/8);
	p9 = String.format("%.2f", valorf/9);
	p10 = String.format("%.2f", valorf/10);
	p11 = String.format("%.2f", valorf/11);
	p12 = String.format("%.2f", valorf/12);
	
	String ip = "";
	if (request.getHeader("x-forwarded-for") == null)
		ip = request.getRemoteAddr();
	else
		ip = request.getHeader("x-forwarded-for");	
	

    if (assinante.geraBoleto(boleto, 0, application.getRealPath(".")) && assinante.insereFormaPgto(Integer.toString(boleto.getRefTranNum()), request.getParameter("formaPgto")) &&
            assinante.geraPossivelAssinante(request.getParameter("nome"), request.getParameter("ac"),
                                            request.getParameter("email"),
                                            request.getParameter("dataNascimento"),
                                            request.getParameter("cpf"),
                                            request.getParameter("sexo"),
                                            request.getParameter("telefoneRes"),
                                            request.getParameter("telefoneCom"),
                                            "",
                                            request.getParameter("endereco") + ", " + request.getParameter("numero") + " - " + request.getParameter("complemento"),
                                            request.getParameter("cidade"),
                                            request.getParameter("estado"),
                                            request.getParameter("cep"),
                                            request.getParameter("empresa"),
                                            request.getParameter("cargo"),
                                            request.getParameter("soube"),
                                            boleto, 
                                            request.getParameter("promocao"),
                                            request.getParameter("edInicial"),
                                            tipoAssinatura) &&
          assinante.insereRevistaVirtual(tipoAssinatura, boleto.getRefTranNum()))
    {

%>
<div class="ne_recent_left_side_wrapper">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ne_busness_main_slider_wrapper ne_busness_main_slider_wrapper_lifestyle">
				<div class="ne_recent_heading_main_wrapper">
					<h1>Assinatura</h1>
				</div>
			</div>
		</div>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>


<article>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="boxServico2">
					<h4>Confirme seus dados</h4>
					<hr />
					<p><strong>Nome/Razão Social</strong>: <%=request.getParameter("nome")%></p>
					<p><strong>E-mail</strong>: <%=request.getParameter("email")%></p>
					<p><strong>Data de Nascimento</strong>:	<%=request.getParameter("dataNascimento")%></p>
					<p><strong>CPF/CNPJ</strong>: <%=request.getParameter("cpf")%></p>
					<p><strong>Telefone Residencial</strong>: <%=request.getParameter("telefoneRes")%></p>
					<p><strong>Telefone Comercial</strong>:	<%=request.getParameter("telefoneCom")%></p>
					<p><strong>Endereço</strong>: <%=request.getParameter("endereco")%></p>
					<p><strong>Número</strong>: <%=request.getParameter("numero")%></p>
					<p><strong>Complemento</strong>: <%=request.getParameter("comlemento")%></p>
					<p><strong>Cidade</strong>: <%=request.getParameter("cidade")%></p>
					<p><strong>Estado</strong>: <%=request.getParameter("estado")%></p>
					<p><strong>CEP</strong>:	<%=request.getParameter("cep")%></p>
					<p><strong>Empresa</strong>:	<%=request.getParameter("empresa")%></p>
					<p><strong>Cargo</strong>: <%=request.getParameter("cargo")%></p>
					<p><strong>Edição Inicial</strong>: <%=request.getParameter("edInicial")%></p>
					<p><strong>Soube da revista por</strong>: <%=request.getParameter("soube")%></p>					
				</div>
			</div>
			
			
			
			<div class="col-md-6">
				<div class="boxServico2">
					<div class="bgCinzaAR" style="padding:10px 0">
						<div class="row">
							<div class="col-md-6">
								<h5 class="text-center">Assinatura:</h5>
							</div>
							<div class="col-md-6">
								<h5 class="text-center"><%=descAssinatura%></h5>
							</div>
						</div>
					</div>
					<p>&nbsp;</p>
<%
    if (request.getParameter("formaPgto").equals("B")){
%>
					<h4>Pagamento por boleto</h4>
					<hr />
					<form action="PgtoBoletoH.php" method="post" name="pagamento" target=_blank>
					<p>Para efetuar a assinatura gere o boleto clicando no botão abaixo.</p>
					<p>&nbsp;</p>
						<input type="hidden" name="valor" value="<%=valorC%>">
						<input type="hidden" name="refTran" value="<jsp:getProperty name="boleto" property="refTran"/>">
						<input type="hidden" name="nome" value="<%=request.getParameter("nome")%>">
						<input type="hidden" name="endereco" value="<%=request.getParameter("endereco")%>">
						<input type="hidden" name="cidade" value="<%=request.getParameter("cidade")%>">
						<input type="hidden" name="uf" value="<%=request.getParameter("estado")%>">
						<input type="hidden" name="cep" value="<%=request.getParameter("cep")%>">
						<input type="hidden" name="cpf" value="<%=request.getParameter("cpf")%>">
						<input type="hidden" name="dtVenc" value="<jsp:getProperty name="boleto" property="dataVencimento"/>">
						<input type="hidden" name="msgLoja" value="Assinatura da Revista MundoLogística">					

						<div class="row">
							<div class="col-md-6">
								<div class="control-group">
									<a href="javascript:history.back()" class="btn btn-default">Voltar</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="control-group">
									<button type="submit" id="submit" class="button">  Gerar Boleto  </button>
								</div>
							</div>
						</div>
					
					</form>

<%
    }else{
%>				
					<h4>Dados para Pagamento</h4>
					<hr />
                <form action="hml-PgtoCartao-Vindi.php" method="post" name="pagamento" data-yapay="payment-form">
                    <input type="hidden" name="loja" value="mundodotnet">
                    <input type="hidden" name="produto" value="Assinatura <%=request.getParameter("tipoAssinatura")%>">
						<!-- <p>Preencha os do seu cartão de crédito:</p> -->
						
						<div class="row">
						<div class="col-md-12">
						<div class="control-group">
							<label class="control-label" style="width:auto">Número do cartão: </label><input type="text" name="numerocartao" class="input-block-level" maxlength="16"/>
						</div>
						</div>
						</div>

						<div class="row">
						<div class="col-md-12">
						<div class="control-group">
							<label class="control-label" style="width:auto">Nome no cartão: </label><input type="text" name="nomecartao" class="input-block-level" style="width:auto"/>
						</div>
						</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
							
								<div class="control-group">
									<label class="control-label" style="width:auto">Vencimento: </label>
									<input type="text" name="mesvenc" class="input-small" style="width:40px" maxlength="2" /> / 20<input type="text" name="anovenc" class="input-small" style="width:40px" maxlength="2" />
								</div>
							
							</div>
							<div class="col-md-6">
								<div class="control-group">
									<label class="control-label" style="width:auto">Código de segurança: </label><input type="text" style="width:60px" name="codigoseg" class="input-block-level" maxlength="4"/>
								</div>
							</div>
						</div>

						<div class="row">
						<div class="col-md-12">

						<div class="control-group">
							<label class="control-label">Parcelas:</label>
								<% if (tipoAssinatura.equals("PR")) { %>
													<select name="parcelas" id="parcelas" class="input-block-level">
													<option value="12">12x de <%=p12%></option>
													<option value="11">11x de <%=p11%></option>
													<option value="10">10x de <%=p10%></option>
													<option value="9">9x de <%=p9%></option>
													<option value="8">8x de <%=p8%></option>
													<option value="7">7x de <%=p7%></option>
													<option value="6">6x de <%=p6%></option>
													<option value="5">5x de <%=p5%></option>
													<option value="4">4x de <%=p4%></option>
													<option value="3">3x de <%=p3%></option>
													<option value="2">2x de <%=p2%></option>
													<option value="1">1x de <%=p1%></option>
													</select>
								<% } else if (tipoAssinatura.equals("2IV") || tipoAssinatura.equals("2I") || tipoAssinatura.equals("2V")){ %>
													<select name="parcelas" id="parcelas" class="input-block-level">
													<option value="1">1x de <%=p1%></option>
													<option value="2">2x de <%=p2%></option>
													<option value="3">3x de <%=p3%></option>
													<option value="4">4x de <%=p4%></option>
													<option value="5">5x de <%=p5%></option>
													<option value="6">6x de <%=p6%></option>
													</select>
								<% }else {  %>
													<select name="parcelas" id="parcelas" class="input-block-level">
													<option value="1">1x de <%=p1%></option>
													<option value="2">2x de <%=p2%></option>
													<option value="3">3x de <%=p3%></option>
													</select>
								<% } %>

											<input type="hidden" name="valor" value="<%=valorStr%>">
											<input type="hidden" name="pedido" value="<%=boleto.getRefTranNum()%>">
											<input type="hidden" name="bandeira" value="<%=request.getParameter("formaPgto")%>">
											<input type="hidden" name="nome" value="<%=request.getParameter("nome")%>">
											<input type="hidden" name="cpf" value="<%=request.getParameter("cpf")%>">
											<input type="hidden" name="endereco" value="<%=request.getParameter("endereco")%>">
											<input type="hidden" name="numero" value="<%=request.getParameter("numero")%>">
											<input type="hidden" name="complemento" value="<%=request.getParameter("complemento")%>">
											<input type="hidden" name="cidade" value="<%=request.getParameter("cidade")%>">
											<input type="hidden" name="estado" value="<%=request.getParameter("estado")%>">
											<input type="hidden" name="cep" value="<%=request.getParameter("cep")%>">
											<input type="hidden" name="email" value="<%=request.getParameter("email")%>">
											<input type="hidden" name="telefoneRes" value="<%=request.getParameter("telefoneRes")%>">
											<input type="hidden" name="ip" value="<%=ip%>">
											
						</div>
						</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="control-group">
									<a href="javascript:history.back()" class="btn btn-default">Voltar</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="control-group">
									<button type="submit" id="submit" class="button">Comprar</button>
								</div>
							</div>
						</div>
						
						
					</form>
<% } %>					
					
						<div class="row">
							<div class="col-md-6">
								<div class="control-group">
									<img src="/images/seguro1.png" />
								</div>
							</div>
						</div>
					
					
				</div>
			</div>
			
			
		</div>
		<p>&nbsp;</p>
	</div>
</article>


<% }
   else{
%>
<div align="center">    <BR><BR><BR> <b>Problemas no processamento do pagamento. Tente novamente ou entre em contato pelo e-mail comercial@revistamundologistica.com.br.</b>
    <BR><a href = "javascript:history.back()">Voltar</a>
<BR><BR><BR>&nbsp;<BR>
</div>
       


<% }
}
 %>

<script>window.yapay.FingerPrint({ env: 'sandbox' });</script>
    
<%@ include file="Parte2MDN.htm" %>