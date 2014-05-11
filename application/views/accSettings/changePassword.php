<div id='content'>

<script type="text/javascript">
	function checkIfSame()
	{
		var current = document.getElementById('pass').value;
		var confirm = document.getElementById('confirm').value;
		if(current == confirm) {
			document.getElementById('confirmMsg').innerHTML = "Passwords match";
			document.getElementById('confirmMsg').style.color = "green";
		}
		else {
			document.getElementById('confirmMsg').innerHTML = "Passwords do not match";
			document.getElementById('confirmMsg').style.color = "red";
		}
	}
</script>

<?php echo form_open('userControl/changePassword'); ?>
<fieldset>
<legend>Change Password</legend>
<table class = "nostyle">
	<tr>
		<td>Enter current password : </td>
		<td><input type="password" name="currentPassword" required='required' class = "input-text"/></td>
	</tr>
	<tr>
		<td>Enter new password : </td>
		<td><input type="password" id = "pass" name="newPassword" required='required' class = "input-text"/></td>
	</tr>
	<tr>
		<td>Confirm new password : </td>
		<td><input type="password" id="confirm" onkeyup="checkIfSame();" required='required' class = "input-text"/></td>
	</tr>
	<tr>
		<td></td>
		<td><p id="confirmMsg"></p></td>
	</tr>
	<tr>
		<td></td>
		<td style="text-align: right;"><input type='submit' class='input-submit' /></td>
	</tr>
</table>
</fieldset>
</form>
<?php
	if(isset($msg))
		echo "<p class = '$style'>$msg</p>\n";
?>

</div>