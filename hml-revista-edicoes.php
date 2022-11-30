<?
$pg = "Edições Anteriores";
if ($id2) {
	$select = mysqli_query($con,"SELECT titulo FROM revista WHERE url = '$id2'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo] | $nmsite";
		$canonical = $url_total . "$atual/$id/$id2";
	}
	else {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_total."$atual/$id");  
		exit();	
	}
}
else {
	$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_hml-topo.php");
?>

	<? if ($id2) {
		$arrs = array("<img/>","<span>&nbsp;");
		$sql = mysqli_query($con,"SELECT * FROM revista WHERE url = '$id2'");
		$d = mysqli_fetch_array($sql);
		
?>
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-md-8">
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single" style="margin-top:0">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">
<?		
		
		
		print "
				<p class='text-left'>
				<span class='categoria'>Edição: $d[edicao]</span>
				<span class='categoria'>$d[data]</span>
				</p>
		<h1 class='tituloContent2'>$d[titulo]</h1>
		
		<div class='clearfix'></div>
		<br />
		<div class='row'>
			<div class='col-md-6'>
				<p style='font-style:italic'>Por $d[autor]</p>
				<div class='txtIntro'>
					$d[texto]
				</div>
			</div>
			<div class='col-md-6'>
				<img class='img-responsive' src='/galeria/$d[img]' alt='$d[titulo]' />
			</div>
		</div>";
		if (strcmp($id2,'impacto-tributario-nos-projetos-logisticos')==0)
			print "<div align='center'><iframe width='560' height='315' src='https://www.youtube.com/embed/2CJYIo9JfWo' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe></div><p>&nbsp;</p>";
//		else
//			print "<div class='clearfix'><p>&nbsp;</p></div>";
		
		
		print "<div class='row'>
			<div class='col-md-6'>
				<div class='text-center'><a href='$atual/assinatura' class='btnAssine'>Assine Agora!</a></div>
			</div>
			<div class='col-md-6'>
				<div class='text-center'><a href='$atual/comprar-edicoes' class='btnAssine'>Compre seu Exemplar</a></div>
			</div>
		</div>
		<div class='clearfix'></div><br />
		<h2>E mais:</h2>
		". str_replace($arrs,"",$d["texto2"]) . "
		\n";
		
		// Edições Recentes
		$sql = mysqli_query($con,"SELECT titulo, edicao, data, img, url FROM revista WHERE url != '$id2' ORDER BY edicao DESC LIMIT 0,4");
		
		if (mysqli_num_rows($sql)) {
			print "<p>&nbsp;</p>
			<h2>Confira outras edições:</h2>
			<div class='row'>\n";
			$i = 1;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-3'>
				<div class='gridEdicao'>
				<a href='".$url_total.$atual."/$id/$d[url]' title='$d[titulo]'>
					<div class='blocoImg'><img class='img-responsive' src='/galeria/$d[img]' alt='$d[titulo]' /></div>
					<p>Edição $d[edicao]</p>
					<p class='data'>$d[data]</p>
				</a>
				</div>
				</div>
				\n";
				$i++;
				if ($i > 4) {
					$i = 1;
					print "</div>
					<div class='row'>\n";
				}
			}
			print "</div>\n";
		}
		// Edições Recentes
		
		
		?>
	
		</div>
		</div>
		</div>
	</div>
	<?
	print "
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
	
	\n";
	?>
	
	</div>
</div>
</div>
</div>
</div>
</div>
<?
		
		
		
		
	}
	
	else { // Index
?>	
<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="ne_busness_main_slider_wrapper ne_busness_main_slider_wrapper_lifestyle">
										<div class="ne_recent_heading_main_wrapper">
											<h1><?=$pg?></h1>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">	
	
		<?
		
		$ultimoID = mysqli_fetch_array(mysqli_query($con,"SELECT id FROM revista ORDER BY edicao DESC LIMIT 0,1"));
		
		$sql = mysqli_query($con,"SELECT titulo, edicao, data, img, url FROM revista WHERE id != '$ultimoID[id]' ORDER BY edicao + 1 DESC");
		
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-3'>
				<div class='gridEdicao'>
				<a href='".$url_total.$atual."/$id/$d[url]' title='$d[titulo]'>
					<div class='blocoImg'><img class='img-responsive' src='/galeria/$d[img]' alt='$d[titulo]' /></div>
					<p>Edição $d[edicao]</p>
					<p class='data'>$d[data]</p>
				</a>
				</div>
				</div>
				\n";
				$i++;
				if ($i > 4) {
					$i = 1;
					print "</div>
					<div class='row'>\n";
				}
			}
			print "</div>\n";
		}
		?>
		</div>
		</div>
		</div>
	</div>
	<?
	print "
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
	
	\n";
	?>
	
	</div>
</div>
</div>
</div>
</div>
</div>
		
		
		
	<?	
	}// Index
	?>
		
		
<?
include("_hml-rodape.php");
?>