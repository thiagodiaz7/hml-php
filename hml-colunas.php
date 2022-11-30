<?
$pg = "COLUNAS";
if ($id2) {
	
	$select = mysqli_query($con,"SELECT titulo, img, id FROM blog WHERE url = '$id2'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo]";
		//$titulo = "$dados[titulo] | $nmsite";
		$descricao = "$dados[titulo]";
		$canonical = $url_total . "$atual/$id/$id2";
		
		$img2=mysqli_query($con,"SELECT img FROM blog_fotos WHERE id_blog = '$dados[id]'");
		if(mysqli_num_rows($img2)){
			$img2=mysqli_fetch_array($img2);
		}
		
		$img=null;
		if ($img2["img"]){
			$img="$img2[img]";
			$ogTags="https://mundologistica.com.br".$img;
		}
		
	}
	else {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url_total."$atual");  
		exit();
	}
}
if ($id) {
	$canonical = $url_total . "$atual/$id";
	
	$idCategoria = false;
	$idColunista = false;
	$c = str_replace("c_","",$id);
	$sql = mysqli_query($con,"SELECT titulo FROM categorias WHERE url = '$c'");
	if (mysqli_num_rows($sql) > 0) {
		$dados = mysqli_fetch_array($sql);
		$pg = "COLUNAS - $dados[titulo]";
		//$titulo = "COLUNAS - $dados[titulo] | $nmsite";
		$titulo = "COLUNAS - $dados[titulo]";
		
		$idCategoria = true;
	}
	

	if (!$id2){
		
	$sql = mysqli_query($con,"SELECT nome FROM colunista WHERE usuario = '$id'");
	if (mysqli_num_rows($sql) > 0) {
		$dados = mysqli_fetch_array($sql);
		$pg = "COLUNAS - $dados[nome]";
		$titulo = "COLUNAS - $dados[nome]";
		//$titulo = "BLOG - $dados[nome] | $nmsite";
		
		$idColunista = true;
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
include("_hml-topo.php");
?>




	<? if ($id2) {?>

<div class="ne_cu_map_main_wrapper_ txtConteudo_">
<article class="container">
	<?
		
		mysqli_query($con,"UPDATE blog SET lidos = lidos + 1 WHERE url = '$id2'");
		
		$sql = mysqli_query($con,"SELECT * FROM blog e WHERE e.url = '$id2' LIMIT 0,1");
		$d = mysqli_fetch_array($sql);
		
		
			print "
			
			<div class='row'>
			
			
			<div class='col-md-8'>
			
			<div class='ne_map_content_wrapper ne_map_content_wrapper2_'>
			<div class='bkBranco_'>
			<div class='row'>
				<div class='col-md-12'>\n";
			
			$sql = mysqli_query($con,"SELECT * FROM blog e WHERE e.url = '$id2' LIMIT 0,1");
			$d = mysqli_fetch_array($sql);
		
			$dataHoje = date("Y-m-d");
			$sel = mysqli_query($con,"SELECT * FROM banners 
			WHERE status = '1' AND tipo = '4' AND '$dataHoje' BETWEEN data_ini AND data_fim
			ORDER BY RAND()
			LIMIT 0,1");
			if (mysqli_num_rows($sel)){
				while ($dados = mysqli_fetch_array($sel)) {
					if ($dados["codigo"]) {
						print $dados["codigo"];
					}
					else {
						if ($dados["link"]) {
							print "<a href='".$url_total."cliques?id_banner=$dados[id]' ><img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' /></a>\n";
						}
						else {
							print "<img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' />\n";
						}
					}
				}
				print "<BR/><BR/>";
			}
		
		?>

			<!-- Breadcrumb -->
			<div class="mld-article--breadcrumb">
					<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
						<ol class="breadcrumb">
						<li class="breadcrumb-item mld-article--breadcrumb-item"><a href="hml-colunas">Voltar para Colunas</a></li>
						<li class="breadcrumb-item mld-article--breadcrumb-item active" aria-current="page"><?=$d["titulo"]?></li>
						</ol>
					</nav>
			</div>
			<!-- / Breadcrumb -->
 
		<div class="ne_busness_main_slider_wrapper">
			<div class="ne_recent_heading_main_wrapper">
				<h1 class="mld-article-item--title"><?=$d["titulo"]?></h1>
				
				<div class="row">
					<div class="col-md-5">
						<div class="mld-article-item--author">
							<?print"Publicado em ".formataData($d["data"], "output")."";?>
						</div>
					</div>
					<div class="col-md-7">
						<div class="blocoCompartilhar" style="display:none;">
							<div style="float:right; height:10px; margin:1px 0 0 10px">
								<a href="https://wa.me/?text=<?= $url_total. $atual . "/$id"; ?>" class="botao-whatsapp-compartilhar"><i class="fa fa-whatsapp"></i> Compartilhar</a>
							</div>
							<div style="float:right; height:10px; margin:1px 0 0 10px">
								<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: pt_BR</script>
								<script type="in/share" data-url="<?= $url_total . $atual . "/$id"; ?>" data-counter="right"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?
		
		$bannerConteudos=null;
		$dataHoje = date("Y-m-d");
		$sel = mysqli_query($con,"SELECT * FROM banners 
		WHERE status = '1' AND tipo = '5' AND '$dataHoje' BETWEEN data_ini AND data_fim
		ORDER BY RAND()
		LIMIT 0,1");
		while ($dados = mysqli_fetch_array($sel)) {
			if ($dados["codigo"]) {
				$bannerConteudos = $dados["codigo"];
			}
			else {
				if ($dados["link"]) {
					$bannerConteudos = "<center><a href='".$url_total."cliques?id_banner=$dados[id]' ><img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]'  style='max-width:100%' /></a></center>\n";
				}
				else {
					$bannerConteudos = "<img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' style='max-width:100%' />\n";
				}
			}
			$bannerConteudos .= "<BR/><BR/>";
		}
		
		
		
		$localImg=array('src="/admin','src="/galeria',"src='/galeria");
		$localImgSub=array('class="img-responsive" src="/admin','class="img-responsive" src="/galeria',"class='img-responsive' src='/galeria");
		$texto=str_replace($localImg,$localImgSub,$d["texto"]);
		
		if ($bannerConteudos){
			$textoTMP=explode("</p>",$texto);
			$textoNOVO=array();
			$i=0;
			foreach($textoTMP as $key => $value){
				$textoNOVO[]=$value;
				if ($i==3){
					$textoNOVO[]=$bannerConteudos;
				}
				$i++;
			}
			$texto=implode("</p>",$textoNOVO);
		}
		
		
		print "<div class='mld-article-item--fulltext'>$texto</div>\n";
			
		?>
			<?
			
			// Bloco Bio
			$bio = mysqli_fetch_array(mysqli_query($con,"SELECT nome, curriculum, img FROM colunista WHERE id = '$d[id_colunista]'"));
			if (!$bio["img"]) {
				$bio["img"] = "i-avatar.png";
			}
			print "

			<div class='mld-article-author-bio'>
				<div class='row'>
					<div class='col-md-2 text-center'>
						<div class='mld-article-author-bio-img'>
							<img src='/galeria/$bio[img]' alt='$bio[nome]' />
						</div>
					</div>
					<div class='col-md-10'>
						<div class='mld-article-author-bio-info'>
							<span class='mld-article-author-bio-info--span'>Escrito por</span>
							<h4 class='mld-article-author-bio-info--name'>$bio[nome]</h4>
						</div>
					</div>
				</div>

				<div class='row'>
					<div class='mld-article-author-bio-tex'>
						$bio[curriculum]
					</div>
				</div>
			</div>

			
			\n";
			
			$sqlFK=mysqli_query($con,"SELECT * FROM fk_artigo_relacionado WHERE tabela='blog' AND id_pai = '$d[id]'");
			if (mysqli_num_rows($sqlFK)){
				print "<p>&nbsp;</p>
				<h4 class='mld-article-sidebar--related-title'>Quem leu esse artigo, também se interessou pelos conteúdos abaixo</h4>\n";
				
				$btnPadrao = true;
				if ($_COOKIE["loginNome"]){
					$btnPadrao=false;
				}
				
				$idArtigo=$dFK["link"];
				
				while($dFK=mysqli_fetch_array($sqlFK)){
					if ($btnPadrao){
						//$btnLeiaMais="<a href='#myModal' role='button' data-toggle='modal' onclick=\"idArtigo('$dFK[link]')\">Leia mais</a>";
						$btnLeiaMais="<a href='#myModal' class='button' role='button' data-toggle='modal' onclick=\"idArtigo('$dFK[link]')\">Leia mais</a>";
						//<div class='text-center'><a href='$atual/assinatura' class='button'>Faça sua assinatura!</a></div>
					}else{
						//$btnLeiaMais="<a href='https://revistamundologistica.com.br/servlet/LeArtigo?artigo=$dFK[link]' target='_blank'>Leia mais</a>";
						$btnLeiaMais="<a href='https://revistamundologistica.com.br/servlet/LeArtigo?artigo=$dFK[link]' target='_blank' class='button'>Leia mais</a>";
					}
					print "<p><strong>$dFK[nome]</strong><BR>Resumo: $dFK[descricao] <BR><div align='center'>$btnLeiaMais</div></p>";
				}
				print "<p>&nbsp;</p></div>\n";
			}
			else{
				print "
				<div class='mld-article-cta--assine'>
				<div class='mld-article-cta--assine-topbar'></div>

				<div class='mld-article-cta--assine-info'>

					<div class='row'>
						<div class='col-md-8'>
							<div class='mld-artice-cta--assine-span'>Exclusivo e Inteligente</div>
							<h3 class='mld-article-cta--assine-title'>Mantenha-se atualizado em Logística e Supply Chain</h3>

							<a href='/hml-assine' class='btn btn btn-dark mld-article-cta--assine-btn'>Saiba mais</a>
						</div>
						
						<div class='col-md-4'>
							<img src='assets/images/mdl-newsletter-ex.png' class='w-100' alt=''>
						</div>
					</div>
					
				</div>
				
			</div>


				
				";
				//print "<div class='bgDestaque'>
				//<a href='https://revistamundologistica.com.br/manter-se-atualizado'><img src='/images/bannernoticiasite.jpg' border='0'></a>
				//</div>";
			}
			
			
			
			$sql = mysqli_query($con,"SELECT a.titulo, a.url, b.nome, a.data, b.img FROM blog a, colunista b WHERE b.usuario = '$id' AND a.url != '$id2' AND a.id_colunista = b.id GROUP BY a.id ORDER BY a.id DESC LIMIT 0,6");
			$linhas = mysqli_num_rows($sql);
			if (mysqli_num_rows($sql)) {
				print "<p>&nbsp;</p>
				<h2 class='mld-article-sidebar--related-title'>Quem leu esse artigo, também se interessou pelos conteúdos abaixo</h2>
				<div class='row'>\n";
				$i = 1;
				$a = 0;
				while ($d = mysqli_fetch_array($sql)) {
					print "<div class='col-md-6'>


							<div class='mld-article-sidebar--related-item'>
                                <div class='mld-article-sidebar--related-item-label'>
								".formataData($d["data"], "output")."
                                </div>
                                <h5 class='mld-article-sidebar--related-item-subtitle'>
                                    <a href='".$url_total.$atual."/$id/$d[url]' title='$d[titulo]'>
									$d[titulo]
                                    </a>
                                </h5>
                            </div>
					</div>

					\n";
					$i++;
					$a++;
					if ($i > 2) {
						$i = 1;
						if ($a != $linhas) {
							print "</div>
							<div class='row'>\n";
						}
					}
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
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res' style='display:none;'>
				>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper'>
				\n";
					$b = new banners();
					$b->bannersLaterais($con);
			print "
			</div>
		</div>
		</div>
		
		
		
		</div>
		
		\n";
	?>
			<div class="clearfix"></div>
</article>
</div>
	
<?
}
// Publicação
	
	
	
	
	
	
	// categoria
	elseif ($id && $idCategoria) { 
		print "<h1>$pg</h1>
		
		<div class='row'>
		
			
			<div class='col-md-12'>
		<div class='row'>
		<div class='col-md-12'>\n";
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM blog e, categorias c WHERE c.url = '$c' AND c.id = e.id_categoria GROUP BY e.titulo ORDER BY e.data DESC LIMIT 0,14");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-6 gridEN'>
				<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
					<p class='titulo'>$d[titulo]</p>
					<p><span class='data'>".formataData($d["data"], "output")."</span> <span class='categoria'>$d[categoria]</span></p>
				</a>
				</div>\n";
				$i++;
				$a++;
				if ($i > 2) {
					$i = 1;
					if ($a != $linhas) {
						print "</div>
						<div class='row'>\n";
					}
				}
			}
			print "</div>\n";
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		print "</div>
			</div>
			</div>
		<div class='col-md-4 text-center'>
			<h2 style='margin:0 0 1em 0; line-height:1em;'>Categorias</h2>
		<ul class='menuCategorias'>\n";
		$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
		while ($d = mysqli_fetch_array($sql)) {
			print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
		}
		print "</ul>
		<p>&nbsp;</p>
		\n";
			$b = new banners();
			$b->bannersLaterais($con);
			print "</div>
		</div>	
			\n";
	} // categoria
	
	
	
	
	
	
	
	// colunista
	elseif ($id && $idColunista) { 
		?>

<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		<div class="row">
			<div class="col-md-12">

				<div class="ne_busness_main_slider_wrapper" style="margin:0 0 30px 0">
					<div class="ne_recent_heading_main_wrapper">
						<h1><?=$pg?>SSS</h1>
					</div>
				</div>
		<?
		
		
		// Bloco Bio
		$bio = mysqli_fetch_array(mysqli_query($con,"SELECT nome, curriculum, usuario, img FROM colunista WHERE usuario = '$id'"));
		if (!$bio["img"]) {
			$bio["img"] = "i-avatar.png";
		}
		print "<div class='blocoBio'>
		<div class='row'>
			<div class='col-md-2'>
				<img src='/galeria/$bio[img]' alt='$bio[nome]' />
			</div>
			<div class='col-md-10'>
				<h3>Por $bio[nome]</h3>
				<p>$bio[curriculum]</p>
			</div>
		</div>
		</div>
		<p>&nbsp;</p>\n";
		
		$sql = mysqli_query($con,"
		SELECT e.titulo, e.data, e.img, e.url, c.nome, c2.titulo as categoria, i.img as img2
		FROM blog e 
		INNER JOIN colunista c ON c.id = e.id_colunista 
		INNER JOIN categorias c2 ON c2.id = e.id_categoria
		LEFT JOIN blog_fotos i ON e.id = i.id_blog
		WHERE c.usuario = '$id'
		GROUP BY e.titulo 
		ORDER BY e.data DESC 
		LIMIT 0,30");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				list($ano,$mes,$dia)=explode("-",$d["data"]);
				if ($mes<10){
					$mes=$mes[1];
				}
				$mes=$meses[$mes];
				$mes=substr($mes,0,3);
				
				
				$img=null;
				if ($d["img2"]){
					$img="$d[img2]";
				}
				else{
					if ($d["img"]){
						$img="/galeria/$d[img]";
					}
				}
				?>
				<div class="col-md-4">
					<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
						<div class="ne_re_left_top_main_wrapper">
							<div class="ne_re_left_img_main_wrapper">
								<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
								<h2><?=$d["categoria"]?></h2>
							</div>
							<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper">
								<h3><a href="<?= $atual ."/$id/". $d["url"] ?>"><?=$d["titulo"]?></a></h3>
								<ul class="ne_re_social1_wrapper">
									<li data-animation="animated fadeInLeft"><i class="fa fa-calendar"></i> &nbsp;<? print "$dia $mes, $ano";?></li>
								</ul>
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
		
		print "</div>
		
		<div class='col-md-4'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>CategoriasSSSS</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
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
			
			
		</div>\n";
		
		
		?>
	</div>
</div>
</article>
</div>
<?
		
	} // colunista
	
	
	
	
	
	
	// Index
	else { 
	
	?>

<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		<div class="row">
			<div class="col-md-12">

				<div class="ne_busness_main_slider_wrapper_">
					<div class="ne_recent_heading_main_wrapper_">
						<h2 class="mld-content-title-page"><?=$pg?></h2>
					</div>
				</div>

				<div class="mdl-spacing"></div>
				
		<?	
		//$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, e.id_colunista, c.titulo as categoria FROM blog e, categorias c WHERE e.id_categoria = c.id GROUP BY e.titulo ORDER BY e.data DESC LIMIT 0,14");
		
		$sql = mysqli_query($con,"SELECT c.id, c.nome, c.usuario, c.img FROM colunista c, blog e WHERE e.id_colunista = c.id GROUP BY c.nome ORDER BY c.nome ASC");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				
				print "
					<div class='col-md-4'>
                        <div class='mdl-index-colunistas-w--item'>
                            <div class='row'>
                                <div class='col-3 col-md-3'>
                                    <div class='mdl-index-colunistas-w--avatar'>
										<img class='img-responsive' src='/galeria/$d[img]' alt='$d[nome]' />
                                    </div>
                                </div>

                                <div class='col-9 col-md-9'>
                                    <h4 class='mdl-index-colunistas-w--title'>Por $d[nome]</h4>
                                    <div class='mdl-index-colunistas-w--author'>
                                        <a href='".$url_total.$atual."/$d[usuario]' class='mdl-index-colunistas-w--author-link'>Ver artigos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class='mdl-spacing'></div>

				<div class='col-md-12'>
				<div class='ne_businees_slider_wrapper ne_businees_slider_wrapper2'>
				
				
				
				<div class='row'>
				\n";
				
				$sql2 = mysqli_query($con,"
				SELECT e.titulo, e.data, e.img, e.url, e.id_colunista, c.titulo as categoria, i.img as img2
				FROM blog e 
				INNER JOIN categorias c ON e.id_categoria = c.id 
				LEFT JOIN blog_fotos i ON e.id = i.id_blog
				WHERE e.id_colunista = '$d[id]'
				GROUP BY e.titulo 
				ORDER BY e.data DESC 
				LIMIT 0,3");
				
				while ($d2 = mysqli_fetch_array($sql2)) {
					list($ano,$mes,$dia)=explode("-",$d2["data"]);
					if ($mes<10){
						$mes=$mes[1];
					}
					$mes=$meses[$mes];
					$mes=substr($mes,0,3);
					
					$img=null;
					if ($d2["img2"]){
						$img="$d2[img2]";
					}
					else{
						if ($d2["img"]){
							$img="/galeria/$d2[img]";
						}
					}
					?>
						<div class="col-md-3">
							<div class="mdl-index-card-n mdl-index-card-nf">
								<div class="mdl-index-card-n--thumb">
									<div class="mdl-index-card-n--cat cat-1"><?=$d2["categoria"]?></div>
									<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
								</div>
				
								<div class="mdl-index-card-i">
									<div class="mdl-index-card-n--reading-time"><? print "$dia $mes, $ano";?></div>
									<h4 class="mdl-index-card-n--title">
									<a href="<?= $atual ."/$d[usuario]/". $d2["url"] ?>"><?=$d2["titulo"]?></a>
									</h4>
								</div>
				
								<div class="mdl-index-card-n--actions">
									<a href="<?= $atual ."/$d[usuario]/". $d2["url"] ?>" class="mdl-index-ard-n--link">Ler artigo completo</a>
								</div>
								
								
							</div>
						</div>


					<?
					
				}
				
				print "<div class='mdl-spacing'></div>
				</div>
				</div>
				</div>
				\n";
				$i++;
				$a++;
				if ($i > 2) {
					$i = 1;
					if ($a != $linhas) {
						print "</div>
						<p>&nbsp;</p>
						<div class='row'>\n";
					}
				}
			}
			print "</div>\n";
		}
		else {
			print "<p>Nenhum conteúdo cadastrado.</p>";
		}
		print "
		</div>
		
		<div class='col-md-4' style='display:none'>
		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Categorias</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
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
</article>
</div>
<?
		
		
	}// Index
	
include("_hml-rodape.php");
?>