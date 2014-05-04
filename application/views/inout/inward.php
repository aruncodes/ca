<div id="content" class="box">
<h5 class="tit"> <?php echo $title; ?> </h5>
<?php 
	if($page == "inward")
		echo form_open('inout/show/in'); 
	else 
		echo form_open('inout/show/out'); 
	?>
	<table class="nostyle" style="margin-bottom:25px;">
		<tr>
			<td> Client ID: </td>
			<td> <input type="text" class="input-text" name="cid" <?php if(isset($cid)) echo 'value="'.$cid.'"'; ?> /> </td>
			<td> <input type="submit" class="input-submit" value="Show" /> </td>
		</tr>
	</table>
	<?php echo form_close(); ?>
<?php if($page_end==TRUE)  echo '</div>'; ?>

