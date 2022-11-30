<?php header("Content-type: text/html; charset=UTF-8; pageEncoding=UTF-8"); ?>

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
    <?php include("hml-Parte1MDN.htm");?> 

      <div class="row justify-content-center text-center">
            <div class="col-md-4">
                      
                        <h2 class="mdl-checkout-sucesso--title">Problemas com o pagamento!</h2>
                        <p class="mdl-checkout-sucesso--text">
                        Revise os seus dados, ou entre em contato com sua operadora de cartão ou com a MundoLogística por email assinaturas@mundologistica.com.br ou pelo telefone (44) 3041-3919.
                        </p>

                        <a href="javascript:history.back()" class="mdl-checkout-sucesso--link">Voltar</a>
            </div>
        </div>
			
			<BR><BR><BR>&nbsp;</div>
      <?php include("hml-Parte2MDN.htm");?> 
<?php			

		}
		else{
		if ($resjson['data_response']['transaction']['payment']['payment_response_code'] == '0'){
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

        
        <div class="row justify-content-center text-center">
            <div class="col-md-4">
                        <div class="mdl-checkout-sucesso--icon"></div>
                        <h2 class="mdl-checkout-sucesso--title">Parabéns por assinar o portal MundoLogística!</h2>
                        <p class="mdl-checkout-sucesso--text">
                            Agora você já pode ter acesso ao conteúdo e solicitar as suas edições da revista. 
                        </p>

                        <a href="#" class="mdl-checkout-sucesso--link">Ir para o início</a>
            </div>
        </div>
        
    </div>


    <script>
        "use strict";

window.onload = function () {
  // Globals
  var random = Math.random,
    cos = Math.cos,
    sin = Math.sin,
    PI = Math.PI,
    PI2 = PI * 2,
    timer = undefined,
    frame = undefined,
    confetti = [];

  var particles = 10,
    spread = 40,
    sizeMin = 3,
    sizeMax = 12 - sizeMin,
    eccentricity = 10,
    deviation = 100,
    dxThetaMin = -0.1,
    dxThetaMax = -dxThetaMin - dxThetaMin,
    dyMin = 0.13,
    dyMax = 0.18,
    dThetaMin = 0.4,
    dThetaMax = 0.7 - dThetaMin;

  var colorThemes = [
    function () {
      return color(
        (200 * random()) | 0,
        (200 * random()) | 0,
        (200 * random()) | 0
      );
    },
    function () {
      var black = (200 * random()) | 0;
      return color(200, black, black);
    },
    function () {
      var black = (200 * random()) | 0;
      return color(black, 200, black);
    },
    function () {
      var black = (200 * random()) | 0;
      return color(black, black, 200);
    },
    function () {
      return color(200, 100, (200 * random()) | 0);
    },
    function () {
      return color((200 * random()) | 0, 200, 200);
    },
    function () {
      var black = (256 * random()) | 0;
      return color(black, black, black);
    },
    function () {
      return colorThemes[random() < 0.5 ? 1 : 2]();
    },
    function () {
      return colorThemes[random() < 0.5 ? 3 : 5]();
    },
    function () {
      return colorThemes[random() < 0.5 ? 2 : 4]();
    }
  ];
  function color(r, g, b) {
    return "rgb(" + r + "," + g + "," + b + ")";
  }

  // Cosine interpolation
  function interpolation(a, b, t) {
    return ((1 - cos(PI * t)) / 2) * (b - a) + a;
  }

  // Create a 1D Maximal Poisson Disc over [0, 1]
  var radius = 1 / eccentricity,
    radius2 = radius + radius;
  function createPoisson() {
    // domain is the set of points which are still available to pick from
    // D = union{ [d_i, d_i+1] | i is even }
    var domain = [radius, 1 - radius],
      measure = 1 - radius2,
      spline = [0, 1];
    while (measure) {
      var dart = measure * random(),
        i,
        l,
        interval,
        a,
        b,
        c,
        d;

      // Find where dart lies
      for (i = 0, l = domain.length, measure = 0; i < l; i += 2) {
        (a = domain[i]), (b = domain[i + 1]), (interval = b - a);
        if (dart < measure + interval) {
          spline.push((dart += a - measure));
          break;
        }
        measure += interval;
      }
      (c = dart - radius), (d = dart + radius);

      // Update the domain
      for (i = domain.length - 1; i > 0; i -= 2) {
        (l = i - 1), (a = domain[l]), (b = domain[i]);
        // c---d          c---d  Do nothing
        //   c-----d  c-----d    Move interior
        //   c--------------d    Delete interval
        //         c--d          Split interval
        //       a------b
        if (a >= c && a < d)
          if (b > d) domain[l] = d;
          // Move interior (Left case)
          else domain.splice(l, 2);
        // Delete interval
        else if (a < c && b > c)
          if (b <= d) domain[i] = c;
          // Move interior (Right case)
          else domain.splice(i, 0, c, d); // Split interval
      }

      // Re-measure the domain
      for (i = 0, l = domain.length, measure = 0; i < l; i += 2)
        measure += domain[i + 1] - domain[i];
    }

    return spline.sort();
  }

  // Create the overarching container
  var container = document.createElement("div");
  container.style.position = "fixed";
  container.style.top = "0";
  container.style.left = "0";
  container.style.width = "100%";
  container.style.height = "0";
  container.style.overflow = "visible";
  container.style.zIndex = "9999";

  // Confetto constructor
  function Confetto(theme) {
    this.frame = 0;
    this.outer = document.createElement("div");
    this.inner = document.createElement("div");
    this.outer.appendChild(this.inner);

    var outerStyle = this.outer.style,
      innerStyle = this.inner.style;
    outerStyle.position = "absolute";
    outerStyle.width = sizeMin + sizeMax * random() + "px";
    outerStyle.height = sizeMin + sizeMax * random() + "px";
    innerStyle.width = "100%";
    innerStyle.height = "100%";
    innerStyle.backgroundColor = theme();

    outerStyle.perspective = "50px";
    outerStyle.transform = "rotate(" + 360 * random() + "deg)";
    this.axis =
      "rotate3D(" + cos(360 * random()) + "," + cos(360 * random()) + ",0,";
    this.theta = 360 * random();
    this.dTheta = dThetaMin + dThetaMax * random();
    innerStyle.transform = this.axis + this.theta + "deg)";

    this.x = window.innerWidth * random();
    this.y = -deviation;
    this.dx = sin(dxThetaMin + dxThetaMax * random());
    this.dy = dyMin + dyMax * random();
    outerStyle.left = this.x + "px";
    outerStyle.top = this.y + "px";

    // Create the periodic spline
    this.splineX = createPoisson();
    this.splineY = [];
    for (var i = 1, l = this.splineX.length - 1; i < l; ++i)
      this.splineY[i] = deviation * random();
    this.splineY[0] = this.splineY[l] = deviation * random();

    this.update = function (height, delta) {
      this.frame += delta;
      this.x += this.dx * delta;
      this.y += this.dy * delta;
      this.theta += this.dTheta * delta;

      // Compute spline and convert to polar
      var phi = (this.frame % 7777) / 7777,
        i = 0,
        j = 1;
      while (phi >= this.splineX[j]) i = j++;
      var rho = interpolation(
        this.splineY[i],
        this.splineY[j],
        (phi - this.splineX[i]) / (this.splineX[j] - this.splineX[i])
      );
      phi *= PI2;

      outerStyle.left = this.x + rho * cos(phi) + "px";
      outerStyle.top = this.y + rho * sin(phi) + "px";
      innerStyle.transform = this.axis + this.theta + "deg)";
      return this.y > height + deviation;
    };
  }

  function poof() {
    if (!frame) {
      // Append the container
      document.body.appendChild(container);

      // Add confetti
      var theme = colorThemes[0],
        count = 0;
      (function addConfetto() {
        var confetto = new Confetto(theme);
        confetti.push(confetto);
        container.appendChild(confetto.outer);
        timer = setTimeout(addConfetto, spread * random());
      })(0);

      // Start the loop
      var prev = undefined;
      requestAnimationFrame(function loop(timestamp) {
        var delta = prev ? timestamp - prev : 0;
        prev = timestamp;
        var height = window.innerHeight;

        for (var i = confetti.length - 1; i >= 0; --i) {
          if (confetti[i].update(height, delta)) {
            container.removeChild(confetti[i].outer);
            confetti.splice(i, 1);
          }
        }

        if (timer || confetti.length)
          return (frame = requestAnimationFrame(loop));

        // Cleanup
        document.body.removeChild(container);
        frame = undefined;
      });
    }
  }

  poof();
};

    </script>
</body>
</html>
<?php
         }
		 else{
   
?>

<?php include("hml-Parte1MDN.htm"); ?>
          <div class="row justify-content-center text-center">
            <div class="col-md-4">
                      
                        <h2 class="mdl-checkout-sucesso--title">Problemas com o pagamento!</h2>
                        <p class="mdl-checkout-sucesso--text">
                        Revise os seus dados, ou entre em contato com sua operadora de cartão ou com a MundoLogística por email assinaturas@mundologistica.com.br ou pelo telefone (44) 3041-3919.
                        </p>

                        <a href="javascript:history.back()" class="mdl-checkout-sucesso--link">Voltar</a>
            </div>
        </div>
			
      <?php include("hml-Parte2MDN.htm"); ?>
<?php
         }
		}
	
	}
	else{

?>
     <?php include("hml-Parte1MDN.htm"); ?>
     <div class="row justify-content-center text-center">
            <div class="col-md-4">
                      
                        <h2 class="mdl-checkout-sucesso--title">Problemas com o pagamento!</h2>
                        <p class="mdl-checkout-sucesso--text">
                        Revise os seus dados, ou entre em contato com sua operadora de cartão ou com a MundoLogística por email assinaturas@mundologistica.com.br ou pelo telefone (44) 3041-3919.
                        </p>

                        <a href="javascript:history.back()" class="mdl-checkout-sucesso--link">Voltar</a>
            </div>
        </div>
			
<?php include("hml-Parte2MDN.htm"); ?>
<?php	

	}

	curl_close($curl);
?>


       
