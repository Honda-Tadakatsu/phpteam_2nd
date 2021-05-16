<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>購入履歴画面</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <header>
        ヘッダー
    </header>
    <?php require 'menu.php'; ?>

    <div class="history_main">
        <div class="box">
            <div class="history_box">
            <div class="history_h1">
                <h1>購入履歴</h1>
            </div>

            <?php
            //ログインの確認
            if (isset($_SESSION['customer'])) {
                //DBに接続
                require 'db_connect.php';

                $sql = "SELECT purchase_id,name,count,price,product_id
				 from purchase as P
				 inner join purchase_detail as D 
					 ON P.id = D.purchase_id 
				 	 AND customer_id = :customer_id
				 JOIN product AS PR
				 ON PR.id = D.product_id;
				 ";
                // $stm -> bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_INT);
                // $stm->bindValue(':id',$purchase_id,PDO::PARAM_STR);
                // $stm -> bindValue(':purchase_id', $_SESSION['purchase_id'],PDO::PARAM_INT);
                // $stm -> bindValue(':product_id',$_SESSION['product_id'],PDO::PARAM_INT);
                $result = $stm->execute();
                if (is_null($result)) {
                    print "購入履歴がありません。";
                } else {
                    $array = [];
                    foreach ($stm as $row) {
                        $array[$row['purchase_id']][] = [
                            'name' => $row['name'],
                            'product_id' => $row['product_id'],
                            'price' => $row['price'],
                            'subtotal' => $row['price'],
                        ];
                    }
                }
            ?>
                <?php
                foreach ($array as $key => $val) :
                    $total = 0;
                    $color = $key % 2 == 0; ?>
                    <table>
                        <tr>
                            <th>日付ireru </th>
                            <th>商品名</th>
                            <th>小計</th>
                        </tr>
                        <hr>
                        <?php foreach ($val as $listVal) : ?>
                            <tr>
                                <td></td>
                                <td><a href="detail.php?id=<?= $listVal['product_id'] ?>"><?= $listVal['name'] ?></a></td>
                                <td>￥<?= $listVal['subtotal'] ?></td>
                            <?php $total += $listVal['subtotal'];
                        endforeach; ?>
                            <tr>
                                <th>合計金額</th>
                                <th></th>
                                <td>￥<?= $total ?></td>
                            </tr>
                    </table>
                <?php endforeach;
            } else {
                ?>
                購入履歴を表示するには、ログインしてください。
            <?php
            }
            ?>
            </div>
        </div>
    </div>
    <footer>
        @footer
    </footer>


</body>

</html>