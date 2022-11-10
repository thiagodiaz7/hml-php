<?
if (!$_COOKIE["loginNome"]){
	header("Location: ".$url_total."LoginIni.jsp");  
	exit();
}



$pg = "Materiais Exclusivos";
$titulo = "$pg | $nmsite";
include("_topo.php");
?>
<div style="background:#fff;padding:40px 0">

<?


if ($id2){
$d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM $id WHERE id = '$id2' LIMIT 0,1"));
?>


<div class="ne_cu_map_main_wrapper">
<article class="container">
	<? 
		mysqli_query($con,"UPDATE $id SET lidos = lidos + 1 WHERE id = '$id2'");
		
		
		print "
		
		<div class='row'>
		
		
		<div class='col-md-12'>
		
		<div class='ne_map_content_wrapper ne_map_content_wrapper2'>
		<div class='bkBranco'>
		<div class='row'>
			<div class='col-md-12'>
			
			<div align='center'><a href='".$atual."/".$id."'>Voltar</a><BR><BR>&nbsp;</div>
			\n";
		
		$sql = mysqli_query($con,"SELECT * FROM $id e WHERE e.id = '$id2' LIMIT 0,1");
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

		
		<div class="ne_busness_main_slider_wrapper" style="margin:0 0 0 0">
			<div class="ne_recent_heading_main_wrapper">
				<h1><?=$d["titulo"]?></h1>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-5">
						<?print"<p><small>Publicado em ".formataData($d["data"], "output")."</small></p>";?>
					</div>
					<div class="col-md-7">
						<div class="blocoCompartilhar">
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
		
		
		print "<div class='txtConteudos'>".$texto."</div>";
			
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
		
		
		
		
		print "
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
elseif($id && !$id2){

$arrNMs = array(
	"artigo"=>"Artigos",
	"noticia"=>"Notícias",
	"entrevista"=>"Entrevistas"
);
?>






<div class="ne_recent_news_main_wrapper">
	<div class="container">
		<div class="ne_recent_left_side_wrapper">
		
<?
		print "
		
		<div class='row'>
		<div class='col-md-12'>
		\n";
		?>
		<div align="center"><a href="./<?=$atual?>">Voltar</a><BR><BR>&nbsp;</div>
		
		<div class="ne_busness_main_slider_wrapper" style="margin:0 0 30px 0">
			<div class="ne_recent_heading_main_wrapper">
				<h1>Materiais Exclusivos - <?=$arrNMs[ $id ]?></h1>
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
		
		$tab_foto = $id."_fotos";
		$id_tab_foto = "id_".$id;
		
		$sql = mysqli_query($con,"
		SELECT e.id, e.titulo, e.data, e.img, e.url, e.link_lp, c.titulo as categoria, i.img as img2
		FROM $id e 
		INNER JOIN categorias c ON e.id_categoria = c.id 
		INNER JOIN fk_para_assinantes tb2 ON e.id = tb2.id_pai AND tb2.tabela = '$id'
		LEFT JOIN $tab_foto i ON e.id = i.$id_tab_foto
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
				<div class="col-md-4">
					<div class="ne_businees_slider_wrapper ne_businees_slider_wrapper2">
						<div class="ne_re_left_top_main_wrapper">
							<div class="ne_re_left_img_main_wrapper">
								<img src="<?=$img?>" alt="<?=$d["titulo"]?>" />
								<h2><?=$d["categoria"]?></h2>
							</div>
							<div class="ne_re_left_img_cont_main_wrapper ne_buss_img_cont_main_wrapper">
							<? 
							if ($d["link_lp"] == ""){
							?>
								<h3><a href="<?= $atual ."/$id/". $d["id"] ?>"><?=$d["titulo"]?></a></h3>
							<?
							}else{
							?>
								<h3><a href="<?= $d["link_lp"] ?>" target="_blank"><?=$d["titulo"]?></a></h3>
							<? } ?>	
								
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
		
		/* Paginação */
		$sql = mysqli_query($con,"SELECT e.titulo, e.data, e.url, c.titulo as categoria FROM $id e, categorias c, fk_para_assinantes tb2 WHERE e.id_categoria = c.id AND e.id = tb2.id_pai AND tb2.tabela = '$id' GROUP BY e.titulo ORDER BY e.data DESC");
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




<?}else{?>
<article class="container">
	<div align="center"><p><BR>&nbsp;</p><a href="/Assinante.jsp"><img src="/images/assinante/voltar3.jpg" border="0" /></a><BR><BR>&nbsp;</div>
	<h1 style="margin-bottom:1em">Materiais Exclusivos</h1>
	<p>Selecione um tipo de conteúdo abaixo.</p>
	<div style="padding:20px;margin:20px 0;">
		<div class='row'>
			<div class="col-md-4">
				<div class="boxServico" style="min-height:auto">
					<p class="txtCenter" style="text-align:center;border:none;font-size:1.2rem;font-weight:bold;margin:0;"><a href="./<?=$atual?>/noticia">Notícias</a></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="boxServico" style="min-height:auto">
					<p class="txtCenter" style="text-align:center;border:none;font-size:1.2rem;font-weight:bold;margin:0;"><a href="./<?=$atual?>/entrevista">Entrevistas</a></p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="boxServico" style="min-height:auto">
					<p class="txtCenter" style="text-align:center;border:none;font-size:1.2rem;font-weight:bold;margin:0;"><a href="./<?=$atual?>/artigo">Artigos</a></p>
				</div>
			</div>
		</div>
	</div>
	
	<p>&nbsp;</p>
</article>
<?}?>

</div>
<?
include("_rodape.php");
?>