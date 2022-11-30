<%@page language="java" %>
<%@page contentType="text/html; charset=UTF-8"%>
<%@page pageEncoding="UTF-8"%>
<%@page import="net.tanesha.recaptcha.ReCaptchaImpl" %>
<%@page import="net.tanesha.recaptcha.ReCaptchaResponse" %>
<%@taglib prefix = "c" uri = "http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html>
<html lang="pt-br">
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
                            <div class="mdl-checkout-steps--item ">
                                
                                <div class="mdl-checkout-steps--title"><span class="mdl-checkout-steps--circle"></span> Identificação</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mdl-checkout-steps--item active">
                                
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
                                    <div class="mdl-checkout-box-carrinho--number">R$ 478,90</div>
                                </div>
                            </div>
                        </div>
        
                       
        
                    </div>
        
                    <div class="col-md-6">
                        <div class="mdl-checkout-box-carrinho--form">
                            <h2 class="mdl-checkout-box-carrinho-form--title">Pagamento</h2>


<jsp:useBean id="boleto" scope="session" class="mundologistica.assinatura.Boleto" />

<script src="https://static.traycheckout.com.br/js/finger_print.js" type="text/javascript"></script>

<%

if (1 > 2){
    
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
    String tipoAssinatura = "PR";
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


    if ( 1 == 1 ){
    if (request.getParameter("formaPgto").equals("B")){
%>
					<h4>Pagamento por boleto</h4>
					
					<hr />
					<form action="PgtoBoletoH.php" method="post" name="pagamento" target=_blank>

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


                        <button type="submit" id="submit" class="btn btn-primary mdl-btn-primary-checkout">Baixar boleto</button>
					</form>
<%
    }else{
%>				
					
					<hr />
					   <form action="hml-PgtoCartao-Vindi.php" method="post" name="pagamento" data-yapay="payment-form">

											<input type="hidden" name="parcelas" value="1"  >
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

                                <div class="mb-3">
                                    <label for="InputNome" class="form-label mdl-checkout-label">Titular do cartão</label>
                                    <input type="text" class="form-control mdl-checkout-form-control" id="InputNome" name="nomecartao" aria-describedby="emailHelp" placeholder="Nome completo do titular do cartão">
                                </div>
                                <div class="mb-3">
                                    <label for="InputCard" class="form-label mdl-checkout-label">Número do cartão</label>
                                    <input type="number" class="form-control mdl-checkout-form-control" id="InputCard" name="numerocartao" aria-describedby="emailHelp" placeholder="0000 0000 0000 0000 0000">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="InputCard" class="form-label mdl-checkout-label">Validade</label>

                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="mesvenc" class="form-control mdl-checkout-form-control" maxlength="2" placeholder="11" />
                                                </div>

                                                <div class="col">
                                                    <input type="text" name="anovenc" class="form-control mdl-checkout-form-control" maxlength="2" placeholder="30" />
                                                </div>
                                            </div>
                                            

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="InputCard" class="form-label mdl-checkout-label">Código de segurança</label>
                                            <input type="number" class="form-control mdl-checkout-form-control" name="codigoseg" id="InputCard"  maxlength="4" aria-describedby="emailHelp" placeholder="123">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label class="control-label">Parcelas:</label>
								<% if (tipoAssinatura.equals("PR")) { %>
													<select name="parcelas" id="parcelas" class="form-control mdl-checkout-form-control">
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
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mdl-btn-primary-checkout">Assinar</button>
                                
                                <div class="mdl-spacing"></div>
                                <p>
                                    Em caso de problemas, entre em contato com o suporte através do e-mail suporte@mundologistica.com
                                </p>
        
                                <p>
                                    Ao clicar no botão Concluir cadastro, você aceita nossos termos de uso e política de privacidade
                                </p>
                                <div class="mdl-spacing"></div>
                            </form>
  
<% } %>					

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



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