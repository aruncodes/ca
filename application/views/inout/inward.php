<div id="content" class="box">
<?php 
	if($page == "inward")
		echo form_open('inout/show/in'); 
	else 
		echo form_open('inout/show/out'); 
	?>
	<table class="nostyle">
		<tr>
			<td> Client ID: </td>
			<td> <input type="text" name="cid" <?php if(isset($cid)) echo 'value="'.$cid.'"'; ?> /> </td>
			<td> <input type="submit" value="Show" /> </td>
		</tr>
	</table>
	</form>
	<?php if($page_end==TRUE)  echo '</div>'; ?>

