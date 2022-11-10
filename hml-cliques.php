<?
$id_banner = strip_tags($_GET['id_banner']);
$sel = mysqli_query($con,"SELECT id, link FROM banners WHERE id = '$id_banner'");
if (mysqli_num_rows($sel)) {
	mysqli_query($con,"UPDATE banners SET clicks = clicks + 1 WHERE id = '$id_banner'");
	mysqli_query($con,"INSERT INTO banners_clicks VALUES (null,'$id_banner',now(),'$_SERVER[REMOTE_ADDR]','".implode("[break]",$_SERVER)."')");
	$d = mysqli_fetch_array($sel);
	header("Location: $d[link]");
}
else {
	print "<script>alert('Link para banner incorreto.');window.history.go(-1);</script>";
}
exit();
?>