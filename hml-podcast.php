<?
$pg = "Podcast";
if ($id) {
	$select = mysqli_query($con,"SELECT titulo FROM podcast WHERE url = '$id'");
	
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
include("_hml-topo.php");
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
?>


	<? if ($id) {
		
		$d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM podcast WHERE url = '$id'"));
		
		if ($d["img_interna"]){
					$img="/galeria/$d[img_interna]";
				}
		?>

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
						<h1><?=$d["titulo"]?></h1>
						<p>&nbsp;</p>
					</div>
				</div>
				
				<img src="<?=$img?>" alt="<?=$d["titulo"]?>" class="img-responsive" style="margin-bottom:1rem" />
				
				
				
				<div class="row row2" style="margin-bottom:2rem">
					<div class="col-lg-12">
						
						<div class="box-cta-nstech2" style="padding:0 0 1rem 0">
							<div class="row">
								
								<div class="col-md-12">
									<div class="txt-podcast">
										
										<div class="canais-podcast2">
											<div class="canais-podcast">
												<h3>Ouça:</h3>
												<a href="#" class="modalYT" data-target="modalYT<?=$d["id"]?>"><img src="images/icone-youtube2.png" alt="youtube" /></a>
												<a href="#" class="modalSP" data-target="modalSP<?=$d["id"]?>"><img src="images/icone-spotify2.png" alt="spotify" /></a>
												<a href="<?=$d["deezer"]?>" target="_blank"><img src="images/icone-deezer2.png" alt="deezer" /></a>
												<a href="<?=$d["amazon"]?>" target="_blank"><img src="images/icone-amazon2.png" alt="amazon" /></a>
												<a href="<?=$d["apple"]?>" target="_blank"><img src="images/icone-apple2.png" alt="apple" /></a>
												<a href="<?=$d["google"]?>" target="_blank"><img src="images/icone-google2.png" alt="google" /></a>
											</div>
											<div class="compartilhar-podcast">
												<div class="icones-flutuantes" id="icones-flutuantes-<?=$d["id"]?>">
													<ul>
														<li><a href="https://www.facebook.com/sharer.php?u=<?=$url_total?>podcast/<?=$d["url"]?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
														<li><a href="https://www.linkedin.com/shareArticle?url=<?=$url_total?>podcast/<?=$d["url"]?>&title=<?=$d["titulo"]?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
														<li><a href="https://wa.me/?text=<?=$url_total?>podcast/<?=$d["url"]?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
													</ul>
												</div>
												<a class="icone-compartilhar" data-icones-flutuantes="<?=$d["id"]?>"><img src="images/icone-compartilhar.png" alt="compartilhar" /></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
				
				
				<div class='txtConteudos'><?=$d["texto"]?></div>
				
			  
				<div class="form__popup" id="modalYT<?=$d["id"]?>">
					<div class="contact__form">
						
						<?=$d["embed_youtube"]?>
						
					</div>
					<div class="close__btn">
						<i class="fa fa-times"></i>
					</div>
				</div>
				<div class="form__popup" id="modalSP<?=$d["id"]?>">
					<div class="contact__form">
						
						<?=$d["embed_spotify"]?>
						
					</div>
					<div class="close__btn">
						<i class="fa fa-times"></i>
					</div>
				</div>
				
				
			</div>
		</div>
		</div>
		</div>
		</div>
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper' style="margin-top:0">
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Publicidade</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<?
					$b = new banners();
					$b->bannersLaterais($con);
				?>
			</div>
		</div>
		</div>
		
		</div>
	</article>
</div>



<?
		
		
		
		
	}
	
	else { // Index
	
?>


	
		
<div class="box-cta-nstech" style="display:none">
			<div class="row">
				<div class="col-md-7 col-lg-6">
					<div class="txt-podcast">
						<h3>Um podcast da MundoLogística em que os executivos por trás das maiores empresas da América Latina contam os erros, acertos, desafios e momentos decisivos de suas carreiras.</h3>
						
						<div class="canais-podcast">
							<h3>Inscreva-se</h3>
							<a href="https://www.youtube.com/channel/UCsYdKQUeO4jDl4ww7Lf8bBg?sub_confirmation=1" target="_blank"><img src="images/icone-youtube.png" alt="youtube" /></a>
							<a href="https://open.spotify.com/show/1hBf5QagIyTqx4f3ElZ0Pp" target="_blank"><img src="images/icone-spotify.png" alt="spotify" /></a>
							<a href="https://www.deezer.com/br/show/3697827?utm_campaign=clipboard-generic&utm_source=user_sharing&utm_medium=desktop&utm_content=talk_show-3697827&deferredFl=1" target="_blank"><img src="images/icone-deezer.png" alt="deezer" /></a>
							<a href="https://music.amazon.com.br/podcasts/3b25d205-79e7-4d8b-9d96-81f644e1e1c4/nstech-cast" target="_blank"><img src="images/icone-amazon.png" alt="amazon" /></a>
							<a href="https://podcasts.apple.com/podcast/id1624543231?app=podcast&at=1000lHKX&ct=linktree_http&itscg=30200&itsct=lt_p&ls=1&mt=2" target="_blank"><img src="images/icone-apple.png" alt="apple" /></a>
							<a href="https://podcasts.google.com/?feed=aHR0cHM6Ly9hbmNob3IuZm0vcy85NzRiZGVmYy9wb2RjYXN0L3Jzcw" target="_blank"><img src="images/icone-google.png" alt="google" /></a>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-lg-6 text-right">
					<img src="images/podcast-mundologistica.png" alt="podcast" class="img-fluid" />
				</div>
			</div>
</div>

<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		<div class='row'>
		<div class='col-md-12'>
		
		<div class="ne_busness_main_slider_wrapper">
			<div class="ne_recent_heading_main_wrapper">
				<h2 class="mld-content-title-page">nstech cast</h2>
			</div>
		</div>

		<div class="mdl-spacing"></div>

	
	
		
		<div class="row">
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
		SELECT *
		FROM podcast
		ORDER BY id DESC 
		LIMIT $lmt,15");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			
			
			$a=1;
	

			
			
			while ($d = mysqli_fetch_array($sql)) {
				
				if ($d["img_banner"]){
					$img="/galeria/$d[img_banner]";
				}
				$ep_destaque=false;
				if($a==1){
					$ep_destaque=true;
				}
				
				$a++;

	

				
				?>
				
					
					<div class="col-md-6">
                        <div class="mdl-poscast-brand-card <?if($ep_destaque){print"mdl-poscast-brand-card";}else{print"mdl-poscast-brand-card";}?>">
                            <div class="mdl-poscast-brand-card--thumb">
								<img src="galeria/<?=$d["img_pequena"]?>" alt="<?=$d["titulo"]?>" class=" w-100" />
                            </div>

                            <div class="mdl-podcast-brand-card--info">
                                <small class="mdl-podcast-brand-card--ep">

								<?if($ep_destaque){print"<small class='mdl-podcast-brand-card--ep'>ÚLTIMO EPISÓDIO</small>";}else{print"<small class='mdl-podcast-brand-card--ep'>#$d[id]</small>";}?>


								</small>
                                <h2 class="mdl-podcast-brand-card--title"><a href="./podcast/<?=$d["url"]?>"><?=$d["titulo"]?></a></h2>
                                
                                <div class="mdl-podcast-brand-card--actions <?if($ep_destaque){print"";}else{print"";}?>">

                                    <div class="mdl-spacing"></div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mdl-podcast-brand-card-action--title">Ouça no:</div>
                                            <ul class="mdl-podcast-brand-card--action-list">
                                                
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["youtube"]?>">Youtube</a></li>
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["spotify"]?>">Spotify</a></li>
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["deezer"]?>">Deezer</a></li>
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["amazon"]?>">Amazon</a></li>
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["apple"]?>">Apple</a></li>
                                                <li class="mdl-podcast-brand-card-action-list--item"><a target="_blank" href="<?=$d["google"]?>">Google</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="mdl-podcast-brand-card--action-p">
                                                <a target="_blank" href="<?=$d["youtube"]?>">Tocar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


					<div class="col-lg-10" style="display:none">
						
						<div class="box-cta-nstech2">
							<div class="row">
								
								<div class="col-md-3  <?if($ep_destaque){print"col-lg-4";}else{print"col-lg-3";}?> text-right">
									<img src="galeria/<?=$d["img_pequena"]?>" alt="<?=$d["titulo"]?>" class="img-fluid" />
								</div>
								<div class="col-md-7 <?if($ep_destaque){print"col-lg-7";}else{print"col-lg-8";}?>">
									<div class="txt-podcast">
										<?if($ep_destaque){?>
										<h4>ÚLTIMO EPISÓDIO</h4>
										<?}?>
										<h3 class="titulo-podcast"><a href="./podcast/<?=$d["url"]?>"><?=$d["titulo"]?></a></h3>
										<p><?=$d["resumo"]?></p>
										<div class="canais-podcast2">
											<div class="canais-podcast">
												<h3>Ouça:</h3>
												<a href="#" class="modalYT" data-target="modalYT<?=$d["id"]?>"><img src="images/icone-youtube2.png" alt="youtube" /></a>
												<a href="#" class="modalSP" data-target="modalSP<?=$d["id"]?>"><img src="images/icone-spotify2.png" alt="spotify" /></a>
												<a href="<?=$d["deezer"]?>" target="_blank"><img src="images/icone-deezer2.png" alt="deezer" /></a>
												<a href="<?=$d["amazon"]?>" target="_blank"><img src="images/icone-amazon2.png" alt="amazon" /></a>
												<a href="<?=$d["apple"]?>" target="_blank"><img src="images/icone-apple2.png" alt="apple" /></a>
												<a href="<?=$d["google"]?>" target="_blank"><img src="images/icone-google2.png" alt="google" /></a>
											</div>
											<div class="compartilhar-podcast">
												<div class="icones-flutuantes" id="icones-flutuantes-<?=$d["id"]?>">
													<ul>
														<li><a href="https://www.facebook.com/sharer.php?u=<?=$url_total?>podcast/<?=$d["url"]?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
														<li><a href="https://www.linkedin.com/shareArticle?url=<?=$url_total?>podcast/<?=$d["url"]?>&title=<?=$d["titulo"]?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
														<li><a href="https://wa.me/?text=<?=$url_total?>podcast/<?=$d["url"]?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
													</ul>
												</div>
												<a class="icone-compartilhar" data-icones-flutuantes="<?=$d["id"]?>"><img src="images/icone-compartilhar.png" alt="compartilhar" /></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
			
				
				
			  
				<div class="form__popup" style="display:none" id="modalYT<?=$d["id"]?>">
					<div class="contact__form">
						
						<?=$d["embed_youtube"]?>
						
					</div>
					<div class="close__btn">
						<i class="fa fa-times"></i>
					</div>
				</div>
				<div class="form__popup"  style="display:none" id="modalSP<?=$d["id"]?>">
					<div class="contact__form">
						
						<?=$d["embed_spotify"]?>
						
					</div>
					<div class="close__btn">
						<i class="fa fa-times"></i>
					</div>
				</div>
				
				<?
				
			}
			
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		
		
		
		/* Paginação */
		$sql = mysqli_query($con,"SELECT id FROM podcast");
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
		
		
		
		
			
			
		</div>
		
		\n";
		
		
		?>
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




