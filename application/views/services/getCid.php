<div id="content" class="box">

<?php
	echo form_open('services/viewServices/show');
?>
	<table class="nostyle" style="margin-bottom:25px">
		<tr>
			<td> Client ID: </td>
			<td> <input type="text" class="input-text" name="cid" <?php if(isset($cid)) echo 'value="'.$cid.'"'; ?> /> </td>
			<td> <input type="submit" class="input-submit" value="Show" /> </td>
		</tr>
	</table>
	</form>

	<a href="<?php echo base_url('index.php/services/forgotCID'); ?>">Forgot Client ID</a> <br /> <br />

<?php
	if(isset($error)) {
		echo "<p class='msg error'>".$error."</p>\n";
		echo "</div>\n";
	}
	if(isset($close))
		echo "</div>\n";
?>