<?
$pg = "Quem Somos";
$obj = new empresa();
$tab = "empresa";
if ($id) {
	$select = $obj->getRegistro($id,$con);
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo] | $nmsite";
		$canonical = $url_total . "$atual/$id";
	}
	else {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_total."$atual");  
		exit();	
	}
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_topo.php");
?>
<article class="container">
	<h1>Quem Somos</h1>
    <?
	$obj = new empresa();
	$select = $obj->getRegistro('',$con);
	$dados = mysqli_fetch_array($select);
	print "$dados[texto]\n";
	?>
	<p>&nbsp;</p>
</article>
<?
include("_rodape.php");
?>