<div id="content" class="box">
	<fieldset>
	<legend> Team <?php echo $teamid; ?> </legend>
	<?php if(isset($msg)) echo $msg; ?>
	<table>
		<tr>
			<th>
				Team Members
			</th>
			<th>
				Clients
			</th>
		</tr>
		<tr>
			<td>
				<table class="nostyle">
					<?php 
					if(count($members) == 0)
						echo '<tr><td> No employees found! </td></tr>';					
					foreach ($members as $mem) {
						echo '<tr><td>';
						echo $mem['name'];
						echo '</td></tr>';
					}
					
					?>
				</table>
			</td>
			<td>
				<table class="nostyle">
					<?php
					if(count($clients) == 0)
						echo '<tr><td> No clients found! </td></tr>';
					foreach ($clients as $client) {
						echo '<tr><td>';
						echo $client['name'];
						echo '</td><td>';
						echo form_open('projects/removeClient/'.$teamid);
						echo "<input type='hidden' name='cid' value='".$client['cid']."' />";
						echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
						echo form_close();
						echo '</td></tr>';
					}
					if(count($non_clients) > 0) {
						echo '<tr style="height:15px;"> <td colspan="2"></td><tr>';
						echo form_open('projects/addClient/'.$teamid);
						echo '<tr  class="add-row"><td>';
						echo '<select name="cid">';
						foreach($non_clients as $mem) {
							echo '<option value="'.$mem['cid'].'">'.$mem['name'].'</option>';						
						}
						echo '</select>';
						echo "</td><td><input type='submit' value ='Add' class='image-button addsmall' />";
						echo '</td></tr>';
						echo form_close();
					}
					?>
				</table>
			</td>
		</tr>
	</table>
	</fieldset>
</div>