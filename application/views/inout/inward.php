<div id="content" class="box">

<script type="text/javascript">
	function printDocs(cid)
	{
		window.open('<?php echo base_url("index.php/inout/printDocs"); ?>/'+cid, '_blank', 'top=100, left=100, width=1000, height=500');
	}
</script>

<?php 
	if($page == "inward")
		echo form_open('inout/show/in'); 
	else if($page == "outward")
		echo form_open('inout/show/out');
	?>
	<table class="nostyle" style="margin-bottom:25px;">
		<tr>
			<td> Client ID: </td>
			<td> <input type="text" class="input-text" name="cid" <?php if(isset($cid)) echo 'value="'.$cid.'"'; ?> /> </td>
			<td> <input type="submit" class="input-submit" value="Show" /> </td>
			<td>
			<?php if(isset($cid))
				echo "<input type='button' value='Print Documents' class='input-submit' onClick='printDocs($cid);' />\n";
			?>
			</td>
		</tr>
	</table>
	<?php echo form_close(); ?>
	<a href="<?php echo base_url('index.php/inout/forgotCID').'/'.$page; ?>">Forgot Client ID</a> <br /> <br />

<?php if($page_end==TRUE)  echo '</div>'; ?>
