<?
$pg = "Notícias";
if ($id) {
	$idCategoria = false;
	$select = mysqli_query($con,"SELECT titulo, id FROM noticia WHERE url = '$id'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "$dados[titulo]";
		//$titulo = "$dados[titulo] | $nmsite";
		$descricao = "$dados[titulo]";
		$canonical = $url_total . "$atual/$id";
		
		$img2=mysqli_query($con,"SELECT img FROM noticia_fotos WHERE id_noticia = '$dados[id]'");
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
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"SELECT titulo FROM categorias WHERE url = '$c'");
		if (mysqli_num_rows($sql) > 0) {
			$dados = mysqli_fetch_array($sql);
			$pg = "Notícias - $dados[titulo]";
			$titulo = "Notícias - $dados[titulo]";
			//$titulo = "Notícias - $dados[titulo] | $nmsite";
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
	$titulo = "$pg";
	//$titulo = "$pg | $nmsite";
	$bread = "<a href='".$url_total."' itemprop='url'><span>Home</span></a> ›|<span><strong>$pg</strong></span>";
}
include("_hml-topo.php");
?>


<?if ($id && !$idCategoria) {?>

<div class="ne_cu_map_main_wrapper">
<article class="container">
	<? 
		mysqli_query($con,"UPDATE noticia SET lidos = lidos + 1 WHERE url = '$id'");
		
		
		print "
		
		<div class='row'>
		
		
		<div class='col-md-8'>
		
		<div class='mld-article-item'>
		<div class='bkBranco_'>
		<div class='row'>
			<div class='col-md-12'>\n";
		
		$sql = mysqli_query($con,"SELECT * FROM noticia e WHERE e.url = '$id' LIMIT 0,1");
		$d = mysqli_fetch_array($sql);
		
			$dataHoje = date("Y-m-d");
			$sel = mysqli_query($con,"SELECT * FROM banners 
			WHERE status = '1' AND tipo = '4' AND '$dataHoje' BETWEEN data_ini AND data_fim
			ORDER BY RAND()
			LIMIT 0,1");
			while ($dados = mysqli_fetch_array($sel)) {
				if ($dados["codigo"]) {
					print $dados["codigo"];
				}
				else {
					if ($dados["link"]) {
						print "<a href='".$url_total."cliques?id_banner=$dados[id]' ><img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' class='img-responsive'/></a>\n";
					}
					else {
						print "<img src='/images_publicidade/$dados[arquivo]' alt='$dados[titulo]' class='img-responsive'/>\n";
					}
				}
				print "<BR/><BR/>";
			}
			
			
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
			
		
		?>


			<!-- Breadcrumb -->
			<div class="mld-article--breadcrumb">
				<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
					<ol class="breadcrumb">
					<li class="breadcrumb-item mld-article--breadcrumb-item"><a href="hml-noticias">Voltar para Notícias</a></li>
					<li class="breadcrumb-item mld-article--breadcrumb-item active" aria-current="page"><?=$d["titulo"]?></li>
					</ol>
				</nav>
            </div>
             <!-- / Breadcrumb -->

		
		<div class="mld-article-item">
			<div class="ne_recent_heading_main_wrapper">
				<h1 class="mld-article-item--title"><?=$d["titulo"]?></h1>
				<div class="row">
					<div class="col-md-5">
						<?print"<p><small>Publicado em ".formataData($d["data"], "output")."</small></p>";?>
					</div>
					<div class="col-md-7">
						<div class="blocoCompartilhar" style="display:none">
							<div style="float:right; height:20px; margin:1px 0 0 10px">
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
		$texto=str_replace('src="/admin','class="img-responsive" src="/admin',$d["noticia"]);
		
		/* nova rotina */
		$parametro_noticia=$url_total.$atual."/$d[url]";
		include("aux_conteudo_para_assinantes.php");
		
		$sql_assinante=mysqli_query($con,"SELECT id FROM fk_para_assinantes WHERE id_pai = '$d[id]' AND tabela = 'noticia'");
		if (mysqli_num_rows($sql_assinante)){
			$paraAssinantes=true;
		}
		if($paraAssinantes && $btnPadrao){
			$textoTMP=explode("</p>",$texto);
			$textoNOVO=array();
			$i=0;
			foreach($textoTMP as $key => $value){
				$textoNOVO[]=$value;
				if ($i==3){
					$textoNOVO[]=$conteudoParaAssinantes;
					break;
				}
				$i++;
			}
			$texto=implode("</p>",$textoNOVO);
		}
		/* nova rotina */
		
		
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
		
		
		print "<div class='mld-article-item--fulltext'>".$texto."</div>";
			
			$sqlFK=mysqli_query($con,"SELECT * FROM fk_artigo_relacionado WHERE tabela='noticia' AND id_pai = '$d[id]'");
			if (mysqli_num_rows($sqlFK)){
				print "<div class='bgDestaque'><p>&nbsp;</p>
				<div class='ne_recent_heading_main_wrapper'><h2>Artigo(s) publicado(s) na revista e relacionado(s)</h2></div>\n";
				
				$btnPadrao = true;
				if ($_COOKIE["loginNome"]){
					$btnPadrao=false;
				}
				
				
				
				while($dFK=mysqli_fetch_array($sqlFK)){
					if ($btnPadrao){
						//$btnLeiaMais="<a href='#myModal' role='button' data-toggle='modal' onclick=\"idArtigo('$dFK[link]')\">Leia mais</a>";
						$btnLeiaMais="<a href='#myModal' class='button' role='button' data-toggle='modal' onclick=\"idArtigo('$dFK[link]')\">Ler o artigo</a>";
						//<div class='text-center'><a href='$atual/assinatura' class='button'>Faça sua assinatura!</a></div>
					}else{
						//$btnLeiaMais="<a href='https://revistamundologistica.com.br/servlet/LeArtigo?artigo=$dFK[link]' target='_blank'>Leia mais</a>";
						$btnLeiaMais="<a href='https://revistamundologistica.com.br/servlet/LeArtigo?artigo=$dFK[link]' target='_blank' class='button'>Ler o artigo</a>";
					}
					print "<BR>&nbsp;<p><strong>$dFK[nome]</strong><BR>$dFK[descricao] <BR><div align='center'>$btnLeiaMais</div></p>";
				}
				print "<p>&nbsp;</p></div>\n";
			}
			else{
				//print "<div class='bgDestaque'>
				//<h3 class='text-center'>Quer se manter atualizado em logística e supply chain?<BR> <a href='/manter-se-atualizado'>Clique aqui e saiba mais!</a></h3>
				//</div>";
				print "<div class='bgDestaque'>
				<a href='https://revistamundologistica.com.br/revista/assinatura'><img src='/images/premium-noticias2.jpg' class='img-responsive' border='0'></a>
				</div>";
			}
			
		print "	
			</div>
			</div>
		</div>\n";
		// Leia mais
		
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM noticia e, categorias c WHERE c.id = '$d[id_categoria]' AND c.id = e.id_categoria AND e.id != '$d[id]' GROUP BY e.titulo ORDER BY e.data DESC LIMIT 0,6");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			?>
		
		<h4 class="mld-article-sidebar--related-title">Quem leu esse artigo, também se interessou pelos conteúdos abaixo</h4>

			<div class="row">
			<?
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-6'>

				<div class='mld-article-sidebar--related-item'>
					<div class='mld-article-sidebar--related-item-label'>
					$d[categoria]
					</div>
					<h5 class='mld-article-sidebar--related-item-subtitle'>
						<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
						$d[titulo]
						</a>
					</h5>
				</div>
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
		
		// Leia mais
		
		
		print "
		</div>
		<!-- O QUE FECHA ESSA DIV -->

		</div>
		<!-- O QUE FECHA ESSA OUTRA DIV -->
		
		<div class='col-md-4'>

	


		<div class='ne_indx_sidebar_main_wrapper'>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_inner_social_wrapper_hide_res' style='display:none;'>
				<div class='ne_recent_heading_main_wrapper font_18px'>
					<h2>Categorias</h2>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<ul class='menuCategorias'>\n";
				// Leia mais
		
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM noticia e, categorias c WHERE c.id = '$d[id_categoria]' AND c.id = e.id_categoria AND e.id != '$d[id]' GROUP BY e.titulo ORDER BY e.data DESC LIMIT 0,6");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			?>
		
			
			<div class="row">
			<?
			
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
		
		// Leia mais
		
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
		</div>\n";
		

		
		
	?>

				
				
			</div>

			</div>

			
			<div class="clearfix"></div>
</article>
</div>
	
<?
}
elseif ($id && $idCategoria) { // categoria

	?>	
<div class="ne_recent_news_main_wrapper_">
	<div class="container">
		<div class="ne_recent_left_side_wrapper_">

		<div class="ne_busness_main_slider_wrapper_">
			<div class="ne_recent_heading_main_wrapper_">
				<h2 class="mld-content-title-page"><?=$pg?></h2>
			</div>
		</div>

		<div class="mdl-spacing"></div>


	<?

		print "
		<div class='row'>
		<div class='col-md-12'>
		<div class='mld-general--options'>
				<ul class='mld-general--options-list'>
				<li class='mld-general--options-list-item'><a href='hml-noticias'>Todas</a></li>\n";
				
				$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li class='mld-general--options-list-item c_$d[url]'><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
		\n";
		
		?>

		
<div class="mdl-spacing"></div>


		<?
		
		if ($_GET["pg"]) {
			$pg = strip_tags($_GET["pg"]);
			$pg = $pg - 1;
		}
		else {
			$pg = 0;
		}
		
		$lmt = $pg * 15;
		
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"
		SELECT e.titulo, e.data, e.img, e.url, c.titulo as categoria, i.img as img2
		FROM noticia e 
		INNER JOIN categorias c ON e.id_categoria = c.id 
		LEFT JOIN noticia_fotos i ON e.id = i.id_noticia
		WHERE c.url = '$c'
		GROUP BY e.titulo 
		ORDER BY e.data DESC 
		LIMIT $lmt,15");
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
				<div class="col-md-3">
                    <div class="mdl-index-card-n mdl-index-card-nf">
                        <div class="mdl-index-card-n--thumb">
                            <div class="mdl-index-card-n--cat cat-1"><?=$d["categoria"]?></div>
                            <img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
                        </div>

                        <div class="mdl-index-card-i">
                            <div class="mdl-index-card-n--reading-time"><? print "$dia $mes, $ano";?></div>
                            <h4 class="mdl-index-card-n--title">
                                <a href=""><a href="<?= $atual ."/". $d["url"] ?>"><?=$d["titulo"]?></a></a>
                            </h4>
                        </div>

                        <div class="mdl-index-card-n--actions">
                            <a href="<?= $atual ."/". $d["url"] ?>" class="mdl-index-ard-n--link">Ler artigo completo</a>
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
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM noticia e, categorias c WHERE c.url = '$c' AND c.id = e.id_categoria GROUP BY e.titulo ORDER BY e.data DESC");
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
		
		
		print "</div>
			
		<div class='col-md-4' style='display:none;'>
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
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper' style='display:none;'>
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
<?			
			
	} // categoria
	
	else { // Index
	
?>

<div class="mld-index-wrapper">
	<div class="container">


			<div class="mdl-spacing"></div>
            <div class="row">
                <div class="col-7 col-md-10">  <h2 class="mdl-index-title-d"><?=$pg?></h2></div>
            </div>
            <div class="mdl-spacing"></div>

<?
		print "
		<div class='col-md-4_'>
		<div class='ne_indx_sidebar_main_wrapper_'>
			<div class='mld-general--options'>
				<ul class='mld-general--options-list'>
				<li class='mld-general--options-list-item active'><a href='#'>Todas</a></li>\n";
				
				$sql = mysqli_query($con,"SELECT titulo, url FROM categorias ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li class='mld-general--options-list-item'><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			</div>
			<div class='ne_sidebar_inner_social_wrapper ne_sidebar_second_inner_social_wrapper_'>
				\n";
				
			print "
			<div class='mdl-spacing'></div>
		</div>
		</div>
			
			
		</div>
		
		\n
		\n";
		?>
		
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
		SELECT e.titulo, e.data, e.img, e.url, e.link_lp, c.titulo as categoria, i.img as img2
		FROM noticia e 
		INNER JOIN categorias c ON e.id_categoria = c.id 
		LEFT JOIN noticia_fotos i ON e.id = i.id_noticia
		GROUP BY e.titulo 
		ORDER BY e.data DESC 
		LIMIT $lmt,15");
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
				  <div class="col-md-3">
                    <div class="mdl-index-card-n mdl-index-card-nf">
                        <div class="mdl-index-card-n--thumb">
                            <div class="mdl-index-card-n--cat cat-1"><?=$d["categoria"]?></div>
							<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
                        </div>

                        <div class="mdl-index-card-i">
                            <div class="mdl-index-card-n--reading-time"><? print "$dia $mes, $ano";?></div>
							<? 
							if ($d["link_lp"] == ""){
							?>
								
								<h4 class="mdl-index-card-n--title">
									<a href="<?= $atual ."/". $d["url"] ?>"><?=$d["titulo"]?></a>
                            	</h4>
							<?
							}else{
							?>
								<h4 class="mdl-index-card-n--title">
								<a href="<?= $d["link_lp"] ?>" target="_blank"><?=$d["titulo"]?></a>
                            	</h4>

							<? } ?>	


                           
                        </div>

                        <div class="mdl-index-card-n--actions">
                            <a href="<?= $atual ."/". $d["url"] ?>" class="mdl-index-ard-n--link">Ler artigo completo</a>
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
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM noticia e, categorias c WHERE e.id_categoria = c.id GROUP BY e.titulo ORDER BY e.data DESC");
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
		<div class='col-md-4'>
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
</div>
	<?	
	}// Index
	?>

<?
include("_hml-rodape.php");
?>