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
						echo '</td><td>';
						echo form_open('admin/removeMember/'.$teamid);
						echo "<input type='hidden' name='eid' value='".$mem['eid']."' />";
						echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
						echo form_close();
						echo '</td></tr>';
					}
					if(count($non_members) > 0) {
						echo form_open('admin/addMember/'.$teamid);
						echo '<tr><td>';
						echo '<select name="eid">';
						foreach($non_members as $mem) {
							echo '<option value="'.$mem['eid'].'">'.$mem['name'].'</option>';						
						}
						echo '</select>';
						echo "</td><td><input type='image' src='".base_url('design/ico-done.gif')."' />";
						echo '</td></tr>';
						echo form_close();
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
						echo form_open('admin/removeClient/'.$teamid);
						echo "<input type='hidden' name='cid' value='".$client['cid']."' />";
						echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
						echo form_close();
						echo '</td></tr>';
					}
					if(count($non_clients) > 0) {
						echo form_open('admin/addClient/'.$teamid);
						echo '<tr><td>';
						echo '<select name="cid">';
						foreach($non_clients as $mem) {
							echo '<option value="'.$mem['cid'].'">'.$mem['name'].'</option>';						
						}
						echo '</select>';
						echo "</td><td><input type='image' src='".base_url('design/ico-done.gif')."' />";
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