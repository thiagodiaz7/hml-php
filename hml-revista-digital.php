<?
if (!$_COOKIE["loginNome"]){
	header("Location: ".$url_total."LoginIni.jsp");  
	exit();
}



$pg = "Revista Digital";
$titulo = "$pg | $nmsite";
include("_topo.php");
?>
<div style="background:#fff;padding:40px 0">


<div align="center"><p><BR>&nbsp;</p><a href="/Assinante.jsp"><img src="/images/assinante/voltar3.jpg" border="0" /></a><BR><BR>&nbsp;</div>

<div class="ne_recent_news_main_wrapper" style="background:#fff;padding:40px 0">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		
<?
		print "
		
		<div class='row'>
		<div class='col-md-12'>
		\n";
		?>
		
		<div class="ne_busness_main_slider_wrapper" style="margin:0 0 30px 0">
			<div class="ne_recent_heading_main_wrapper">
				<h1><?=$pg?></h1>
			</div>
		</div>
		<?
		
		
		if ($_GET["pg"]) {
			$pg = strip_tags($_GET["pg"]);
			$pg = $pg - 1;
		}
		else {
			$pg = 0;
		}
		
		$lmt = $pg * 15;
		
		
		$sql = mysqli_query($con,"
		SELECT tb1.edicao, tb2.iframe
		FROM revista tb1
		INNER JOIN revista_iframe tb2 ON tb1.id = tb2.id_revista
		WHERE tb2.iframe != ''
		GROUP BY tb1.id
		ORDER BY tb1.id DESC 
		LIMIT $lmt,15");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			
			while ($d = mysqli_fetch_array($sql)) {
				
				
				
				?>
				<div class="col-md-4">
					<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
						<div class="ne_re_left_top_main_wrapper">
							
							<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper">
								<h3 class="text-center">Edição <?=$d["edicao"]?></h3>
								<div class="iframe_revista_digital"><?=$d["iframe"]?></div>
							</div>
						</div>
					</div>
				</div>
				<?
				
			}
			print "</div>\n";
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		
		/* Paginação */
		$sql = mysqli_query($con,"SELECT tb1.titulo, tb2.iframe
		FROM revista tb1
		INNER JOIN revista_iframe tb2 ON tb1.id = tb2.id_revista
		WHERE tb2.iframe != ''
		GROUP BY tb1.id
		ORDER BY tb1.id DESC ");
		$numLinhas = mysqli_num_rows($sql);
		if ($numLinhas > 15) {
		
			// Classe Zebra_Pagination
			$records_per_page = 15;
			require 'Zebra_Pagination.php';
			$pagination = new Zebra_Pagination();
			$pagination->records($numLinhas);
			$pagination->records_per_page($records_per_page);
			$pagination->render();
			
			print "<p>&nbsp;</p>";
		}
		/* Paginação */
		
		
		print "
		</div>
		
		
		
			
			
		</div>
		
		\n";
		?>
		</div>
	</div>
</div>
</div>


<?
include("_rodape.php");
?>