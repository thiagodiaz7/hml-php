<?include("_hml-topo.php");?>



<div class="mld-index-wrapper">
        <div class="container">

            <!-- Destaques -->
            <div class="row">
                <div class="col-md-7">
                    <div class="mdl-index-featured">

					<?
						$tabelas = array("noticias" => "noticia", "artigos" => "artigo", "entrevistas" => "entrevista");
						$arrSlider = array();
						foreach ($tabelas as $url => $tab) {
							$sql = mysqli_query($con,"SELECT titulo, url, img, data, link_lp FROM $tab WHERE fl_home = '1' AND url != '' ORDER BY id DESC LIMIT 1");
							while ($d = mysqli_fetch_array($sql)) {
								if ($d["img"]) {
									$arrSlider[] = array("url_atual" => $url, "titulo" => $d["titulo"], "url" => $d["url"], "img" => $d["img"], "data" => $d["data"], "link_lp" => $d["link_lp"] );
								}
							}
						}
						function date_compare($a, $b) {
							$t1 = strtotime($a['data']);
							$t2 = strtotime($b['data']);
							return $t2 - $t1;
						}    
						usort($arrSlider, 'date_compare');
						/*
						print "<pre>";
						print_r($arrSlider);
						print "</pre>";
						*/
						$a=0;
						for ($i = 0; $i < 1; $i++) {
							
							list($ano,$mes,$dia)=explode("-",$arrSlider[$i]["data"]);
							if ($mes<10){
								$mes=$mes[1];
							}
							$mes=$meses[$mes];
							$mes=substr($mes,0,3);
							
							$active=null;
							if($i==0){
								$active="active";
							}
							if ($arrSlider[$i]["img"]) {
								$a++;
								
								if ($arrSlider[$i]["link_lp"]){
									print "

									<div class='mdl-index-featured--news $active'>
										<div class='mdl-index-featured--cat'>Destaque</div>
										<h1 class='mdl-index-featured--title'>
											<a href='". $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ."'>". $arrSlider[$i]["titulo"] ."</a>
										</h1>
										<p class='mdl-index-featured--excerpt'>
											$dia $mes, $ano
											". $arrSlider[$i]["link_lp"] ."
											Com o crescimento do e-commerce e as metas globais de sustentabilidade, o que sobra para a logística é o green last mile: a operação de última milha mais rentável e limpa possível
										</p>
									</div>
			
									<div class='mdl-index-featured--magazine'>
										<div class='row'>
											<div class='col-3 col-md-2'>
												<img src='assets/images/image-example-magazine-cover-1.png' class='w-100' alt=''>
											</div>
			
											<div class='col-9 col-md-9'>
												<div class='mdl-index-featured--magazine-label'>Enquanto isso na revista...</div>
												<h2 class='mdl-index-featured--magazine-title'>
													<a href='artigo.html'>A sustentabildiade na entrega da última milha</a>
												</h2>
											</div>
										</div>
									</div>


						
									\n";
								}else{	
									print "
									<div class='mdl-index-featured--news $active'>
										<div class='mdl-index-featured--cat'>Destaque</div>
										<h1 class='mdl-index-featured--title'>
											<a href='". $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ."'>". $arrSlider[$i]["titulo"] ."</a>
                                          
										</h1>
										<p class='mdl-index-featured--excerpt'>
											$dia $mes, $ano
											
											Com o crescimento do e-commerce e as metas globais de sustentabilidade, o que sobra para a logística é o green last mile: a operação de última milha mais rentável e limpa possível
										</p>
									</div>
			
									<div class='mdl-index-featured--magazine'>
										<div class='row'>
											<div class='col-3 col-md-2'>
										
												<img src='assets/images/image-example-magazine-cover-1.png' class='w-100' alt=''>
											</div>
			
											<div class='col-9 col-md-9'>
												<div class='mdl-index-featured--magazine-label'>Enquanto isso na revista...</div>
												<h2 class='mdl-index-featured--magazine-title'>
													<a href='artigo.html'>A sustentabildiade na entrega da última milha</a>
												</h2>
											</div>
										</div>
									</div>


									
									\n";
								}
							}
						}
						?>
					

						<div class="col-md-4 col-xs-12" style="display:none">
							<?
							$sql = mysqli_query($con,"SELECT edicao, titulo, url FROM revista ORDER BY edicao DESC LIMIT 0,1");
							$edicao = mysqli_fetch_array($sql);
							?>
							<a href="revista/edicoes-anteriores/<?= $edicao["url"]; ?>" title="<?= $edicao["titulo"]; ?>" class="linkUltimaEdicao">
								<img src="images/b-revista-atual90.jpg" alt class="img-responsive imgUltimaEdicao" />
							</a>
						</div>
        			</div>
        		</div>
    	
                <div class="col-md-5">

                <?
											$tabelas = array("noticias" => "noticia", "artigos" => "artigo", "entrevistas" => "entrevista");
											$arrSlider = array();
											foreach ($tabelas as $url => $tab) {
												$tabelaFotos=$tab."_fotos";
                                                $sql = mysqli_query($con,"SELECT titulo, url, img, data, link_lp FROM $tab WHERE fl_home = '1' AND url != '' ORDER BY id DESC LIMIT 4");
												while ($d = mysqli_fetch_array($sql)) {
													
													$img=null;
													if ($d["img2"]){
														$img="$d[img2]";
													}
													else{
														if ($d["img"]){
															$img="$d[img]";
														}
													}
													
													$arrSlider[] = array("url_atual" => $url, "titulo" => $d["titulo"], "url" => $d["url"], "img" => $img, "categoria" => $d["categoria"], "data" => $d["data"]);
												}
											}
											
											usort($arrSlider, 'date_compare');
											
											
											for ($i = 1; $i < 4; $i++) {
												
												list($ano,$mes,$dia)=explode("-",$arrSlider[$i]["data"]);
												if ($mes<10){
													$mes=$mes[1];
												}
												$mes=$meses[$mes];
												$mes=substr($mes,0,3);
												
												?>

                                            <div class="mdl-index-card-n">
                                                <div class="row">
                                                    <div class="col-3 col-md-3">
                                                        <div class="mdl-index-card-n--img">
                                                            <img src="galeria/<?=$arrSlider[$i]["img"]?>" alt="<?=$arrSlider[$i]["titulo"]?>" />
                                                        </div>
                                                    </div>

                                                    <div class="col-9 col-md-9">
                                                        <div class="mdl-index-card-n--info">
                                                            <div class="mdl-index-card-n--label"><?=$arrSlider[$i]["categoria"]?> <span class="mdl-index-card-n--premium"></span></div>
                                                            <h3 class="mdl-index-card-n--title">
                                                                <a href="artigo.html"><a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>"><?=$arrSlider[$i]["titulo"]?></a></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


												<?
											}
											?>
										

                  


               

                </div>
            </div>
            <!-- Destaques -->


        </div>

        <div class="mdl-spacing"></div>
        
        <!-- COLUNAS -->
        <div class="container">
            <div class="mdl-index-colunistas-w">
                <h2 class="mdl-index-title-d">As últimas dos nossos colunistas</h2>

                <div class="mdl-spacing"></div>

                <div class="row">

                <?
                    $sql = mysqli_query($con,"SELECT a.titulo, a.url, b.nome, b.img, b.usuario FROM blog a, colunista b WHERE a.id_colunista = b.id GROUP BY a.id ORDER BY a.id DESC LIMIT 0,3");
                    if (mysqli_num_rows($sql)) {
                        $i=0;
                        while ($d = mysqli_fetch_array($sql)) {
                            $i++;
                            ?>

                            <div class="col-md-4">
                                <div class="mdl-index-colunistas-w--item">
                                    <div class="row">
                                        <div class="col-3 col-md-3">
                                            <div class="mdl-index-colunistas-w--avatar">
                                                <img src="/galeria/<?=$d["img"]?>" alt="<?=$d["nome"]?>">
                                            </div>
                                        </div>

                                        <div class="col-9 col-md-9">
                                            <h4 class="mdl-index-colunistas-w--title">
                                                <a href="<? print "blog/$d[usuario]/$d[url]"; ?>"><?=$d["titulo"]?></a>
                                            </h4>
                                            <div class="mdl-index-colunistas-w--author">
                                                Por <span><?=$d["nome"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?
                            if ($i>1){
                                $i=0;
                                print "\n";
                            }
                        }
                        
                    }
				?>  
                </div>
            </div>
        </div>
        <!-- COLUNAS -->

        <div class="mdl-spacing"></div>

        <!-- Last podcasts -->
        <div class="mdl-podcast-wrapper">
            <div class="container">
                <div class="mdl-index-podcast-w">

                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="mdl-index-title-d">Ouça os cortes do seu podcast de logística</h2>
                        </div>

                        <div class="col-md-3">
                            <a href="#" class="mdl-index--link-youtube">Assista no Youtube</a>
                        </div>
                    </div>

                    <div class="mdl-spacing"></div>

                    <div class="row">


                    <?
                    $d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM podcast WHERE url = '$id'"));
                    if (mysqli_num_rows($d)) {
                        $i=0;
                        while ($d = mysqli_fetch_array($d)) {
                            $i++;
                            ?>

                        <div class="col-md-3">
                            <div class="mdl-index-podcast-w--item gradient">
    
                                <div class="mdl-index-podcast-w--thumb">
                                    <img src="assets/images/image-example-podcast-thumb.png" alt="">
                                </div>
    
    
                                <div class="mdl-index-podcast-w--info">
                                    <div class="row">
                                        <div class="col-9 col-md-9">
                                            <div class="mdl-index-podcast-w--ep">Episódio 15</div>
                                            <h4 class="mdl-index-podcast-w--title"><?=$d["titulo"]?></h4>
                                            <div class="mdl-index-podcast-w--author">Marlos Tavares</div>
                                        </div>
    
                                        <div class="col-3 col-md-3 text-center">
                                            <small class="mdl-index-podcast-w--time">00:15</small>
                                            <div class="mdl-index-podcast-w--play">
                                                <a href="#" class="mdl-index-podcast-w--play-icon"></a>
                                            </div>
                                        </div>
                                    </div>          
                                </div>
    
                            </div>
                        </div>



                            <?
                            if ($i>1){
                                $i=0;
                                print "\n";
                            }
                        }
                        
                    }
				?>  

                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Last podcasts -->
       

        <div class="container">

            <div class="mdl-spacing"></div>
            <div class="row">
                <div class="col-7 col-md-10">  <h2 class="mdl-index-title-d">Fique por dentro</h2></div>

                <div class="col-5 col-md-2"> <a href="/hml-noticias" class="mdl-index-link-a">Ver mais</a></div>
            </div>
            <div class="mdl-spacing"></div>

            

            <div class="row">
                                        <?
											$tabelas = array("noticias" => "noticia", "artigos" => "artigo", "entrevistas" => "entrevista");
											$arrSlider = array();
											foreach ($tabelas as $url => $tab) {
												$tabelaFotos=$tab."_fotos";
												$sql = mysqli_query($con,"
												SELECT e.titulo, e.url, e.data, e.img, c.titulo as categoria, i.img as img2 
												FROM $tab e 
												INNER JOIN categorias c ON e.id_categoria = c.id
												LEFT JOIN $tabelaFotos i ON e.id = i.id_$tab
												WHERE e.fl_home != '1' AND e.url != '' 
												ORDER BY e.id DESC LIMIT 0,14");
												while ($d = mysqli_fetch_array($sql)) {
													
													$img=null;
													if ($d["img2"]){
														$img="$d[img2]";
													}
													else{
														if ($d["img"]){
															$img="$d[img]";
														}
													}
													
													$arrSlider[] = array("url_atual" => $url, "titulo" => $d["titulo"], "url" => $d["url"], "img" => $img, "categoria" => $d["categoria"], "data" => $d["data"]);
												}
											}
											
											usort($arrSlider, 'date_compare');
											
											
											for ($i = 0; $i < 7; $i++) {
												
												list($ano,$mes,$dia)=explode("-",$arrSlider[$i]["data"]);
												if ($mes<10){
													$mes=$mes[1];
												}
												$mes=$meses[$mes];
												$mes=substr($mes,0,3);
												
												?>
                                                <div class="col-md-3">
                                                    <div class="mdl-index-card-n mdl-index-card-nf">
                                                        <div class="mdl-index-card-n--thumb">
                                                            <div class="mdl-index-card-n--cat cat-1"><?=$arrSlider[$i]["categoria"]?></div>
                                           
                                                            <img src="<?=$arrSlider[$i]["img"]?>" alt="<?=$arrSlider[$i]["titulo"]?>" />
                                                        </div>

                                                        <div class="mdl-index-card-i">
                                                            <div class="mdl-index-card-n--reading-time">5 min de leitura</div>
                                                            <h4 class="mdl-index-card-n--title">
                                                                <a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>"><?=$arrSlider[$i]["titulo"]?></a>
                                                            </h4>
                                                        </div>

                                                        <div class="mdl-index-card-n--actions">
                                                            <a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>" class="mdl-index-ard-n--link">Ler artigo completo</a>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
												<?
											}
											?>


                
            

                <div class="col-md-3">
                    <div class="mdl-index-card-n-publi mdl-index-card-nf">

                   
                       
                        <div class="mdl-index-card-n-publi--link">
                            <a href="https://mundologistica.com.br/cliques?id_banner=177" target="_blank" class="mdl-index-card-n-publi--link-item"></a>
                        </div>

                        <div class="mdl-spacing"></div>
                        <div class="mdl-spacing"></div>

                        <div class="mdl-index-card-n-publi--label">Patrocinado</div>

                        <h5 class="mdl-index-card-n-publi--title">
                            Rastreamento de frotas Cobli: descomplique sua gestão
                        </h5>

                        <div class="mdl-index-card-n-publi--logo">
                            <img src="assets/images/cobli-logo-png.png" alt="Publi">
                        </div>
                        
                    </div>
                </div>

            
            </div>


            <div class="row">
                                        <?
											$tabelas = array("noticias" => "noticia", "artigos" => "artigo", "entrevistas" => "entrevista");
											$arrSlider = array();
											foreach ($tabelas as $url => $tab) {
												$tabelaFotos=$tab."_fotos";
												$sql = mysqli_query($con,"
												SELECT e.titulo, e.url, e.data, e.img, c.titulo as categoria, i.img as img2 
												FROM $tab e 
												INNER JOIN categorias c ON e.id_categoria = c.id
												LEFT JOIN $tabelaFotos i ON e.id = i.id_$tab
												WHERE e.fl_home != '1' AND e.url != '' 
												ORDER BY e.id DESC LIMIT 0,14");
												while ($d = mysqli_fetch_array($sql)) {
													
													$img=null;
													if ($d["img2"]){
														$img="$d[img2]";
													}
													else{
														if ($d["img"]){
															$img="$d[img]";
														}
													}
													
													$arrSlider[] = array("url_atual" => $url, "titulo" => $d["titulo"], "url" => $d["url"], "img" => $img, "categoria" => $d["categoria"], "data" => $d["data"]);
												}
											}
											
											usort($arrSlider, 'date_compare');
											
											
											for ($i = 7; $i < 14; $i++) {
												
												list($ano,$mes,$dia)=explode("-",$arrSlider[$i]["data"]);
												if ($mes<10){
													$mes=$mes[1];
												}
												$mes=$meses[$mes];
												$mes=substr($mes,0,3);
												
												?>
                                                <div class="col-md-3">
                                                    <div class="mdl-index-card-n mdl-index-card-nf">
                                                        <div class="mdl-index-card-n--thumb">
                                                            <div class="mdl-index-card-n--cat cat-1"><?=$arrSlider[$i]["categoria"]?></div>
                                           
                                                            <img src="<?=$arrSlider[$i]["img"]?>" alt="<?=$arrSlider[$i]["titulo"]?>" />
                                                        </div>

                                                        <div class="mdl-index-card-i">
                                                            <div class="mdl-index-card-n--reading-time">5 min de leitura</div>
                                                            <h4 class="mdl-index-card-n--title">
                                                                <a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>"><?=$arrSlider[$i]["titulo"]?></a>
                                                            </h4>
                                                        </div>

                                                        <div class="mdl-index-card-n--actions">
                                                            <a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>" class="mdl-index-ard-n--link">Ler artigo completo</a>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
												<?
											}
											?>


                
            

                <div class="col-md-3">
                    <div class="mdl-index-card-n-publi mdl-index-card-nf">

                        <div class="mdl-index-card-n-publi-bg">
                            <img src="" alt="">
                        </div>
                       
                        <div class="mdl-index-card-n-publi--link">
                            <a href="https://mundologistica.com.br/cliques?id_banner=174" target="_blank" class="mdl-index-card-n-publi--link-item"></a>
                        </div>

                        <div class="mdl-spacing"></div>
                        <div class="mdl-spacing"></div>

                        <div class="mdl-index-card-n-publi--label">Patrocinado</div>

                        <h5 class="mdl-index-card-n-publi--title">
                            Instalações logísticas sustentáveis e modernas. Encontre seu galpão!
                        </h5>

                        <div class="mdl-index-card-n-publi--logo">
                            <img src="assets/images/glp-logo.png" alt="Publi">
                        </div>
                        
                    </div>
                </div>
            </div>
          
        </div>
    </div>


    <div class="mdl-spacing"></div>


<div class="mdl-publi-w">
    <div class="container">
        <div class="row">
                                    
             <div class="col-md-12 mdl-publi-w--item">
                <?
                    $b = new banners();
                    $b->bannersLaterais($con);
                ?>
            </div>




            <div class="col-md-3">
                <a href="#" class="mdl-publi-w-300x250">
                    <img src="assets/images/ads/1660830603-GLP.gif" class="w-100" alt="">
                </a>
            </div>

            <div class="col-md-3">
                <a href="#"  class="mdl-publi-w-300x250">
                    <img src="assets/images/ads/1662491035-Cobli-300.gif" class="w-100" alt="">
                </a>
            </div>

            <div class="col-md-3">
                <a href="#"  class="mdl-publi-w-300x100">
                    <img src="assets/images/ads/1664487627-Mecalux.gif" class="w-100" alt="">
                </a>

                <a href="#" class="mdl-publi-w-300x100">
                    <img src="assets/images/ads/1665151585-Gif-FTLog_550.gif" class="w-100" alt="">
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" class="mdl-publi-w-300x250">
                    <img src="assets/images/ads/1665666388-gifEP21.gif" class="w-100" alt="">
                </a>
            </div>
        </div>
    </div>
    
</div>

<div class="mdl-spacing"></div>

  <!-- Newsletter -->
    
  <div class="mdl-index-newsletter-w">
            <div class="container">
                
                    <div class="row">
                        <div class="col-md-7">

                            <div class="mdl-index-newsletter-w--info">
                                <div class="mdl-index-newsletter-w--span">Inscreva-se grátis</div>
                                <h2 class="mdl-index-newsletter-w--title">Receba as notícias mais quentes do setor!</h2>

                                    <div class="mdl-spacing"></div>
                                
                                    <form class="">
                                        <div class="row g-3 mdl-index-newsletter-w--b">
                                            <div class="col-auto">
                                                <label for="nEmail" class="visually-hidden">Email</label>
                                                <input type="text" class="form-control-plaintext mdl-index-newsletter-w--form-control-plaintext" id="nEmail" placeholder="antonie@henrijomini.com.br">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3 mdl-index-newsletter-w--button">Assinar grátis</button>
                                            </div>
                                        </div>
                                       
                                    </form>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <div class="mdl-index-newsletter-w--image">
                                <img src="assets/images/image-newsletter-c.png" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
            
            </div>
   </div>

    <!-- /Newsletter -->



	<!-- CHAMADAS DO SITE -->
    
    
    <div class="ne_recent_news_main_wrapper" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="ne_recent_left_side_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="ne_busness_main_slider_wrapper" style="margin:0 0 30px 0">
                                            <div class="ne_recent_heading_main_wrapper">
                                                <h2>Últimas notícias</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        
										<div class="row">
											<?
											$tabelas = array("noticias" => "noticia", "artigos" => "artigo", "entrevistas" => "entrevista");
											$arrSlider = array();
											foreach ($tabelas as $url => $tab) {
												$tabelaFotos=$tab."_fotos";
												$sql = mysqli_query($con,"
												SELECT e.titulo, e.url, e.data, e.img, c.titulo as categoria, i.img as img2 
												FROM $tab e 
												INNER JOIN categorias c ON e.id_categoria = c.id
												LEFT JOIN $tabelaFotos i ON e.id = i.id_$tab
												WHERE e.fl_home != '1' AND e.url != '' 
												ORDER BY e.id DESC LIMIT 0,14");
												while ($d = mysqli_fetch_array($sql)) {
													
													$img=null;
													if ($d["img2"]){
														$img="$d[img2]";
													}
													else{
														if ($d["img"]){
															$img="$d[img]";
														}
													}
													
													$arrSlider[] = array("url_atual" => $url, "titulo" => $d["titulo"], "url" => $d["url"], "img" => $img, "categoria" => $d["categoria"], "data" => $d["data"]);
												}
											}
											
											usort($arrSlider, 'date_compare');
											
											
											for ($i = 0; $i < 9; $i++) {
												
												list($ano,$mes,$dia)=explode("-",$arrSlider[$i]["data"]);
												if ($mes<10){
													$mes=$mes[1];
												}
												$mes=$meses[$mes];
												$mes=substr($mes,0,3);
												
												?>
												<div class="col-md-4">
													<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
														<div class="ne_re_left_top_main_wrapper">
															<div class="ne_re_left_img_main_wrapper">
																<img src="<?=$arrSlider[$i]["img"]?>" alt="<?=$arrSlider[$i]["titulo"]?>" />
																<h2><?=$arrSlider[$i]["categoria"]?></h2>
															</div>
															<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper">
																<h3><a href="<?= $arrSlider[$i]["url_atual"] ."/". $arrSlider[$i]["url"] ?>"><?=$arrSlider[$i]["titulo"]?></a></h3>
																<ul class="ne_re_social1_wrapper">
																	<li data-animation="animated fadeInLeft"><i class="fa fa-calendar"></i> &nbsp;<? print "$dia $mes, $ano";?></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<?
											}
											?>
										
										
										
										</div>
										
                                    </div>
                                </div>
                            </div>
							
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="ne_busness_main_slider_wrapper" style="margin-bottom:30px;">
                                            <div class="ne_recent_heading_main_wrapper">
                                                <h2>Próximos Webinars Gratuitos - Inscreva-se</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<div class="ne_sport_slider_wrapper">
															<div class="ne_re_left_bottom_main_wrapper ne_re_left_bottom_main_wrapper_top">
																<div class="ne_re_bottom_img">
																	<img src="/images/ia-fretes.jpg" class="img-responsive">
																</div>
																<div class="ne_re_bottom_img_cont">
																	<h3><a href="https://materiais.revistamundologistica.com.br/tms-novo-normal">A importância do TMS no novo normal</a></h3>
																	<p><strong>Dia 09/06 - das 9h às 10h - Inscreva-se</strong></p>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<div class="ne_sport_slider_wrapper">
															<div class="ne_re_left_bottom_main_wrapper ne_re_left_bottom_main_wrapper_top">
																<div class="ne_re_bottom_img">
																	<img src="/images/fracionado-pp.jpg" class="img-responsive">
																</div>
																<div class="ne_re_bottom_img_cont">
																	<h3><a href="https://materiais.revistamundologistica.com.br/desafios-transportefracionado-covid">Desafios do transporte fracionado e abastecimento do varejo em tempos de COVID-19</a></h3>
																	<p><strong>Dia 12/05 - das 9h às 10h - Inscreva-se</strong></p>
																</div>
															</div>
														</div>
													</div>
												<div class='clearfix'></div>
										</div>
									
                                    </div>
                                </div>
                            </div>
							-->



							
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="ne_busness_main_slider_wrapper" style="margin-bottom:30px;">
                                            <div class="ne_recent_heading_main_wrapper">
                                                <h2>Nosso Blog</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="row">
                                            <?
											$sql = mysqli_query($con,"SELECT a.titulo, a.url, b.nome, b.img, b.usuario FROM blog a, colunista b WHERE a.id_colunista = b.id GROUP BY a.id ORDER BY a.id DESC LIMIT 0,6");
											if (mysqli_num_rows($sql)) {
												$i=0;
												while ($d = mysqli_fetch_array($sql)) {
													$i++;
													?>
													<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
														<div class="ne_sport_slider_wrapper">
															<div class="ne_re_left_bottom_main_wrapper ne_re_left_bottom_main_wrapper_top">
																<div class="ne_re_bottom_img">
																	<img src="/galeria/<?=$d["img"]?>" alt="<?=$d["nome"]?>" class="img-responsive">
																</div>
																<div class="ne_re_bottom_img_cont">
																	<h3><a href="<? print "blog/$d[usuario]/$d[url]"; ?>"><?=$d["titulo"]?></a></h3>
																	<p><i class="fa fa-user"></i> &nbsp;Por <strong><?=$d["nome"]?></strong></p>
																</div>
															</div>
														</div>
													</div>
													<?
													if ($i>1){
														$i=0;
														print "<div class='clearfix'></div>\n";
													}
												}
												
											}
											?>  
											
										</div>
									
                                    </div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="ne_indx_sidebar_main_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res">
                                    <div class="ne_recent_heading_main_wrapper font_18px">
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
							<!--
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper">
                                    <div class="ne_recent_heading_main_wrapper font_18px">
                                        <h2>Facebook</h2>
                                    </div>
                                    <div class="ne_sidebar_faceb_section_img">
										<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMundoLogistica%2F&tabs&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    </div>
                                </div>
                            </div>
							-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res_weather">
                                    <div class="ne_recent_heading_main_wrapper font_18px">
                                        <h2>A MundoLogística</h2>
                                    </div>
									<div class="ne_indx_sidebar_shair_icon_main_wrapper">
                                    <p>A MundoLogística é um canal para profissionais de logística e supply chain se manterem sempre atualizados. Tratando de temas importantes sobre logística, supply chain, armazenagem, transporte, logística 4.0, logística lean, indicadores de desempenho, gestão, carreira, casos de sucesso e diversos outros temas, os nossos canais sempre trazem as últimas notícias e tendências da área. Pelo nosso portal e redes sociais, nossos leitores sempre recebem as últimas notícias. E pela revista e pela área do assinante, nossos assinantes assistem a webinars, participam de trilhas de conhecimento e lêem os artigos publicados na revista que tratam das últimas tendências, casos de sucesso, opinião de executivos, novas metodologias, tecnologias e logística 4.0.</p>
									</div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--resent news End-->
<?include("_hml-rodape.php");?>