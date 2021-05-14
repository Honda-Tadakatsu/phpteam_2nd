
<?php
if (isset($_SESSION['customer'])) {
?>

		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//SQL文を作る（プレースホルダを使った式）
		$sql = "select * from favorite, product where customer_id = :customer_id and product_id = id";
		//プリペアードステートメントを作る
		$stm = $pdo->prepare($sql);
		//プリペアードステートメントに値をバインドする
		$stm->bindValue(':customer_id', $_SESSION['customer']['id'], PDO::PARAM_STR);
		//SQL文を実行する
		$stm->execute();
		//結果の取得（連想配列で受け取る）
		$result = $stm->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
			$id = $row['id'];
		?>
			<dl>
				<dt><a href="detail.php?id=<?= $id ?>"><?= $row['name'] ?></a></dt>
				<dt><?= $row['price'] ?></dt>
				<dt><input type="submit" onclick="location.href='favorite_delete.php?id=<?= $id ?>'" value="削除"></dt>
				<hr>
			</dl>
		<?php
		}
		?>
	</table>
<?php
} else {
?>
	お気に入りを表示するには、ログインしてください。
<?php
}
?>