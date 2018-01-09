<?=$msg?>
<form action="save.php" method="post">
	<table summary="送信フォーム">
	<tr>
		<th>名前</th>
		<td><?if($name){?><?=$name?><?}else{?><input type="text" name="name" style="width:100%" /><?}?></td>
	</tr>
	<tr>
		<th>文章</th><td><input type="text" name="text" style="width:100%" /></td>
	</tr>
	</table>

	<input type="hidden" name="action" value="1" />
	<p><input type="submit" value="送信" class="button" /></p>
</form>

<table summary="チャット">
<tr><th style="width:100px">名前</th><th style="width:180px">投稿日時</th><th>文章</th></tr>
<tbody id="board">
<?foreach($_chat as $val){?>
<tr>
	<td><?=htmlspecialchars($val["name"])?></td>
	<td><?=$val["date"]?></td>
	<td><?=htmlspecialchars($val["text"])?></td>
</tr>
<?}?>
</tbody>
</table>
