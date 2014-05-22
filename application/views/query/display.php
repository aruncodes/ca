<html>
<head><title>Table : <?php echo $table; ?></title></head>

<body style="text-align:center">
<h2>Table : <?php echo $table; ?></h2>

<style type="text/css">
td,th {
	border: 1px solid black;
}
</style>

<table style="border: 1px solid black; margin: auto">
<?php
	if(isset($rows[0])) {
		echo "<tr>\n";
		foreach ($rows[0] as $key => $value) {
			echo "<th>$key</th>\n";
		}
		echo "</tr>\n";
	} else { ?>
		<tr>
			<td>No rows present.</td>
		</tr>
	<?php }

	foreach ($rows as $row) {
		echo "<tr>\n";
		foreach ($row as $value)
			echo "<td>$value</td>\n";
		echo "</tr>\n";
	}
?>
</table>

</body>
</html>