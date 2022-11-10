<?php header("Content-type: text/html; charset=UTF-8; pageEncoding=UTF-8"); ?>

<?php
include("Parte1MDN.htm");
?>




<?php
	$ambiente = 'production'; // sandbox, production
	
	if (isset($_GET['env']))
	{
		if (strtolower($_GET['env']) == 'sandbox')
		{
			$ambiente = 'sandbox';
		}
		else if (strtolower($_GET['env']) == 'production')
		{
			$ambiente = 'production';
		}
	}
	
	switch ($ambiente)
	{
		case 'sandbox':
		{
			$filiacao = '';
			$login = 'yapay';
			$senha = 'yapay';
			$url = 'https://api.intermediador.sandbox.yapay.com.br/api/v3/transactions/payment';
			break;
		}
		case 'production':
		{
			$filiacao = '';
			$login = 'yapay';
			$senha = 'yapay';
			$url = 'https://api.intermediador.yapay.com.br/api/v3/transactions/payment';
			break;
		}
		default:
		{
			$filiacao = '';
			$login = 'yapay';
			$senha = 'yapay';
			$url = 'https://sandbox.gateway.yapay.com.br/checkout/api/v3/transacao';
		}
	}
	
	$bandeira = 0;
	if ($_POST["bandeira"] == 'V'){
		$bandeira = 3;
	}
	if ($_POST["bandeira"] == 'M'){
		$bandeira = 4;
	}
	if ($_POST["bandeira"] == 'A'){
		$bandeira = 5;
	}
	if ($_POST["bandeira"] == 'E'){
		$bandeira = 16;
	}
	if ($_POST["bandeira"] == 'H'){
		$bandeira = 20;
	}
	


	
$parametros = array(
  //'token_account' => 'd2e182a5b08ce88',
  'token_account' => '1e39c930183cff5',
  'finger_print' => $_POST['finger_print'],
  'customer' => array (
    'contacts' => array (
      array (
        'type_contact' => 'M',
        'number_contact' => $_POST["telefoneRes"],
      ),
    ),
    'addresses' => array (
      array (
        'type_address' => 'B',
        'postal_code' => $_POST["cep"],
        'street' => $_POST["endereco"],
        'number' => $_POST["numero"],
        'completion' => $_POST["complemento"],
        'neighborhood' => '',
        'city' => $_POST["cidade"],
        'state' => $_POST["estado"],
      ),
    ),
    'name' => $_POST["nome"],
    'cpf' => $_POST["cpf"],
    'email' => $_POST["email"],
  ),
  'transaction_product' => array (
    array (
      'description' => 'Assinatura da MundoLogística',
      'quantity' => '1',
      'price_unit' => $_POST["valor"],
      'code' => '1',
      'sku_code' => '0001',
      'extra' => '',
    ),
  ),
  'transaction' => array (
    'available_payment_methods' => '3,4,5,16,20',
	'order_number' => $_POST['pedido'],
    'customer_ip' => $_POST["ip"],
    'shipping_type' => 'MDPB',
    'shipping_price' => '',
    'price_discount' => '',
    'url_notification' => 'https://mundologistica.com.br/notificacao',
    'free' => '',
  ),
  'payment' => array (
    'payment_method_id' => $bandeira,
    'card_name' => $_POST["nomecartao"],
    'card_number' => $_POST["numerocartao"],
    'card_expdate_month' => $_POST["mesvenc"],
    'card_expdate_year' => '20'.$_POST["anovenc"],
    'card_cvv' => $_POST["codigoseg"],
    'split' => $_POST["parcelas"],
  ),
);	
	//echo('Endpoint: ' . $url);
	//echo('<br />');
	//echo('<br />');
	$json = json_encode($parametros, JSON_UNESCAPED_UNICODE);
	//echo('Json');
	//echo('<br />');
	//print_r($json);
	//echo('json last error: '.json_last_error());
	//echo('<br />');
	//echo('<br />');
	$headers = array(
		'Content-Type: application/json; charset=utf-8', 
		'Content-length: ' . strlen($json)
	);
	//echo('Headers');
	//echo('<br />');
	//print_r($headers);
	//echo('<br />');
	//echo('<br />');
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, TRUE);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $json);	
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $login . ':' . $senha );
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	//curl_setopt($curl, CURLOPT_SSLVERSION, 6);
	$result = curl_exec($curl);
	$curl_info = curl_getinfo($curl);
	
	$arquivo = fopen('logs/logPgto.txt','a+');

	fwrite($arquivo, 'Número do refTran:'.$_POST['pedido'].PHP_EOL);
	//fwrite($arquivo, print_r($curl_info, true).PHP_EOL);
	fwrite($arquivo, print_r($result, true).PHP_EOL);
	fwrite($arquivo, PHP_EOL);
	fwrite($arquivo, 'mensagem resposta'.$resjson['message_response']['message'].PHP_EOL);
	fwrite($arquivo, 'mensagem código'.$resjson['data_response']['transaction']['payment']['payment_response_code'].PHP_EOL);

	
	fclose($arquivo);	
	
	
	if (!curl_errno($curl))
	{
	
		$resjson = json_decode($result, true);
		
		//echo('<br><BR> result');
		print_r($array);
		//echo('mensagem resposta'.$resjson['message_response']['message']);
		//echo('mensagem código'.$resjson['data_response']['transaction']['payment']['payment_response_code']);
		
		
		if ($resjson['message_response']['message'] == 'error'){
?>			
			<div align="center" ><BR><BR><BR><b>Problemas com o pagamento!</b><BR>
			Revise os seus dados, ou entre em contato com sua operadora de cartão ou com a MundoLogística por email assinaturas@mundologistica.com.br ou pelo telefone (44) 3041-3919.
			<BR><BR><BR>&nbsp;</div>
<?php			
		}
		else{
		if ($resjson['data_response']['transaction']['payment']['payment_response_code'] == '0'){
?>
			<div align="center"><BR><BR><BR>Pagamento realizado com sucesso!<BR><BR>
			Em até 1 dia útil você receberá sua confirmação por email.<BR><BR>
			Qualquer dúvida entre em contato pelo telefone (44) 3041-3919 ou pelo email assinaturas@mundologistica.com.br.
			<BR><BR><BR>&nbsp;</div>
<?php
         }
		 else{
?>		 
			<div align="center" ><BR><BR><BR><b>Problemas com o pagamento!</b><BR>
			Entre em contato com sua operadora de cartão ou com a MundoLogística, por email assinaturas@mundologistica.com.br, ou pelo telefone (44) 3041-3919.
			<BR><BR><BR>&nbsp;</div>
<?php
         }
		}
	
	}
	else{
?>

<div align="center" ><BR><BR><BR><b>Problemas com o pagamento!</b><BR>
Entre em contato com sua operadora de cartão ou com a MundoLogística, por email assinaturas@mundologistica.com.br, ou pelo telefone (44) 3041-3919.
<BR><BR><BR>&nbsp;</div>

<?php	
	}

	curl_close($curl);
?>


       
<?php
include("Parte2MDN.htm");
?>
