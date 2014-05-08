<?php
	if($result == FALSE) {
		echo '<p class="msg error"> Client ID doesn\'t exist </p>';
		echo '</div>';
	} else {
?>
<style type="text/css">
	#inward-tab tbody tr td{
		//min-width: 250px;
	}
	#subcat td {
		font-weight: bolder;	
	}	
</style>
<fieldset>
<legend> <?php echo $title; ?></legend>
<table id="inward-tab" style="margin-left: 50px;">
	<tbody>
	<?php if($page == "inward") { ?>
		<tr id="sub-cat">
			<td style="min-width: 200px;">Accounts</td>
			<td style="min-width: 200px;">Notices</td>
			<td style="min-width: 200px;">Others</td>
		</tr>
	<?php }?>
		<tr>
			<?php for($i = 0; $i < 3; $i++) { ?>
				<td style="border: 1px solid #cfcfcf;">
					<table class="nostyle">				
						 <?php foreach( $result[$i] as $doc) { 
						 	 echo '<tr><td>'.$doc[1].'</td><td>'; 
						 	 if($doc[0] > 0) {
						 	 	echo form_open('inout/remove/'.$p.'/'.$cid);
						 		echo "<input type='hidden' name='inout_id' value='".$doc[0]."' />";
								echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
								echo form_close();
								}
								echo '</td></tr>';
						 	} 
						 	echo form_open('inout/add/'.$p.'/'.$cid); ?>
						 	<tr><td>
								 	<select name="new_doc">
									 	<?php	foreach ($INOUT[$i] as $doc) {
									 	 	echo '<option value="'.$doc['id'].'">'.$doc['doc_name'].'</option>';
									 	}	?>
								 	</select>
						 		</td> <td>  <?php echo "<input type='image' src='".base_url('design/ico-done.gif')."' />";	 ?> </td>
						 	</tr>
						 	<?php echo form_close(); ?>
					 </table>
				</td>
			<?php
				if($i == 0 && $page != "inward")
					break;
			} ?>
			
		</tr>
	</tbody>
</table> 
</fieldset>
</div>

<?php } ?>