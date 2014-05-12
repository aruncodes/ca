<div id="kopp">

<style type="text/css">
	#kopp table tr td{
		text-align: center;
		height: 25px;
	}
	select {
		height: 30px;
	}
	legend {
		text-align:left;
	}
	#kopp {
		text-align: center;
	}
</style>

<fieldset>
<legend>View Services</legend>
<h3><?php echo "Client ID : ".$cid; ?></h3>
<table style="margin: 0px auto;">
	<?php
		if(isset($services['numrows'])) {
			echo "No services currently";
		}
		else {
			echo '<thead>
				<tr>
				<th>Service</th>
				<th>Del</th>
				</tr>
				</thead>';
			echo "\n<tbody>\n";
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
			echo "</tbody>\n";
		}
	?>
</table>

<br /><br />

<?php echo form_open('services/viewServices/add'); ?>
	<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
	<select name="service">
	<?php
		$flag = count($serviceNames);
		if($flag == 0) {
			echo "<option> --empty-- </option>\n";
		} else {
			foreach($serviceNames as $sname) {
				echo "<option>".$sname."</option>\n";
			}
		}
	?>
	</select>
	<input type="submit" value="Add" class="image-button addsmall" <?php if($flag == 0) echo "disabled='disabled' "; ?>/>
</form>

</fieldset>
</div>
</div>