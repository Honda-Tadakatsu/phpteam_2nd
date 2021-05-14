<?php
if (!empty($_SESSION['product'])) {
?>
    <div class="book1">
        <?php
        $total = 0;
        foreach ($_SESSION['product'] as $id => $product) {
        ?>
            <dl class="content__confirm__list">
                <img src="1.png" alt="" width="150px" height="150px">
                <dt><a href="detail.php?id=<?= $id ?>"><?= $product['name'] ?></a></dt>
                <dt>￥<?= $product['price'] ?></dt>
                <?php
                $subtotal = $product['price'];
                $total += $subtotal;
                ?>

                <input type="submit" onclick="location.href='cart_delete.php?id=<?= $id ?>'" value="削除">
                <br>
                <hr>
            </dl>
        <?php
        }
        ?>
        <dt>合計 ￥<?= $total ?></dt>
        <hr>
    </div>

    <input type="button" onclick="location.href=''" value="戻る">
    <input type="button" onclick="location.href='purchase_input.php'" value="注文確認">
    </div>
<?php
} else {
?>
    カートに商品がありません。
<?php
}
?>