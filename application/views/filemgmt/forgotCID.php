<div id = "content">
<?php echo form_open('filemgmt/forgotCID');
?>
	
<table class="nostyle" style="margin-bottom: 25px;">

		<tbody><tr>
			<td style="font-size: 1.2em;"> Enter PAN No: </td>
			<td> <input class="input-text" id="enterPAN" name="pan" type="text" <?php if(isset($pan)) echo 'value="'.$pan.'" '; ?>/></td>
			<td> <input class="input-submit" id="findCID" value="Find Client ID" type="submit"> </td>
		</tr>
	</tbody>
</table>

<style type="text/css">
	#content {
		text-align: center;
	}
}
</style>
	
	<?php
		echo "<br /><br />\n";
		if(isset($error))
			echo "<p style='text-align:left;' class='msg error'>PAN Number not found.</p>\n";
		else if(isset($cids)) {
			echo "<table style='margin:0px auto' border='1'>\n";
			echo '<thead>
				<th>Client ID</th>
				<th>Client Name</th>
				<th>Company Name</th>
			</thead>
			';
			foreach($cids as $cid) {
				$retAddr = base_url("index.php/filemgmt/setSession")."/".$cid['cid'];
				echo "<tr>\n";
					echo "<td><a href='$retAddr'>".$cid['cid']."</a></td>";
					echo "<td>".$cid['name']."</td>";
					echo "<td>".$cid['cmpname']."</td>";
				echo "</tr>\n";
			}
			echo "</table>\n";
		}
	?>
</div>