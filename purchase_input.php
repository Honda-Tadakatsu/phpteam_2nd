<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	
	<?php require 'menu.php'; ?>
	<?php
	// ログインの確認
		if(!isset($_SESSION['customer'])){
			print "購入手続きを行うにはログインをしてください。";
		}else if(empty($_SESSION['product'])){//買い物かごが空
			print "カートに商品がありません。";
		}else{//正常処理
	?>
	
	<p>名前:<?= $_SESSION['customer']['name']?></p>
	<p>住所:<?= $_SESSION['customer']['address']?></p>
	<hr>	

	<?php require 'cart_.php'; ?>

	<?php
	}
	?>
</body>

</html>