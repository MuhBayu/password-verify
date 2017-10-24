<?php
/**
** PEMGGUNAAN PASSWORD VERIFY
* @author MuhBayu (https://github.com/MuhBayu)
*/

// Penggunaan fungsi bawaan dari PHP ini sangat lebih aman dibandingkan menggunakan HASH MD5 atau SHA untuk melindungi password MySQL Anda. 

function enkrip($text) {
	return password_hash($text, PASSWORD_BCRYPT);
}
function verify_password($password, $hash) {
	return (password_verify($password, $hash));
}
function cocokin($password, $hash) {
	return (verify_password($password, $hash) ? 'Cocok' : 'Tidak cocok');
}

@$text = $_REQUEST['txt'];
if(isset($text)) @$enkrip = enkrip($text);

@$cekHash = $_REQUEST['cekHash'];
@$cekPass = $_REQUEST['cekPass'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<section>
		<h2>Encrypt Password</h2>
		<hr/>
		<form method="GET" action="">
			<label>Password</label>
			<input type="text" value="<?php echo $text; ?>" style="width: 500px;" name="txt">
			<button type="submit">Encrypt</button><br/><br/>
			<label>Hash</label>
			<input type="text" value="<?php echo @$enkrip;?>" style="width: 500px;" name="">
		</form>
	</section>
	<section>
		<h2>Cek Password</h2>
		<hr/>
		<form method="GET" action="">
			<label>Hash</label>
			<input type="text" value="<?php echo $cekHash; ?>" style="width: 500px;" name="cekHash">
			<button type="submit">Decrypt</button><br/><br/>
			<label>Password</label>
			<input type="text" value="<?php echo @$cekPass;?>" style="width: 500px;" name="cekPass"><br/>
			<h4>Result: <?php echo cocokin($cekPass, $cekHash);?></h4>
		</form>
	</section>
</body>
</html>