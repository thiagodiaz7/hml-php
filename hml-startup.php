<?
if ($_GET["cadastro"]){
	include("pg-startup-cadastro.php");
	exit();
}
$pg = "Startup";
if ($id) {
	$idCategoria = false;
	$select = mysqli_query($con,"SELECT titulo FROM startup WHERE url = '$id'");
	if (mysqli_num_rows($select) > 0) {
		$dados = mysqli_fetch_array($select);
		$titulo = "Startup - $dados[titulo] | $nmsite";
		$canonical = $url_total . "$atual/$id";
	}
	else {
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"SELECT titulo FROM startup_categoria WHERE url = '$c'");
		if (mysqli_num_rows($sql) > 0) {
			$dados = mysqli_fetch_array($sql);
			$pg = "Startups - Categoria: $dados[titulo]";
			$titulo = "Startup - $dados[titulo] | $nmsite";
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
<div class="ne_cu_map_main_wrapper">
<article class="container">
<div class="bkBranco">
	<div class="ne_map_content_wrapper ne_map_content_wrapper2">
	<? if ($id && !$idCategoria) {
		mysqli_query($con,"UPDATE startup SET lidos = lidos + 1 WHERE url = '$id'");
		
		print "
		<div class='row'>
		
			
			<div class='col-md-8'>
		<div class='row'>
			<div class='col-md-12'>\n";
			
		$sql = mysqli_query($con,"SELECT e.*, c.titulo as categoria FROM startup e, startup_categoria c WHERE e.url = '$id' AND c.id = e.id_categoria LIMIT 0,1");
		$d = mysqli_fetch_array($sql);
			$img=null;
		if ($d["logo_startup"]){
			$img="<img src='/galeria/$d[logo_startup]' alt='logo de $d[titulo]' width='150' />";
		}
		
		$txt=null;
		if ($d["site"]){
			$txt.="
			<div class='row'>
				<div class='col-md-3 txtLeft'>
					<strong>Site:</strong>
				</div>
				<div class='col-md-8 txtLeft'>
					<a href='$d[site]' target='_blank'>$d[site]</a>
				</div>
			</div>\n";
		}
		
		
		if ($d["investimento"]){
			$txt.="
			<div class='row'>
				<div class='col-md-3 txtLeft'>
					<strong>Investimento:</strong>
				</div>
				<div class='col-md-8 txtLeft'>
					$d[investimento]
				</div>
			</div>\n";
		}
		if ($d["faturamento"]){
			$txt.="
			<div class='row'>
				<div class='col-md-3 txtLeft'>
					<strong>Faturamento:</strong>
				</div>
				<div class='col-md-8 txtLeft'>
					$d[faturamento]
				</div>
			</div>\n";
		}
		
		
		print "<h1 class='tituloContent'>Startup - $d[titulo]</h1>
			
			
			<div class='row'>
				<div class='col-md-8'>
					<p>&nbsp;</p>
					$txt
				</div>
				
				<div class='col-md-4'>
					<a href='$d[site]' target='_blank' border='0'>$img</a>
				</div>
			
			</div>";
			
			
			if ($d["descricao_startup"]){
				print"
				<hr />
				<h3>Descrição:</h3>
				$d[descricao_startup]\n";
			}
			
			
			$sql = mysqli_query($con,"SELECT e.titulo, e.url, e.descricao_startup, c.titulo as categoria FROM startup e, startup_categoria c WHERE c.id = '$d[id_categoria]' AND c.id = e.id_categoria AND e.id != '$d[id]' AND e.status='1' GROUP BY e.titulo ORDER BY e.ordem, e.titulo DESC LIMIT 0,6");
			$linhas = mysqli_num_rows($sql);
			if (mysqli_num_rows($sql)) {
				print "<p>&nbsp;</p>
				<h2 class='txtCenter'>Veja também:</h2>
				<div class='row'>\n";
				$i = 1;
				$a = 0;
				while ($d = mysqli_fetch_array($sql)) {
					print "<div class='col-md-6 gridEN'>
					<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
						<p class='titulo'><strong>$d[titulo]</strong></p>
						<p><span class='categoria' style='background:none;padding:0;'>".(substr( strip_tags($d["descricao_startup"]), 0, 150))."...</span></p>
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
				
				print "<div class='txtCenter'><a href='/startup' class='button'>Voltar para Categorias</a></div>";
				
			}	
			
		print "	
			</div>
			</div>
		</div>
		
		<div class='col-md-4 text-center'>
			<h2 style='margin:0 0 1em 0; line-height:1em;'>Categorias</h2>
			<ul class='menuCategorias'>\n";
			$sql = mysqli_query($con,"SELECT titulo, url FROM startup_categoria ORDER BY titulo ASC");
			while ($d = mysqli_fetch_array($sql)) {
				print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
			}
			print "</ul>
			<p>&nbsp;</p>\n";
			$b = new banners();
			$b->bannersLaterais($con);
			print "</div>
		</div>
		\n";
	}
	elseif ($id && $idCategoria) { // categoria
		print "<h1>$pg</h1>
		<div class='row'>
		
			
			<div class='col-md-8'>
		<div class='row'>
		<div class='col-md-12'>\n";
		
		if ($_GET["pg"]) {
			$pg = strip_tags($_GET["pg"]);
			$pg = $pg - 1;
		}
		else {
			$pg = 0;
		}
		
		$lmt = $pg * 16;
		
		$c = str_replace("c_","",$id);
		$sql = mysqli_query($con,"SELECT e.titulo, e.url, e.descricao_startup, c.titulo as categoria FROM startup e, startup_categoria c WHERE c.url = '$c' AND c.id = e.id_categoria AND e.status='1' GROUP BY e.titulo ORDER BY e.ordem, e.titulo DESC LIMIT $lmt,16");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-6 gridEN'>
				<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
					<p class='titulo'><strong>$d[titulo]</strong></p>
					<p><span class='categoria' style='background:none;padding:0;'>".(substr( strip_tags($d["descricao_startup"]), 0, 150))."...</span></p>
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
		
		
		/* Paginação */
		$sql = mysqli_query($con,"SELECT e.id FROM startup e, startup_categoria c WHERE c.url = '$c' AND c.id = e.id_categoria AND e.status='1' GROUP BY e.titulo");
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
				print "<BR><div class='txtCenter'><a href='/startup' class='button'>Voltar para Categorias</a></div>";
		
		
		print "</div>
			</div>
			</div>
			
			<div class='col-md-4 text-center'>
			<h2 style='margin:0 0 1em 0; line-height:1em;'>Categorias</h2>
				<ul class='menuCategorias'>\n";
				$sql = mysqli_query($con,"SELECT titulo, url FROM startup_categoria ORDER BY titulo ASC");
				while ($d = mysqli_fetch_array($sql)) {
					print "<li><a href='".$url_total.$atual."/c_$d[url]'>$d[titulo]</a></li>\n";
				}
				print "</ul>
			<p>&nbsp;</p>\n";
			$b = new banners();
			$b->bannersLaterais($con);
			print "</div>
			</div>
			\n";
	} // categoria
	
	else { // Index
		//print "<h1>$pg</h1>
		print "
		<div class='row'>
		
		<div class='col-md-8'>
		
		<div class='row'>
		<div class='col-md-12'>\n
		<div align='left'><img src='/images/catalogostartups2.jpg' class='img-responsive' /></div>\n
		<div align='center' class='titulo'><strong>Categorias</strong></div>";
		
		// Categorias
		print "<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<div class='row'>
		\n";
		$sql=mysqli_query($con,"SELECT * FROM startup_categoria ORDER BY titulo");
		$i=1;
		while($d=mysqli_fetch_array($sql)){
			
			$numCad=mysqli_num_rows(mysqli_query($con,"SELECT id FROM startup WHERE id_categoria = '$d[id]' AND status='1'"));
			
			print "
			<div class='col-md-6'>
				<div class='txtCenter'><a href='".$url_total.$atual."/c_$d[url]' style='display:inline-block;line-height:2em;'>$d[titulo] <small>($numCad)</small></a></div>
			</div>
			";
			$i++;
			if ($i>2){
				print "</div>
				<div class='row'>\n";
				$i=1;
			}
		}
		
		print "
			</div>
		</div>
		</div>
		<p>&nbsp;</p>
		<div class='txtCenter'><a href='$atual?cadastro=true' class='button'>Cadastrar Startup</a></div>
		\n";
		
		// Destaques
		
		$sql = mysqli_query($con,"SELECT e.titulo, e.url, e.logo_startup, c.titulo as categoria FROM startup e, startup_categoria c WHERE e.id_categoria = c.id AND e.fl_home='1' AND status='1' GROUP BY e.titulo ORDER BY e.ordem, e.titulo DESC");
		$linhas = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql)) {
			print "<p>&nbsp;</p><h2 class='txtCenter'>Destaques</h2>\n";
			print "<div class='row'>\n";
			$i = 1;
			$a = 0;
			while ($d = mysqli_fetch_array($sql)) {
				print "<div class='col-md-6 gridEN'>\n";
				if ($d["logo_startup"]){
					print "<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
						<div class='row'>
							<div class='col-md-3'>
								<div class='txtCenter'><img src='/galeria/$d[logo_startup]' alt='logo de $d[titulo]' style='max-width:80%' /></div>
							</div>
							<div class='col-md-9'>
								<p class='titulo'>$d[titulo]</p>
								<p><span class='categoria'>$d[categoria]</span></p>
							</div>
						</div>
					
						
					</a>";
				}else {
					print "
					<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
						<p class='titulo'>$d[titulo]</p>
						<p><span class='categoria'>$d[categoria]</span></p>
					</a>
					";
				}
				print "</div>\n";
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
		
		
		
		print "</div>
		</div>
		</div>
		<div class='col-md-4 text-center'>
		\n";
			$b = new banners();
			$b->bannersLaterais($con);
			print "</div>
		</div>
		\n";
	}// Index
	?>
	<div class="clearfix"></div>
	</div>
</div>
</article>
</div>
<?
include("_rodape.php");
?>