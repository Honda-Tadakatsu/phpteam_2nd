<?php
if (!empty($_SESSION['product'])) {
?>
    <?php
    $total = 0;
    foreach ($_SESSION['product'] as $id => $product) {
    ?>
    <div class="content_list">
        <dl>
            <div class="content_inner">
            <img src="" alt="">
                <div class="name" >
                    <dt><a href="detail.php?id=<?= $id ?>"><?= $product['name'] ?></a></dt>
                </div>
                <div class="price">
                    <dt>￥<?= $product['price'] ?></dt>
                    <?php
                    $subtotal = $product['price'];
                    $total += $subtotal;
                    ?>
                </div>
                <div class="delete_button">
                     <input type="submit" onclick="location.href='cart_delete.php?id=<?= $id ?>'" value="削除">
                </div>
            </div>
        </dl>
        <hr>
    </div>
    <?php
    }
    ?>
    <dt>合計 ￥<?= $total ?></dt>
    <hr>
    <div class="button">
        <i>|</i>
        <a href="">戻る</a>
        <i>|</i>
        <a href="purchase_output.php">注文確認</a>
        <i>|</i>

    </div>
<?php
} else {
?>
    カートに商品がありません。
<?php
}
?>