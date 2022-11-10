<?
if (!$_COOKIE["loginNome"]){
	print "<script>alert('Apenas para usuários registrados.');window.location='$url_total'</script>";
	exit();
}
session_start();
if ($_POST){
	$_SESSION["busca"]=array();
	$_SESSION["busca"]["sessoes_search"]=$_POST["sessoes_search"];
	$_SESSION["busca"]["busca_original"]= $_POST["busca"];
	$_SESSION["busca"]["busca"]= implode("%",explode(" ",$_POST["busca"]));
	
	mysqli_query($con,"INSERT INTO busca_portal VALUES (null,'".$_COOKIE["loginNome"]."','".implode(", ",$_POST["sessoes_search"])."','".implode("%",explode(" ",$_POST["busca"]))."',now())");
	
	header("Location: ".$url_total."busca");
	exit();
}
$pg = "Pesquisa";
$titulo = "$pg | $nmsite";
$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
include("_topo.php");

$url_normal="https://mundologistica.com.br/";
$url_seguro="https://mundologistica.com.br/";
$arrURLS = array(
	"pdfs"=>$url_seguro,
	"artigo"=>$url_normal,
	"noticia"=>$url_normal,
	"entrevista"=>$url_normal,
	"blog"=>$url_normal,
	"webinar"=>$url_normal
);
$arrURLSpgs = array(
	"pdfs"=>$url_seguro,
	"artigo"=>"artigos",
	"noticia"=>"noticias",
	"entrevista"=>"entrevistas",
	"blog"=>"blog",
	"webinar"=>"webinar"
);
$arrNMs = array(
	"pdfs"=>"Artigos da Revista",
	"artigo"=>"Artigos do Portal",
	"noticia"=>"Notícias",
	"entrevista"=>"Entrevistas",
	"blog"=>"Blog",
	"webinar"=>"Webinars"
);
$arrCOLUNAS = array(
	"pdfs"=>array("titulo","texto"),
	"artigo"=>array("titulo","texto"),
	"noticia"=>array("titulo","noticia"),
	"entrevista"=>array("titulo","texto"),
	"blog"=>array("titulo","texto"),
	"webinar"=>array("titulo","palestrante")
);
?>
<div style="background:#fff">
	<p>&nbsp;</p>
	<article>
	<div class="searchbar">
		<div class="container">
			<div class="row">
				<form method="POST" action="<?=$url_total?>busca">
				<div class="col-md-8">
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox1" value="pdfs" checked="checked" /> Artigos da Revista
					</label>
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox1" value="artigo" checked="checked" /> Artigos do Portal
					</label>
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox2" value="noticia" checked="checked" /> Notícias
					</label>
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox4" value="entrevista" checked="checked" /> Entrevistas
					</label>
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox3" value="blog" checked="checked" /> Blog
					</label>
					<label class="form-check form-check-inline">
						<input type="checkbox" name="sessoes_search[]" id="inlineCheckbox3" value="webinar" checked="checked" /> Eventos/Webinars
					</label>
				</div>
				
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-7"><input class="form-control" id="appendedInputButton" type="text" name="busca" value="<?=$_SESSION["busca"]["busca_original"]?>" /></div>
						<div class="col-md-4"><button class="btn btn-default" type="submit">Buscar</button></div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	</article>
