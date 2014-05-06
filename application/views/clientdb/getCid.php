<div id="content" class="box">
<?php
	echo form_open('clientdb/existingClient/show');
?>
	<table class="nostyle" style="margin-bottom:25px;">
		<tr>
			<td> Client ID: </td>
			<td> <input id="getCidBox" type="text" class="input-text" name="cid" <?php if(isset($cid)) echo 'value="'.$cid.'"'; ?> /> </td>
			<td> <input id="getCidBut" type="submit" class="input-submit" value="Show" /> </td>
		</tr>
	</table>
	</form>
<?php
	if(isset($error)) {
		echo "<p class='msg error'>".$error."</p>\n";
		echo "</div>\n";
	}
	if(isset($close))
		echo "</div>\n";
?>