<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>お気に入り画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require 'menu.php'; ?>

    <div>
        <h1>お気に入り</h1>
    </div>
    
    <?php
    require 'favorite.php';
    ?>
</body>

</html>