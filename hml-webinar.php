<?
$pg = "Webinar";
$titulo = "$pg | $nmsite";
$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
include("_hml-topo.php");
?>

<div class="mdl-webinar-wrapper">
	<div class="container">
		<div class="mdl-spacing"></div>
		<h2 class="mld-content-title-page">Últimos lançamentos</h2>
		<div class="mdl-spacing"></div>

		<div class="row">
		<?
		$sql = mysqli_query($con,"SELECT * FROM webinar ORDER BY dt_evento DESC LIMIT 0,4");
		if (mysqli_num_rows($sql)) {
			
			print "";
			
			while ($d = mysqli_fetch_array($sql)) {
				print "

			<div class='col-md-3'>

				<div class='mld-content-card-item'>
					<div class='mld-content-card-item--img text-center'>
						<img src='/galeria/$d[img]' alt='$d[titulo]'>
					</div>

					<div class='mld-content-card-item--title'>$d[titulo]</div>
					<div class='mld-content-card-item--info'>
						". strip_tags($d['palestrante'], "<br>") ."
					</div>

					<div class='mld-content-card-item--date'>
						".formataData($d["dt_evento"],"output")."
					</div>

					<div class='mld-content-card-action text-center'>
						<a href='".$url_total."Webinar.jsp?webinar=".$d['nm_arquivo']."' class='mld-content-card-action-link'>Assistir</a>
					</div>
				</div>
			</div>

				<div class='col-md-5' style='display:none;'>";
				if ($d["img"]) {
					print "
						<a href='".$url_total."Webinar.jsp?webinar=".$d['nm_arquivo']."' title='".$d['titulo']."'>
							<div class='row'>
								<div class='col-md-5'>
									<img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' />
								</div>
								<div class='col-md-7'>
								<p class='titulo'>$d[titulo]</p>
								</div>
							</div>
						</a>
					";
				}
				else {
					print "
						<a href='".$url_total."Webinar.jsp?webinar=$d[nm_arquivo]' title='$d[titulo]'>
							<p class='palestrante'>$d[titulo]</p>
						</a>
					";
				}
				print "
					<div class='col-md-4 titulo'>". strip_tags($d['palestrante'], "<br>") ."</div>
					<div class='col-md-1'><a href='".$url_total."Webinar.jsp?webinar=$d[nm_arquivo]' title='$d[titulo]'>";
				if ($d["nm_arquivo"] != "0910-mlog"){
					print "<p class='txtCenter'>Assistir</p>
							</a>
							</div>
							</div>\n";
				}
				else{
					print "<p class='destaqueCor txtCenter'><strong>Clique Aqui | Acesso Liberado!</strong></p>
							</a>
							</div>
							</div>\n";
				}
			}
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		
		?>
	
		</div>
		</div>
		</div>
	</div>
	<?
	print "
	<div class='col-md-4' style='display:none'>
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
		<div class="container">
			<div class="row">
                
                <div class="col-md-7">
                    <div class="mdl-content-grid-info mld-content-padding-100">
                        <div class="mdl-spacing"></div>

                        <h1 class="mdl-content-grid-info--title">O canal MundoLogística conecta você com os grandes nomes de diferentes setores</h1>
                        <p class="mdl-content-grid-info--text">
                            Um bate-papo descontraído onde abordamos atualizações, tendências e novas tecnologias. Vai ficar de fora dessa?
                        </p>

                        <div class="d-grid gap-2 justify-content-md-start">
                            <a href="#" class="btn btn-primary btn-lg px-4 mdl-subscription-btn-primary">Assine agora</a>
            
                            <div class="mdl-subscription--price">Assine por <b>R$ 39,90/mês no plano anual</b></div>
                        </div>
        
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="mdl-content-grid--img">
                        <img src="assets/images/image-webinars-featured.png" alt="">
                    </div>
                </div>
             </div>
		</div>

		</div>
	</div>

</div>


<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ne_recent_left_side_wrapper">
					<div class="row">
						<div class="col-md-8">
							
							<div class="ne_sport_slider_wrapper ne_sport_slider_wrapper_single_">
								<div class="bkBranco">		

                                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="row">
									<p><strong>PRÓXIMOS WEBINARS GRATUITOS PROGRAMADOS - INSCREVA-SE</strong><BR><BR></p>
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
									-->

								
								<div class="mdl-content-webinars-itens">


										<?
												$sql = mysqli_query($con,"SELECT * FROM webinar ORDER BY dt_evento DESC LIMIT 4,30");
												if (mysqli_num_rows($sql)) {
													
													print "";
													
													while ($d = mysqli_fetch_array($sql)) {
														print "<div class='mdl-content-webinars-item'>
														
															<div class='mdl-content-webinars-item--info'>

																	<h2 class='mdl-content-webinars-item--title'>$d[titulo]</h2>
																	<p class='mdl-content-webinars-item--text'>". strip_tags($d['palestrante'], "<br>") ."</p>

																	
															
															</div>";
														if ($d["img"]) {
															print "

															<div class='row text-center'>
																<div class='col-md-2'>
																	<img src='/galeria/$d[img]' alt='$d[titulo]' class='img-responsive' />
																</div>

																<div class='col-md-3'>
																	<div class='mdl-content-webinars-item--date'>Publicado em ".formataData($d["dt_evento"],"output")."</div>
																</div>
															</div>

															<div class='mdl-content-webinars-item--action'>
																<a href='".$url_total."Webinar.jsp?webinar=".$d['nm_arquivo']."' class='mdl-content-webinars-item--link'>Assistir</a>
															</div>
												
															";
														}
														else {
															print "
															";
														}
														print "</div>

												
														";
														if ($d["nm_arquivo"] != "0910-mlog"){
															print "\n";
														}
														else{
															print "\n";
														}
													}
												}
												else {
													print "<p>Nenhum conteúdo cadastrado.</p>";
												}
												
												?>

												
											
												</div>
												</div>
												</div>

												
											</div>

							<div class="col-md-4">
							<div class="mld-article-sidebar">
                            <div class="mld-article-sidebar--related">
                                <h4 class="mld-article-sidebar--related-title">Veja também</h4>
    
                                <div class="mld-article-sidebar--related-item">
                                    <div class="mld-article-sidebar--related-item-label">
                                        Podcast
                                    </div>
                                    <h5 class="mld-article-sidebar--related-item-subtitle">
                                        <a href="hml-podcast" title="Ouça o podcast da MundoLogística que reúne os maiores executivos de mercado para um bate-papo leve e descontraído">
                                            Ouça o podcast da MundoLogística que reúne os maiores executivos de mercado para um bate-papo leve e descontraído
                                        </a>
                                    </h5>
                                </div>
    
    
                                <div class="mld-article-sidebar--related-item">
                                    <div class="mld-article-sidebar--related-item-label">
                                        Colunas
                                    </div>
                                    <h5 class="mld-article-sidebar--related-item-subtitle">
                                        <a href="hml-colunas" title="Henkel implanta torre de controle em CD e ampla frota de veículos elétricos">
                                            Leia as colunas semanais sobre Logística e SupplyChain
                                        </a>
                                    </h5>
                                </div>
    
                                <div class="mld-article-sidebar--related-item">
                                    <div class="mld-article-sidebar--related-item-label">
                                        Entrevistas
                                    </div>
                                    <h5 class="mld-article-sidebar--related-item-subtitle">
                                        <a href="hml-entrevistas" title="Senado aprova MP que dá flexibilidade para a ANTT reajustar tabela de fretes mínimos">
											Entrevista com grandes nomes na Tecnologia, Blockchain, SupplyChain, Logística e muito mais!
                                        </a>
                                    </h5>
                                </div>

								<?
							print "</div>
						
							<div class='mld-article-sidebar--ads'>
								
							
						
						\n";
							$b = new banners();
							$b->bannersLaterais($con);
									print "
									
								
							
							</div> <!--mld-article-sidebar--ads-->
							\n";
							?>
    
                               
    
    
                            </div>
                        </div>
							</div>

							

						</div>

</div>
</div>
</div>
</div>
</div>
		
		
<?
include("_hml-rodape.php");
?>