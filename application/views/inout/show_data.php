<?php
	if($result == FALSE) {
		echo '<p class="msg error"> Client ID doesn\'t exist </p>';
		echo '</div>';
	} else {
?>
<fieldset>
<legend> <?php echo $title; ?></legend>
<table style="margin-left: 50px; border:10px solid #ffffff">
	<tbody>
	<?php if($page == "inward") { 
		$tit[0] = "Account";
		$tit[1] = "Notice";
		$tit[2] = "Other";
		} else
		$tit[0] = "Outward";
			?>
		<tr>
			<?php for($i = 0; $i < 3; $i++) { ?>
				<td style="border: 1px solid #cfcfcf;">
					<table >	
					<tr><th><?php echo $tit[$i]; ?> Documents</th><th>Del</th></tr>			
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