<?php

$mediaType = "application/json";
$charSet="UTF-8";
$merchantId = "100006277"; 
$chaveSeguranca = "0F1EA1465AF8006B8AD26E7A6E36D61EDCD4DBE3F26E7FD030FCE508BE0D4F47581804FBCCF7E19120FF29CA6F03B58A0837830EBC0464573310B8BE5F8A197466B94552691ACA31956A3B055929A33C1B771813D7A354F4533D10078CB9968394A1BB3FBDE3536E0B67E49A9C9ED2D994C419506496DA2B7D04C916E8ACEAC5"; 
$data_service_pedido = array( "numero" => $_POST["refTran"], 
     "valor" => $_POST["valor"], 
	 "descricao" => $_POST["msgLoja"]);
	 

$data_service_comprador_endereco = array( "cep" => $_POST["cep"], "logradouro" => $_POST["endereco"], "numero" => "|", "complemento" => " ", "bairro" => "|","cidade" => $_POST["cidade"], "uf" => $_POST["uf"]);

$data_service_comprador = array( "nome" => $_POST["nome"], "documento" => $_POST["cpf"], "endereco" => $data_service_comprador_endereco, "ip" => $_SERVER["REMOTE_ADDR"], "user_agent" => $_SERVER["HTTP_USER_AGENT"]);

$data_service_boleto_registro = null;

$data_service_boleto_instrucoes = array( "instrucao_linha_1" => "Não receber após o vencimento");

date_default_timezone_set("America/Sao_Paulo");
$datahoje = date('Y-m-d');
$dataamanha = date('Y-m-d', strtotime('+1 days'));//'2016-11-01';// ++$datahoje;

$data_service_boleto = array( "beneficiario" => "MUNDOLOGÍSTICA",
      "carteira" => 25, 
	  "nosso_numero" => $_POST["refTran"],
	  "data_emissao" => $datahoje, 
	  "data_vencimento" => $dataamanha, 
	  "valor_titulo" => $_POST["valor"], 
	  "url_logotipo" => "https://www.revistamundologistica.com.br/mlog_bradesco.jpg",
	  "tipo_renderizacao" => "0",
	  "instrucoes" => $data_service_boleto_instrucoes
	  );

$data_service_request = array( "merchant_id" => $merchantId, 
      "meio_pagamento" => 300, 
	  "pedido" => $data_service_pedido, 
	  "comprador" => $data_service_comprador, 
	  "boleto" => $data_service_boleto, 
	  "token_request_confirmacao_pagamento" => "rhgsee_skj32340ss-i9k3"
	  );

$data_post = json_encode($data_service_request);

//$url = "https://meiosdepagamentobradesco.com.br/api/transacao"; //Configuracao do cabecalho da requisicao 
$url = "https://meiosdepagamentobradesco.com.br/apiboleto/transacao"; //Configuracao do cabecalho da requisicao 

$headers = array(); 
$headers[] = "Accept: ".$mediaType;
$headers[] = "Accept-Charset: ".$charSet; 
$headers[] = "Accept-Encoding: ".$mediaType;
$headers[] = "Content-Type: ".$mediaType.";charset=".$charSet;
$AuthorizationHeader = $merchantId.":".$chaveSeguranca;
$AuthorizationHeaderBase64 = base64_encode($AuthorizationHeader);
$headers[] = "Authorization: Basic ".$AuthorizationHeaderBase64;

//print_r($headers);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 

$jsonresult = json_decode($result, true);

if ($jsonresult['status']['codigo'] == 0){
//echo "json: ".$data_post."<BR>";   

   $redirect = $jsonresult['boleto']['url_acesso'];
   header("location:".$redirect);
   
}
//echo "cidade: ".$_POST["cidade"]."<BR>";

else{
 echo "Algum problema ocorreu! Favor entrar em contato pelo email comercial@mundologistica.br ou pelo telefone (44) 3041-3919, e informar o código ".$jsonresult[$status][$codigo];
//echo "<BR>Código: ".$jsonresult[status][codigo];
// echo "json: ".$data_post."<BR>";
}


?>