<article class="container txtBusca">
	<h1 style="margin-bottom:.5em">Pesquisa</h1>
    <?
	if ($_SESSION["busca"]["busca"]){
		print "<p>Resultados para a pesquisa: <strong>".$_SESSION["busca"]["busca_original"]."</strong>.</p>";
	}
	
	if ($id){ 
	
	
		// Evento
		if ($id=="evento"){
			print "<p>&nbsp;</p>";
			print "<h4>Eventos</h4>\n";
			
			$colunasQuery="tb1.titulo like '%".$_SESSION["busca"]["busca"]."%' OR tb1.texto_inicial like '%".$_SESSION["busca"]["busca"]."%' OR tb1.como_funciona like '%".$_SESSION["busca"]["busca"]."%' OR tb1.publico_alvo like '%".$_SESSION["busca"]["busca"]."%' OR tb2.palestra like '%".$_SESSION["busca"]["busca"]."%' OR tb2.palestrante like '%".$_SESSION["busca"]["busca"]."%'";
		
			$sql=mysqli_query($con,"
			SELECT tb1.titulo, tb1.link_restrito 
			FROM evento tb1
			LEFT JOIN evento_agenda tb2 ON tb1.id = tb2.id_evento
			WHERE $colunasQuery 
			ORDER BY tb1.id DESC");
			if (mysqli_num_rows($sql)){
				while($d=mysqli_fetch_array($sql)){
					$url=$d["link_restrito"];
					
					print "<p class='titulo'>&bull;<strong> <a href='$url' style='font-size:.9em' target='_blank'>$d[titulo]</a></strong></p>";
				}
				$a++;
			}
		}
		// Evento
		
		// Todas
		else {
	
	
	
			print "<p>&nbsp;</p>";
			$colunasQuery = $arrCOLUNAS[$id];
			foreach($colunasQuery as $chave => $valor){
				$colunasQuery[$chave] = "$valor like '%".$_SESSION["busca"]["busca"]."%'";
			}
			$colunasQuery = implode(" OR ", $colunasQuery);
			
			print "<h4>".$arrNMs[$id]."</h4>\n";
			
			$colunaQUERY="titulo";
			if ($id=="artigo"){
				$colunaQUERY="titulo, texto";
			}
			if ($id=="pdfs"){
				$colunaQUERY="titulo, texto, pdf";
			}
			if ($id=="webinar"){
				$colunaQUERY="titulo, nm_arquivo";
			}
			if ($id=="blog"){
				$colunaQUERY="titulo, texto, id_colunista";
			}
			
			if ($_GET["pg"]) {
				$pg = strip_tags($_GET["pg"]);
				$pg = $pg - 1;
			}
			else {
				$pg = 0;
			}
			
			$lmt = $pg * 10;
			
			$sql=mysqli_query($con,"SELECT $colunaQUERY FROM $id WHERE $colunasQuery ORDER BY id DESC LIMIT $lmt,10");
			if (mysqli_num_rows($sql)){
				
				while($d=mysqli_fetch_array($sql)){
					if ($id=="blog"){
						$d3=mysqli_fetch_array(mysqli_query($con,"SELECT usuario FROM colunista WHERE id='$d[id_colunista]'"));
					}
					
					$d["url"]=urlAmigavel($d["titulo"]);
					if ($id=="pdfs"){
						$url="https://mundologistica.com.br/servlet/LeArtigo?artigo=".$d["pdf"];
					}
					elseif ($id=="webinar"){
						$url="https://mundologistica.com.br/Webinar.jsp?webinar=".$d["nm_arquivo"];
					}
					elseif ($id=="blog"){
						$url=$arrURLS[$id].$arrURLSpgs[$id]."/$d3[usuario]/$d[url]";
					}
					else {
						$url=$arrURLS[$id].$arrURLSpgs[$id]."/$d[url]";
					}
					
					print "<p class='titulo'>&bull; <a href='$url' style='font-size:.9em' target='_blank'>$d[titulo]</a></p>";
					if ($id=="artigo" OR $id=="pdfs"){
						print "<p style='font-size:.7em; text-align:justify'>".(substr( strip_tags($d["texto"]), 0, 160))."...</p>\n";
					}
				}
				
			}
			
			
			/* Paginação */
			$sql = mysqli_query($con,"SELECT $colunaQUERY FROM $id WHERE $colunasQuery ORDER BY id DESC");
			$numLinhas = mysqli_num_rows($sql);
			if ($numLinhas > 10) {
			
				// Classe Zebra_Pagination
				$records_per_page = 10;
				require 'Zebra_Pagination.php';
				$pagination = new Zebra_Pagination();
				$pagination->records($numLinhas);
				$pagination->records_per_page($records_per_page);
				$pagination->render();
				
				print "<p>&nbsp;</p>";
			}
			/* Paginação */
		
		
	
		} 
	} 
	
	
	
	else { // Index
		print "<div class='row'>\n";
		$a=1;
		foreach($_SESSION["busca"]["sessoes_search"] as $key => $value){
			
			$montaQuery = null;
			$colunasQuery = $arrCOLUNAS[$value];
			foreach($colunasQuery as $chave => $valor){
				$colunasQuery[$chave] = "$valor like '%".$_SESSION["busca"]["busca"]."%'";
			}
			$colunasQuery = implode(" OR ", $colunasQuery);
			
			$colunaQUERY="titulo";
			if ($value=="artigo"){
				$colunaQUERY="titulo, texto";
			}
			if ($value=="pdfs"){
				$colunaQUERY="titulo, texto, pdf";
			}
			if ($value=="webinar"){
				$colunaQUERY="titulo, nm_arquivo";
			}
			if ($value=="blog"){
				$colunaQUERY="titulo, texto, id_colunista";
			}
			
			$sql2=mysqli_query($con,"SELECT $colunaQUERY FROM $value WHERE $colunasQuery ORDER BY id DESC");
			$sql=mysqli_query($con,"SELECT $colunaQUERY  FROM $value WHERE $colunasQuery ORDER BY id DESC LIMIT 0,3");
			if (mysqli_num_rows($sql)){
				print "<div class='col-md-6'>
				<h4>".$arrNMs[$value]."</h4>\n";
				while($d=mysqli_fetch_array($sql)){
					if ($value=="blog"){
						$d3=mysqli_fetch_array(mysqli_query($con,"SELECT usuario FROM colunista WHERE id='$d[id_colunista]'"));
					}
					
					$d["url"]=urlAmigavel($d["titulo"]);
					if ($value=="pdfs"){
						$url="https://mundologistica.com.br/servlet/LeArtigo?artigo=".$d["pdf"];
					}
					elseif ($value=="webinar"){
						$url="https://mundologistica.com.br/Webinar.jsp?webinar=".$d["nm_arquivo"];
					}
					elseif ($value=="blog"){
						$url=$arrURLS[$value].$arrURLSpgs[$value]."/$d3[usuario]/$d[url]";
					}
					else {
						$url=$arrURLS[$value].$arrURLSpgs[$value]."/$d[url]";
					}
					
					print "<p class='titulo'>&bull; <a href='$url' style='font-size:.9em' target='_blank'>$d[titulo]</a></p>";
					if ($value=="artigo" OR $value=="pdfs"){
						print "<p style='font-size:.7em'>".(substr( strip_tags($d["texto"]), 0, 150))."...</p>\n";
					}
				}
				
				if (mysqli_num_rows($sql2)>3){
					print "<p><a href='$atual/$value'><strong style='font-size:.9em'>+ $arrNMs[$value]</strong></a></p>";
				}
				
				print "</div>\n";
				$a++;
			}
			
			
			if ($a > 2){
				print "</div>
				<div class='clear'></div>
				<p>&nbsp;</p>
				<div class='row'>\n";
				$a=1;
			}
		}
		
		// EVENTO
		$colunasQuery="tb1.titulo like '%".$_SESSION["busca"]["busca"]."%' OR tb1.texto_inicial like '%".$_SESSION["busca"]["busca"]."%' OR tb1.como_funciona like '%".$_SESSION["busca"]["busca"]."%' OR tb1.publico_alvo like '%".$_SESSION["busca"]["busca"]."%' OR tb2.palestra like '%".$_SESSION["busca"]["busca"]."%' OR tb2.palestrante like '%".$_SESSION["busca"]["busca"]."%'";
		
		$sql2=mysqli_query($con,"
		SELECT tb1.titulo 
		FROM evento tb1
		LEFT JOIN evento_agenda tb2 ON tb1.id = tb2.id_evento
		WHERE $colunasQuery 
		GROUP BY tb1.id
		ORDER BY tb1.id DESC
		");
		$sql=mysqli_query($con,"
		SELECT tb1.titulo, tb1.link_restrito 
		FROM evento tb1
		LEFT JOIN evento_agenda tb2 ON tb1.id = tb2.id_evento
		WHERE $colunasQuery 
		GROUP BY tb1.id
		ORDER BY tb1.id DESC
		LIMIT 0,3");
		if (mysqli_num_rows($sql)){
			print "<div class='col-md-6'>
			<h4>Eventos</h4>\n";
			while($d=mysqli_fetch_array($sql)){
				$url=$d["link_restrito"];
				
				print "<p class='titulo'>&bull; <a href='$url' style='font-size:.9em' target='_blank'>$d[titulo]</a></p>";
			}
			
			if (mysqli_num_rows($sql2)>3){
				print "<p><a href='$atual/evento'><strong style='font-size:.9em'>+ Eventos</strong></a></p>";
			}
			
			print "</div>\n";
			$a++;
		}
		// EVENTO
		
		
		print "</div>\n";
	
	
	}
	
	?>
	<p>&nbsp;</p>
</article>
</div>
<?
include("_rodape.php");
?>