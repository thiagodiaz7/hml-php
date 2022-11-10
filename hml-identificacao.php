<?
$usuario = strip_tags($_POST['usuario']);
$senha = base64_encode(strip_tags($_POST['senha']));
if ($id == "sair") {
	unset($_SESSION["id_colunista"]);
	header("Location: $url_total");
	exit();
}
else {
	if ($usuario && $senha) {
		$sel = mysqli_query($con,"SELECT id FROM colunista WHERE usuario = '$usuario' AND senha = '$senha' AND status = '1'");
		if (mysqli_num_rows($sel)) {
			$usr = mysqli_fetch_array($sel);
			$_SESSION["id_colunista"] = $usr["id"];
			print "<script>window.history.go(-1);</script>";
		}
		else {
			print "<script>alert('Usuário ou senha incorreto.');window.history.go(-1);</script>";
		}
	}
	else {
		print "<script>alert('Usuário ou senha incorreto.');window.history.go(-1);</script>";
	}
}
exit();
?>