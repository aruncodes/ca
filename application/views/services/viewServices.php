<div id='content' align="center">

<style type="text/css">
	table tr td {
		min-width: 250px;
		text-align: center;
		height: 25px;
	}
	select {
		height: 25px;
	}
</style>

<table>
	<tbody>
	<h3><?php echo "Client ID : ".$cid; ?></h3>
	<?php
		if(isset($services['numrows'])) {
			echo "No services currently";
		}
		else {
			foreach($services as $service) {
				echo "<tr>\n";
					echo "<td>".$service['service']."</td>\n";
					echo "<td>\n";
						echo form_open("services/remService/".$cid);
							echo "<input type='hidden' name='sname' value='".$service['service']."' />";
							echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
						echo "</form>";
					echo "</td>\n";
				echo "</tr>\n";
			}
		}
	?>
	</tbody>
</table>

<br /><br />

<?php echo form_open('services/viewServices/add'); ?>
	<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
	<select name="service">
	<?php
		foreach($serviceNames as $sname) {
			echo "<option>".$sname."</option>";
		}
	?>
	</select>
	<input type="submit" value="Add" class="input-submit"/>
</form>

</div>