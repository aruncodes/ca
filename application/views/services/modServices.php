<div id="content">
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
			foreach($serviceNames as $sname) {
				echo "<option>".$sname."</option>";
			}
		?>
		</select>
		</td>
		<td><input type="submit" class="input-submit" value="Delete" /></td>
	</tr>
	</table>
</fieldset>
</form>
</div>