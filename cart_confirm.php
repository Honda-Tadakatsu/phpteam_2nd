<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入画面</title>
</head>

<body>

    <?php
    if (!isset($_SESSION['customer'])) {
        print "購入手続きを行うにはログインをしてください。";
    } else if (empty($_SESSION['product'])) {
        print "カートに商品がありません。";
    } else {
    ?>
        <input type="button" onclick="location.href='cart.html'" value="戻る">
        <input type="button" onclick="location.href='cart_kakutei.html'" value="確定">
    <?php
    }
    ?>
</body>

</html>