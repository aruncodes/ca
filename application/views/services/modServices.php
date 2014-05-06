<div id="content">

<style type="text/css">
	select {
		height: 30px;
	}
</style>

<?php
	if(!isset($style))
		$style = "msg done";
	if(isset($msg)) {
		echo "<p class='".$style."'>".$msg."</p>";
	}
?>

<?php echo form_open('services/modServices/addService'); ?>
<fieldset>
<legend>Add new Service Category</legend>
<table class="nostyle">
	<tr>
		<td>Service Name: </td>
		<td><input type="text" class="input-text" name="sname" /></td>
		<td><input type="submit" class="input-submit" value="Add" /></td>
	</tr>
</table>
</fieldset>
</form>

<?php echo form_open('services/modServices/remService'); ?>
<fieldset>
	<legend>Delete a Service Category</legend>
	<table class="nostyle">
	<tr>
		<td>
		<select name="sname">
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
		</td>
		<td><input type="submit" class="input-submit" value="Delete" <?php if($flag == 0) echo "disabled='disabled' "; ?>/></td>
	</tr>
	</table>
</fieldset>
</form>
</div>