<div id="content" class="box">
	<fieldset>
		<legend>Add New Team</legend>
		<?php
		if(count($non_members) == 0) {
			echo '<p class="msg warning"> No employees available to form new team! </p>';
		} else { ?>
		<table>
		<tr>
			<th>Employee</th>
			<th>Team Number</th>
			<th>Add</th>
		</tr>
		<tr>
		<?php		
			echo form_open('admin/addMember/-');		
			echo '<td><select name="eid">';
			foreach($non_members as $mem) {
				echo '<option value="'.$mem['eid'].'">'.$mem['name'].'</option>';						
			}
			echo '</select></td><td>';
			echo '<input type="text" required="required" rows=3 name="team_id" placeholder="Team Name" />';
			echo "</td><td><input type='submit' value ='Add' class='image-button addsmall' />";
			echo form_close();
		}
		?>
		</td>
		</tr>
		</table>
	</fieldset>	
</div>
