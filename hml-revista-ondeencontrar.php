<?
$pg = "Onde Encontrar";
$titulo = "$pg | $nmsite";
$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
include("_topo.php");
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
											<h1>Onde Encontrar</h1>
										</div>
									</div>
								</div>
							</div>
							<p>&nbsp;</p>
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single">
								<div class="bkBranco">							
								<div class="ne_map_content_wrapper ne_map_content_wrapper2 conteudoAssinatura">
								
								<p>Você pode encontrar a revista nas melhores bancas e livrarias das cidades abaixo:<BR><BR></p>

	<?
	print "<div class='row'>
	<div class='col-md-4'>\n";
	$arrEstadoMuda = array("PA","SP");
	$estados = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");
	$sql = mysqli_query($con,"SELECT estado FROM onde_encontrar GROUP BY estado ORDER BY estado ASC");
	while ($d = mysqli_fetch_array($sql)) {
		if (in_array($d["estado"],$arrEstadoMuda)) {
			print "</div>
			<div class='col-md-4'>";
			unset($arrEstadoMuda[ $d["estado"] ]);
		}
		print "<div class='row rowEstado'>
		<div class='col-md-6'>". $estados[ $d["estado"] ] ."</div>
		<div class='col-md-6'>";
		$sql2 = mysqli_query($con,"SELECT cidade FROM onde_encontrar WHERE estado = '$d[estado]' ORDER BY cidade ASC");
		while ($d2 = mysqli_fetch_array($sql2)) {
			print "$d2[cidade]<br />\n";
		}
		print "</div>
		</div>\n";
	}
	print "</div>
	</div>\n";
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
include("_rodape.php");
?>