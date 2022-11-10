<?
$pg = "Glossário";
if ($id) {
	$idCategoria = false;
	$select = mysqli_query($con,"SELECT titulo FROM glossario WHERE url = '$id'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo] | $nmsite";
		$canonical = $url_total . "$atual/$id";
	}
	else {
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"SELECT titulo FROM categorias WHERE url = '$c'");
		if (mysqli_num_rows($sql) > 0) {
			$dados = mysqli_fetch_array($sql);
			$pg = "Glossário - $dados[titulo]";
			$titulo = "Glossário - $dados[titulo] | $nmsite";
			$canonical = $url_total . "$atual/$id";
			$idCategoria = true;
		}
		else {
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: ".$url_total."$atual");  
			exit();
		}		
	}
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_topo.php");
?>

	<? if ($id) {
		mysqli_query($con,"UPDATE glossario SET lidos = lidos + 1 WHERE url = '$id'");
		
	?>	
<div class="ne_cu_map_main_wrapper">
<article class="container">
		<div class='row'>
		
		
		<div class='col-md-8'>
		
		<div class='ne_map_content_wrapper ne_map_content_wrapper2'>
		<div class='bkBranco'>
		<div class='row'>
			<div class='col-md-12'>
	<?
		
			
			$sql = mysqli_query($con,"SELECT * FROM glossario e WHERE e.url = '$id' LIMIT 0,1");
			$d = mysqli_fetch_array($sql);

		
		?>

		
		<div class="ne_busness_main_slider_wrapper" style="margin:0 0 0 0">
			<div class="ne_recent_heading_main_wrapper">
				<h1 style="margin-bottom:3rem"><?=$d["titulo"]?></h1>
				<div class="row">
					<div class="col-md-5"></div>
					<div class="col-md-7">
						<div class="blocoCompartilhar">
							<div style="float:right; height:20px; margin:1px 0 0 10px">
								<a href="https://wa.me/?text=<?= $url_total. $atual . "/$id"; ?>" class="botao-whatsapp-compartilhar"><i class="fa fa-whatsapp"></i> Compartilhar</a>
							</div>
							<div style="float:right; height:10px; margin:1px 0 0 10px">
								<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: pt_BR</script>
								<script type="in/share" data-url="<?= $url_total . $atual . "/$id"; ?>" data-counter="right"></script>
							</div>
							<div class="clear clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?

			
		
			print "<div class='txtConteudos'>";
			if ($d["img"]){
				print "<p class='text-center'><img src='galeria/$d[img]' alt='Imagem de $d[titulo]' class='img-responsive' /></p>";
			}
			print "<div class='txtConteudos'>".$d["noticia"]."</div>";
			print "</div>";
			
			$sql = mysqli_query($con,"SELECT titulo, url, img FROM glossario WHERE url != '$id' ORDER BY id ASC LIMIT 0,6");
			$linhas = mysqli_num_rows($sql);
			if (mysqli_num_rows($sql)) {
				print "<p>&nbsp;</p>
				<h2>Veja também:</h2>
				<div class='row'>\n";
				$i = 1;
				$a = 0;
				while ($d = mysqli_fetch_array($sql)) {
					if ($d["img"]){
						$img="/galeria/$d[img]";
					}
					?>
					<div class="col-md-4">
						<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
							<div class="ne_re_left_top_main_wrapper">
								<div class="ne_re_left_img_main_wrapper">
									<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
								</div>
								<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper" style="min-height:8rem">
								
								<h3><a href="<?= $atual ."/". $d["url"] ?>"><?=$d["titulo"]?></a></h3>
								
								</div>
							</div>
						</div>
					</div>
					<?
				}
				print "</div>\n";
			}	
			
		print "
		</div>
		</div>
		</div>
		</div>
		</div>
		
		
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper' style='margin-top:0'>
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
	</article>
</div>
	<?
	
	
	}
	
	
	else { // Index
	
?>

<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		
		<div class='row'>
		<div class='col-md-8'>
		
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
		
		$lmt = $pg * 16;
		
		$sql = mysqli_query($con,"SELECT titulo, url, img FROM glossario ORDER BY id ASC LIMIT $lmt,16");
		
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				
				if ($d["img"]){
					$img="/galeria/$d[img]";
				}
				?>
				<div class="col-md-4">
					<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
						<div class="ne_re_left_top_main_wrapper">
							<div class="ne_re_left_img_main_wrapper">
								<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
							</div>
							<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper" style="min-height:8rem">
							
							<h3><a href="<?= $atual ."/". $d["url"] ?>"><?=$d["titulo"]?></a></h3>
							
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
		$sql = mysqli_query($con,"SELECT titulo, url, img FROM glossario");
		$numLinhas = mysqli_num_rows($sql);
		if ($numLinhas > 16) {
		
			// Classe Zebra_Pagination
			$records_per_page = 16;
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
		
		
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
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
		</div>
	</div>
</div>
<?
	}
	
include("_rodape.php");
?>