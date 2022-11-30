<?
date_default_timezone_set('America/Sao_Paulo');

function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}

$nmsite = "MundoLogística - portal e revista de logística e supply chain";

if ($_SERVER['HTTP_HOST'] == "localhost") {
	$_host = "localhost";
	$_database = "mundologistica";
	$_user = "root";
	$_password = "";
	$url_total = "http://".$_SERVER['HTTP_HOST']."/mundologistica/";
}
else {
	$_host = "macanml.mysql.dbaas.com.br";
	$_database = "macanml";
	$_user = "macanml";
	$_password = "macan#123";
	if ($_SERVER['HTTP_HOST'] = "revistamundologistica.com.br" OR $_SERVER['HTTP_HOST'] = "mundologistica.com.br") {
		if (isSecure()){
			$url_total = "https://".$_SERVER['HTTP_HOST']."/";
		}else{
			$url_total = "http://".$_SERVER['HTTP_HOST']."/";
		}
	}
	else {
		$url_total = "https://revistamundologistica.com.br/";
	}
	$url_total = "https://mundologistica.com.br/";
}
$url_base = $url_total;

$con = mysqli_connect($_host, $_user, $_password, $_database);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_results=utf8');

/*
$conn = mysql_connect($_host, $_user, $_password);
mysql_select_db($_database);

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
*/

function urlAmigavel($str, $enc = "UTF-8"){
	$separador = "-";
	
	$acentos = array(
	'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
	'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
	'C' => '/&Ccedil;/',
	'c' => '/&ccedil;/',
	'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
	'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
	'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
	'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
	'N' => '/&Ntilde;/',
	'n' => '/&ntilde;/',
	'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
	'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
	'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
	'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
	'Y' => '/&Yacute;/',
	'y' => '/&yacute;|&yuml;/',
	'a.' => '/&ordf;/',
	'o.' => '/&ordm;/');
	
	$a = preg_replace($acentos,
						   array_keys($acentos),
						   htmlentities($str,ENT_NOQUOTES, $enc));
	
	$caracteres = array("&", "/", "?", "\\", ":", "amp;",",",".","%", "#");
	
	$a = str_replace($caracteres,"",$a);
	$a = trim($a);
	@$a = str_replace(" ", $separador, $a);
	$a = strtolower($a);
   return $a;
}
/*
if ($_FILES) {
	$arrExt = array("php","php5","php4","php","php3","php2","phtml","pl","py","jsp,","asp","htm","shtml","sh","cgi");
	foreach ($_FILES as $campo => $valor) {
		if (!is_array($valor)){
			$arquivo_name = $_FILES[$campo]["name"];
			$arquivo = pathinfo($arquivo_name);
			if (in_array($arquivo["extension"],$arrExt)){
				print "Arquivo não permitido para upload.";
				print "<a href='javascript:history.go(-1)'>Clique aqui</a> para voltar.";
				exit;
			}
		}
	}
}
*/

define("ROOT", realpath(dirname(__FILE__)));

function autoload($class_name) {
    $stclass = ROOT . "/classes/" . $class_name . ".class.php";
    if (file_exists($stclass))	{
        require_once($stclass);
    }
    else	{
        die("<b>Erro fatal classe não encontrada.</b>");
    }
}
spl_autoload_register("autoload");

function formataData($data,$tipo = null){
	if ($tipo == 'output'){
		return implode('/',(array_reverse(explode('-', $data))));
	} else{
		return implode('-',(array_reverse(explode('/', $data))));
	} 
}

$meses = array(1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
?>