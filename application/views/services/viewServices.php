<div id="kopp">

<style type="text/css">
	#kopp table tr td{
		text-align: center;
		height: 25px;
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
	<thead>
	<tr>
		<th>Service</th>
		<th>Del</th>
	</tr>
	</thead>

	<tbody>
	<?php
	if(isset($services['numrows'])) {
		?>
		<tr>
		<td>---</td><td></td>
		</tr>
		<?php
	} else {
		foreach($services as $service) {
			?><tr>
			<td><?php echo $service['service']; ?></td>
			<td>
			<?php echo form_open("services/remService/".$cid); ?>
				<input type="hidden" name="sname" value="<?php echo $service['service']; ?>" />
				<input type="image" src="<?php echo base_url('design/ico-delete.gif'); ?>" />
			</form>
			</td>
			</tr>
		<?php
		}
	} ?>

	<tr style="height:30px;"><td colspan="2"></td></tr>
	<tr class="add-row"> <?php echo form_open('services/viewServices/add'); ?>
	
	<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
	<td><select name="service">
<?php
		$flag = count($serviceNames);
		if($flag == 0) {
			echo "<option> --empty-- </option>\n";
		} else {
			foreach($serviceNames as $sname)
				echo "<option>".$sname."</option>\n";
		}
?>
 	</select> </td>
	<td><input type="submit" value="Add" class="image-button addsmall" <?php if($flag == 0) echo "disabled='disabled' "; ?>/></td>
	</form>	</tr>
	</tbody>
</table>

<br /><br />
</fieldset>
</div>
</div>