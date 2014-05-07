<div id="content" class="box">

<script type="text/javascript">
	function forgotCID()
	{
		window.open('<?php echo base_url("index.php/clientdb/forgotCID"); ?>', '_blank', 'top=100, left=100, width=1000, height=500');
	}
</script>

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
	<a onClick="forgotCID();">Forgot Client ID</a>
<?php
	if(isset($error)) {
		echo "<p class='msg error'>".$error."</p>\n";
		echo "</div>\n";
	}
	if(isset($close))
		echo "</div>\n";
?>