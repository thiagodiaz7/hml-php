<?
$msgAgradecimento = false;
if ($_POST["cadStartup"]) {
	
	foreach($_POST as $chave => $valor) {
		$_POST[$chave] = strip_tags($valor);
	}
	extract($_POST);
	
	// Add Banco de Dados
	$arquivo_name = $_FILES["logo_startup"]["name"];
	$arquivo_tmp = $_FILES["logo_startup"]["tmp_name"];
	
	if ($arquivo_name) {
		$nomenew = time() . "-" . $arquivo_name;
		copy($arquivo_tmp, ROOT . "/galeria/" . $nomenew);
		$logo_startup = $nomenew;
	}
	
	mysqli_query($con, "INSERT INTO startup (titulo, nm_contato, telefone_contato, email_contato, logo_startup, descricao_startup, id_categoria, investimento, faturamento, site, data_cadastro) VALUES ('$titulo','$nm_contato','$telefone_contato','$email_contato','$logo_startup','$descricao_startup','$id_categoria','$investimento','$faturamento','$site',now())");
	
	
	
	$mensagem = nl2br($mensagem);
	
	if (!$pagina_referencia) {
		$pagina_referencia = "inicial";
	}
	
	
	$emailsender= 'startup@mundologistica.com.br';
	 
	/* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
	if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
	elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
	else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
	 
	// Passando os dados obtidos pelo formulário para as variáveis abaixo
	$nomeremetente     = $nm_contato;
	$emailremetente    = $email_contato;
	$emaildestinatario = 'startup@revistamundologistica.com.br';
	//$comcopiaoculta    = trim($_POST['comcopiaoculta']);
	$assunto           = "Cadastro de Startup ($titulo)";
	
	$mensagem = nl2br($mensagem);
	
	/* Montando a mensagem a ser enviada no corpo do e-mail. */
	$mensagemHTML = "<p>Nome Startup: $titulo<br />Nome Contato: $nm_contato<br />E-mail: $email_contato<br />Telefone: $telefone_contato<br />Descrição: $descricao_startup<br/>Investimento: $investimento<br />Faturamento: $faturamento</p>";
	 
	 
	/* Montando o cabeçalho da mensagem */
	$headers = "MIME-Version: 1.1".$quebra_linha;
	$headers .= "Content-type: text/html; charset=UTF-8".$quebra_linha;
	// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
	$headers .= "From: ".$emailsender.$quebra_linha;
	$headers .= "Return-Path: " . $emailsender . $quebra_linha;
	// Esses dois "if's" abaixo são porque o Postfix obriga que se um cabeçalho for especificado, deverá haver um valor.
	// Se não houver um valor, o item não deverá ser especificado.
	if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
	if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
	$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
	// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
	 
	if (mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender)) {
	
	?>
	<script type="text/javascript">	
		window.location = '<?= $url_total . $atual; ?>?cadastro=true&retorno=true';
	</script>
	<?
	}
	else {
		?>
		<script type="text/javascript">
		alert("Erro ao enviar e-mail. Por favor, tente novamente.");
		window.location = '<?= $url_total . $atual; ?>';
		</script>
		<?
	}
	exit();
}

$pg = "Startup - Cadastro";
$titulo = "$pg | $nmsite";
$mapaFrame = true;
include("_topo.php");
?>
	
	<? if (!$_GET["retorno"]) { ?>
	
	<div class="ne_cu_map_main_wrapper">
<article class="container">
<div class='row'>
		
		
		<div class='col-md-8'>
		
		<div class='ne_map_content_wrapper ne_map_content_wrapper2'>
		<div class='bkBranco'>
		<div class='row'>
			<div class='col-md-12'>
			<div class="ne_busness_main_slider_wrapper" style="margin:0 0 0 0">
			<div class="ne_recent_heading_main_wrapper">
			
			<h1><?=$pg?></h1>
			<p>&nbsp;</p>
			<p>Preencha o formulário abaixo para cadastrar sua Startup no portal da Revista MundoLogística. Em breve lançaremos um catálogo de Startups para divulgar ao mercado! <BR><BR>
			Em caso de dúvidas, entre em contato conosco pelo telefone (44)3041-3919 ou pelo email startup@mundologistica.com.br</p>
			<p id="returnmsg" style="color:#ff7800"></p>
			<form class="form-horizontal " id="form" action="<?= $url_total . $atual ?>?cadastro=true" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="cadStartup" value="true" />
				
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="titulo" placeholder="Nome da Startup *" required />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="nm_contato" placeholder="Nome do contato *:" required />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="email_contato" placeholder="E-mail de contato *" required />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="telefone_contato" placeholder="Telefone *" required />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="investimento" placeholder="Investimento já obtido" />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<input type="text" name="faturamento" placeholder="Faturamento anual" />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2Large">
					<input type="text" name="site" placeholder="Site" />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2Large" style="height:auto">
					<textarea name="descricao_startup" rows="10" id="mensagemForm" placeholder="Descrição detalhada da startup"></textarea>
				</div>
				
				<div class="ne_map_form_input1 ne_map_form_input2" style="text-align:left">
					<label class="control-label" style="width:auto;display:block;text-align:left;margin-bottom:5px">Logotipo (tamanho máx. 300x200) *:</label>
					<input type="file" name="logo_startup" required />
				</div>
				<div class="ne_map_form_input1 ne_map_form_input2">
					<label class="control-label" style="width:auto;display:block;text-align:left;margin-bottom:5px">Categoria principal *:</label>
					<select name="id_categoria" class="input-block-level" required>
						<option value="">Selecione</option>
						<?
						$sql = mysqli_query($con,"SELECT titulo, id FROM startup_categoria ORDER BY titulo ASC");
						while ($d = mysqli_fetch_array($sql)) {
							print "<option value='$d[id]'>$d[titulo]</option>\n";
						}
						?>
					</select>
				</div>
				
				<p>&nbsp;</p>
				<div class="control-group">
					<button id="submit" class="button">Cadastrar</button>
				</div>
			</form>
		</div>
		
		<?
		
		print "
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Categorias</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM startup_categoria ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper'>
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
		
		
		
		</div>
		
		\n";
	?>
			<div class="clearfix"></div>
</article>
</div>
		
		
		
	<? } else { ?>
	
		<div class="ne_cu_map_main_wrapper">
<article class="container">
<div class='row'>
		
		
		<div class='col-md-8'>
		
		<div class='ne_map_content_wrapper ne_map_content_wrapper2'>
		<div class='bkBranco'>
		<div class='row'>
			<div class='col-md-12'>
			<div class="ne_busness_main_slider_wrapper" style="margin:0 0 0 0">
			<div class="ne_recent_heading_main_wrapper">
			
		
		<h2>Obrigado por cadastrar sua Startup!</h2>
			<p>&nbsp;</p>
	
		<p>Agora o seu cadastro será validado e em breve o catálogo de Startups estará disponível para consulta! Os manteremos informados!<BR>
		Caso tenha alguma dúvida entre em contato conosco pelo email startup@mundologistica.com.br.
		</p>
		<p>&nbsp;</p>
		<div class='txtCenter'><a href='<?=$atual?>' class='button'>Voltar</a></div>
		<p>&nbsp;</p><p>&nbsp;</p>
		
		<?
		
		print "
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Categorias</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM startup_categoria ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper'>
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
		
		
		
		</div>
		
		\n";
	?>
			<div class="clearfix"></div>
</article>
</div>
		
		
	<? } ?>

	
<? include("_rodape.php"); ?>