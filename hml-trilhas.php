<?
if (!$_COOKIE["loginNome"]){
	header("Location: ".$url_total."LoginIni.jsp");  
	exit();
}
if ($_GET["trilha_ir"]){

	$sql=mysqli_query($con,"SELECT id FROM trilhas_links_usuarios WHERE id_trilha_links = '$_GET[trilha_ir]' AND id_usuario = '$_COOKIE[loginID]'");
	if (!mysqli_num_rows($sql)){
		mysqli_query($con,"INSERT INTO trilhas_links_usuarios VALUES (null,'$_GET[trilha_ir]','$_COOKIE[loginID]')");
	}
	$d=mysqli_fetch_array(mysqli_query($con,"SELECT link FROM trilhas_links WHERE id = '$_GET[trilha_ir]' LIMIT 0,1"));
	header("Location: $d[link]");  
	exit();	
}
$pg = "Trilhas de conhecimento";
$obj = new trilhas();
$tab = "trilhas";
if ($id) {
	$select = $obj->getRegistro($id,$con);
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
include("_topo.php");
?>
<div style="background:#fff;padding:40px 0">

<?
// Resultado
if ($id3){
	$d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM trilhas WHERE url = '$id' LIMIT 0,1"));
	$idTrilha=$d["id"];
	$t1="Prova";
	if ($id3=="certificado"){
		$t1="Certificado";
	}
?>
<article class="container">
	<p style="margin:2em 0 0 0"><a href="trilhas/<?=$id?>" style="font-size:12px">Voltar para as matérias</a> | <a href="/Assinante.jsp" style="font-size:12px">voltar para a área do assinante</a></p>
	<h1><?=$t1?> - <?=$d["titulo"]?></h1>
	<div style="border:1px solid #ccc;padding:20px;margin:20px 0;">
		<?
		$sqlNumQuestoes = mysqli_num_rows(mysqli_query($con,"SELECT * FROM trilhas_perguntas WHERE id_trilha = '$d[id]' ORDER BY RAND() LIMIT 0,20"));
		$acertos=0;
		foreach($_POST as $key => $value){
			$idQuestao=str_replace("questao_","",$key);
			$dTMP = mysqli_fetch_array(mysqli_query($con,"SELECT resposta FROM trilhas_perguntas WHERE id = '$idQuestao' LIMIT 0,1"));
			if ($dTMP["resposta"]==$value){
				$acertos++;
			}
		}
		$totalPercentual = ($acertos/$sqlNumQuestoes)*100;
		?>
		
		<?
		if ($totalPercentual>=60 OR $id3=="certificado"){ 
			$sql2=mysqli_query($con,"SELECT id FROM trilhas_certificados WHERE id_trilha = '$idTrilha' AND id_usuario = '$_COOKIE[loginID]'");
			if (!mysqli_num_rows($sql2)){
				mysqli_query($con,"INSERT INTO trilhas_certificados VALUES (null,'$idTrilha','$_COOKIE[loginID]',now(),'')");
			}
			include("emailTrilhas.php");
		?>
		<h3>Parabéns!</h3>
		<p>Você concluiu a Trilha <?=$d["titulo"]?>!</p>
		<p>Você receberá seu certificado por e-mail.</p>
		<!--
		<h3 class='text-center'>Você acertou <?=$totalPercentual?>% das questões.</h3>
		<div class="text-center"><a href="<?="$atual/$id/$id2";?>" class="button">Solicitar certificado</a></div>
		-->
		<?}else{?>
		<h3 class='text-center'>Você acertou <?=$totalPercentual?>% das questões.</h3>
		<div class="text-center"><a href="<?="$atual/$id/$id2";?>" class="button">Refazer a prova</a> <a href="<?="$atual/$id";?>" class="button">Voltar ao Conteúdo</a></div>
		<?}?>
	</div>
	<p>&nbsp;</p>
</article>

<?
}//resultado

elseif ($id2 && !$id3){
$d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM trilhas WHERE url = '$id' LIMIT 0,1"));
?>

<article class="container">
	<p style="margin:2em 0 0 0"><a href="trilhas/<?=$id?>" style="font-size:12px">Voltar para as matérias</a> | <a href="/Assinante.jsp" style="font-size:12px">voltar para a área do assinante</a></p>
	<h1>Prova - <?=$d["titulo"]?></h1>
	<p>Responda todas as questões para concluir a prova.</p>
	<form method="post" action="<?=$url_total.$atual."/$id/$id2/resultado"?>">
	<div style="border:1px solid #ccc;padding:20px;margin:20px 0;">
		<?
		$liberarProva=false;
		$select = mysqli_query($con,"SELECT * FROM trilhas_perguntas WHERE id_trilha = '$d[id]' ORDER BY RAND() LIMIT 0,20");
		$i = 1;
		while($d = mysqli_fetch_array($select)){
			print "<p class='titulo'><strong>$i) $d[pergunta]</strong></p>\n";
			if ($d["opcao1"]){
				print "<p><input type='radio' name='questao_$d[id]' value='1' /> $d[opcao1]</p>\n";
			}
			if ($d["opcao2"]){
				print "<p><input type='radio' name='questao_$d[id]' value='2' /> $d[opcao2]</p>\n";
			}
			if ($d["opcao3"]){
				print "<p><input type='radio' name='questao_$d[id]' value='3' /> $d[opcao3]</p>\n";
			}
			if ($d["opcao4"]){
				print "<p><input type='radio' name='questao_$d[id]' value='4' /> $d[opcao4]</p>\n";
			}
			if ($d["opcao5"]){
				print "<p><input type='radio' name='questao_$d[id]' value='5' /> $d[opcao5]</p>\n";
			}
			print "<hr style='margin:0 0 5px 0' />\n";
			$i++;
		}
		?>
	</div>
	<div class="text-center"><button type="submit" class="button" style="outline:0">Finalizar</button></div>
	</form>
	<p>&nbsp;</p>
</article>

<?
}elseif($id && !$id2){
$d=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM trilhas WHERE url = '$id' LIMIT 0,1"));
$idTrilha=$d["id"];
?>

<article class="container">
	<p>&nbsp;</p><p style="margin:2em 0 0 0"><a href="trilhas" style="font-size:12px">Voltar para trilhas de conhecimento</a> | <a href="/Assinante.jsp" style="font-size:12px">voltar para a área do assinante<BR>&nbsp;</a></p>
	<h1><?=$d["titulo"]?></h1>
	<?if($d["carga_horaria"]){?>
	<p>Horas estimadas para a conclusão da trilha: <?=$d["carga_horaria"]?></p>
	<?}?>
	<!-- <p>Conteúdos indicados para esta trilha de conhecimento.</p> -->
	<div style="border:1px solid #ccc;padding:20px;margin:20px 0;">
		<div class="row">
			<div class="col-md-9 txtLeft"><strong>Atividades</strong></div>
			<div class="col-md-3"><strong>Realizado</strong></div>
		</div>
		<hr style='margin:0 0 5px 0' />
		<?
		$liberarProva=false;
		$select = mysqli_query($con,"SELECT * FROM trilhas_links WHERE id_trilha = '$d[id]' ORDER BY ordem");
		$numPerguntas=mysqli_num_rows($select);
		$qtdeRealizado=0;
//		$arquivo = fopen('trilhas.txt','w');
//fwrite($arquivo, "id do usuario: ".$_COOKIE[loginID]);
//Fechamos o arquivo após escrever nele
//fclose($arquivo);	



		while($d = mysqli_fetch_array($select)){
			$tarefaFeita="<i class='fa fa-times'></i>";
			$sql2=mysqli_query($con,"SELECT id FROM trilhas_links_usuarios WHERE id_trilha_links = '$d[id]' AND id_usuario = '$_COOKIE[loginID]'");
			if (mysqli_num_rows($sql2)){
				$tarefaFeita="<i class='fa fa-check'></i>";
				$qtdeRealizado++;
			}
			
			print "
			<div class='row'>
			<div class='col-md-9'>
				<a href='trilhas?trilha_ir=$d[id]' target='_blank' onclick='openWindowReload(this)'>
					<p class='titulo'>$d[titulo]</p>
				</a>
				
		
			</div>
			<div class='col-md-3'>
				$tarefaFeita
			</div>
			</div>
			<hr style='margin:0 0 5px 0' />
			\n";
		}
		
		print "
		<script>
			function openWindowReload(link) {
				var href = link.href;
				window.open(href,'_blank');
				document.location.reload(true)
			}
		</script>
		
		
		";
		
		?>
	</div>
	<p align="center"><strong>Observação: a realização da prova será liberada assim que você acessar todos os conteúdos da trilha. E o Certificado estará liberado caso você atinja a nota mínima de 60% de acertos na prova.<BR>&nbsp;</strong></p>
	
	<div class="text-center">
	<?
	$linkProva=null;
	if ($qtdeRealizado==$numPerguntas){
		$linkProva="$atual/$id/prova";
	}
	?>
	<a <?if($linkProva){?>href="<?=$linkProva?>"<?}else{?>style="background-color:#777;color:#AAA"<?}?> class="button">Realizar Prova</a>
	
	<?
	$sql2=mysqli_query($con,"SELECT id FROM trilhas_certificados WHERE id_trilha = '$idTrilha' AND id_usuario = '$_COOKIE[loginID]'");
	if (mysqli_num_rows($sql2)){
	?>
	<a href="<?="$atual/$id/prova/certificado";?>" class="button">Solicitar Certificado</a>
	<?}else{?>
	<a style="background-color:#777;color:#AAA" class="button">Solicitar Certificado</a>
	<?}?>
	</div>
	<p>&nbsp;</p>
</article>

<?}else{?>
<article class="container">
	<div align="center"><p><BR>&nbsp;</p><a href="/Assinante.jsp"><img src="/images/assinante/voltar3.jpg" border="0" /></a><BR><BR>&nbsp;</div>
	<h1>Trilhas de conhecimento</h1>
<p>As trilhas de conhecimento são como cursos específicos, organizados por assuntos e com materiais (palestras, artigos, matérias, etc) já publicados pela revista! <BR><BR>Realizando todas as atividades descritas (lendo os artigos, assistindo os eventos, etc), ou seja, estudando sobre o assunto, você poderá fazer uma avaliação, e atingindo 60% ou mais nesta avaliação, você receberá um certificado de conhecimento no assunto da trilha escolhida!<BR><BR></p>
	<p align="center">Selecione uma trilha de conhecimento abaixo, faça as atividades e ganhe seu certificado!</p>
	<div style="padding:20px;margin:20px 0;">
		<div class='row'>
			<?
			$liberarProva=false;
			$select = mysqli_query($con,"SELECT * FROM trilhas ORDER BY id DESC");
			while($d = mysqli_fetch_array($select)){
				print "<div class='col-md-4 gridEN'>
				<a href='".$url_total.$atual."/$d[url]' title='$d[titulo]'>
					<div class='imgGlossario'>
						<img src='galeria/$d[img]' alt='Foto de $d[titulo]' class='img-responsive' />
					</div>
					<p class='titulo text-center'>$d[titulo] ($d[carga_horaria])</p>
				</a>
				</div>\n";
			}
			?>
		</div>
	</div>
	
	<p>&nbsp;</p>
</article>
<?}?>

</div>
<?
include("_rodape.php");
?>