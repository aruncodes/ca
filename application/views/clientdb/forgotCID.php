<div id = "content">
<?php echo form_open('clientdb/forgotCID/show');
?>
	
<table style='margin:0px auto' class="nostyle" style="margin-bottom: 25px;">

		<tbody><tr>
			<td style="font-size: 1.2em;"> Enter PAN No: </td>
			<td> <input class="input-text" name="pan" type="text" <?php if(isset($pan)) echo 'value="'.$pan.'" '; ?>/></td>
			<td> <input class="input-submit" value="Find Client ID" type="submit"> </td>
		</tr>
	</tbody>
</table>

<style type="text/css">
	body {
		text-align: center;
	}
</style>
	
	<?php
		echo "<br /><br /><br /><br />\n";
		if(isset($error))
			echo "Not found.\n";
		else if(isset($cids)) {
			echo "<table style='margin:0px auto' border='1'>\n";
			echo '<thead>
				<th>Client ID</th>
				<th>Client Name</th>
				<th>Company Name</th>
			</thead>
			';
			foreach($cids as $cid) {
				echo "<tr>\n";
					echo "<td>".$cid['cid']."</td>";
					echo "<td>".$cid['name']."</td>";
					echo "<td>".$cid['cmpname']."</td>";
				echo "</tr>\n";
			}
			echo "</table>\n";
		}
	?>
</div>
</body>
</html>