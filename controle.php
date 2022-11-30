<?

session_start();


include("config.php");
// CONTROLE 2.0
// OTIMIZAÇÃO DE SITES AGÊNCIA MACAN
// Visite: http://www.agenciamacan.com.br

$url = strip_tags($_SERVER['REQUEST_URI']);
$parametros = explode("?", $url);
if ($parametros[1]) {
	$url = $parametros[0];
}

$url_array = explode("/", $url);

array_shift($url_array);

$url_array = array_filter( $url_array );

if (empty($url_array) or $url_array[0] == ""){ 
	include("index.php");
}

else {	      

	$atual = $url_array[0];
	$id = $url_array[1];
	$id2 = $url_array[2];
	$id3 = $url_array[3];
	$id4 = $url_array[4];
	
	
	$paginas = array(
		"cliques" => "pg-cliques.php",
		"busca" => "pg-busca.php",
		"index2" => "index2.php",
		"trilhas" => "pg-trilhas.php",
		"checkout" => "checkout.php",
		"contato" => "pg-contato.php",
		"quem-somos" => "pg-quemsomos.php",
		"entrevistas" => "pg-entrevista.php",
		"noticias" => "pg-noticias.php",
		"noticias2" => "pg-noticias2.php",
		"glossario" => "pg-glossario.php",
		"artigos" => "pg-artigos.php",
		"blog" => "pg-blog.php",
		"blog2" => "pg-blog2.php",
		"startup" => "pg-startup.php",
		"revista" => "pg-revista.php",
		"livros" => "pg-livros.php",
		"livrodg" => "pg-livros-dg.php",
		"eventos" => "pg-eventos.php",
		"podcast" => "pg-podcast.php",
		"anuncie" => "pg-anuncie.php",
		"newsletter" => "pg-newsletter.php",
		"LoginIniWebinar.jsp" => "LoginIniWebinar.jsp",
		"loginwebinar" => "pg-webinarlogin.php",
		"webinar" => "pg-webinar.php",
		"workshops-online" => "pg-e-workshop.php",
		"eventos-online" => "pg-e-evento.php",
		"eventos-online2" => "pg-e-evento2.php",
		"identificacao" => "pg-identificacao.php",
		"pesquisamlog" => "pg-pesquisaed.php",
		"logistiforum-confirmacao" => "pg-logistiforumc.php",
		"aulagestaoleanarmazem" => "aulagestaoleanarmazem.php",
		"pesquisaeventool" => "pesquisaeventool.php",
		"horalogistica-confirmacao" => "pg-horalogisticac.php",
		"horalogistica-confirmacao-premio" => "pg-horalogisticac-premio.php",
		"planilhas-livro-leanc" => "pg-planilhas-livro-leanc.php",
		"webinar-riachuelo" => "webinar-ssi.php",
		"web-rchlo" => "webinar-rchlo.php",
		"politica-privacidade" => "pg-politicaprivacidade.php",
		"forummlog" => "pg-forum.php",
		"manter-se-atualizado" => "pg-manteratualizado.php",
		"ldc-in-house" => "ldc-in-house.php",
		"log-futuro" => "logfuturo.php",
		"log-futuro-assinante" => "logfuturoassinante.php",
		"premiobbm" => "pg-premio.php",
		"case-henrique-stefani" => "pg-case-hs.php",
		"webinar-tecnologiavidas" => "pg-webinar-tecnologiavidas.php",
		"ra" => "pg-ra.php",
		"notificacao" => "notificacaoVindi.php",
		"materiais-exclusivos" => "pg-materiais-exclusivos.php",
		"revista-digital" => "pg-revista-digital.php",
		"hml" => "hml-index.php",
		"hml-podcast" => "hml-podcast.php",
		"hml-entrevistas" => "hml-entrevista.php",
		"hml-artigos" => "hml-artigos.php",
		"hml-webinar" => "hml-webinar.php",
		"hml-colunas" => "hml-colunas.php",
		"hml-podcast" => "hml-podcast.php",
		"hml-noticias" => "hml-noticias.php",
		"hml-revista" => "hml-revista.php",
		"hml-assine" => "hml-manteratualizado.php",
		"hml-checkout" => "hml-checkout.php",
		"hml-compra" => "hml-revista-compraassinatura-vindi.php",
		"hml-payment" => "hml-Assinatura-Vindi.jsp"
	);
	
	
	
	// SESSÕES
	$urlAtual = $paginas[$atual];
	
	if ($urlAtual) {
		include($urlAtual);
		exit();
	}
	else {
		if ($atual != "") {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url_total");  
			exit();
		}
		include("index.php");
	}
}
?>