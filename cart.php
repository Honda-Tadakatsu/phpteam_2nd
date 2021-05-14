<?php
if (!empty($_SESSION['product'])) {
?>
	<table>
		<th>商品名</th>
		<th>価格</th>
		<th>小計</th>
		<?php
		$total = 0;
		foreach ($_SESSION['product'] as $id => $product) {
		?>
			<tr>
				<td><a href="detail.php?id=<?= $id ?>"><?= $product['name'] ?></a></td>
				<td><?= $product['price'] ?></td>
				<?php
				$subtotal = $product['price'];
				$total += $subtotal;
				?>
				<td><?= $subtotal ?></td>
				<td><a href="cart_delete.php?id=<?= $id ?>">削除</a></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>合計</td>
			<td></td>
			<td><?= $total ?></td>
			<td></td>
		</tr>
	</table>
<?php
} else {
?>
	カートに商品がありません。
<?php
}
?>