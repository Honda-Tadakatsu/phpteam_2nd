<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>買い物かご画面</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'menu.php'; ?>

    <div class="main">
        <div class="titl">
            <h1>カート</h1>
        </div>

        <div>
            <?php require 'cart_.php'; ?>
        </div>
        
    </div>

    
</body>

</html>