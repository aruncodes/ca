<div id="content" class="box">
<style type="text/css">
	input.image-button{    
	    padding-left: 16px;
	    height: 25px;
	    margin:2px;
	}
	input.del {
		background: #cfcfcf url('<?php echo base_url("design/ico-delete.gif") ?>') no-repeat top left;
		width:75px;	
	}
	input.makeadmin {
		background: #cfcfcf url('<?php echo base_url("design/ico-done.gif") ?>') no-repeat top left;
		width:100px;	
	}
	input.warn {
		background: #cfcfcf url('<?php echo base_url("design/ico-warning.gif") ?>') no-repeat top left;
		width:110px;	
	}
	input.edit {
		background: #cfcfcf url('<?php echo base_url("design/ico-edit.gif") ?>') no-repeat top left;
		width:75px;	
	}
</style>
	<fieldset>
		<legend>Employee Management</legend>
		<?php if(isset($msg)) echo $msg;
			if(count($emps) == 0) {
				echo '<p class="msg warning"> No employees found! </p>';
		} else { ?>
		<table>
			<tbody>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Username</th>
					<th>Privilege</th>
					<th>Salary structure</th>
					<th>Leaves</th>
					<th>Contact</th>
					<th>Emergency Contact</th>
					<th>Actions</th>
				</tr>
				<?php foreach ($emps as $emp) {
					echo '<tr>';
					echo '<td>'.$emp['eid'].'</td>';
					echo '<td>'.$emp['name'].'</td>';
					$gender = 'Male';
					if($emp['sex'] == 'f') $gender = 'Female';
					echo '<td>'.$gender.'</td>';
					echo '<td>'.$emp['uname'].'</td>';
					
					$previlge = 'Normal';
					if($emp['isadmin'] == 'y') $previlge = 'Admin';
					echo '<td>'.$previlge.'';

					if($emp['isadmin'] != 'y' ) {
						echo form_open('admin/makeAdmin');
						echo form_hidden('eid',$emp['eid']);
						echo "<input type='submit' value='Make Admin' class='image-button makeadmin'/>";					
						echo form_close();
					} else if($emp['isadmin'] == 'y' && $emp['uname'] != 'admin'){
						echo form_open('admin/removeAdmin');
						echo form_hidden('eid',$emp['eid']);
						echo "<input type='submit' value='Remove Admin' class='image-button warn'/>";					
						echo form_close();
					}
					echo '</td>';
					echo '<td>'.$emp['sal_structure'].'</td>';
					echo '<td>'.$emp['leaves'].'</td>';
					echo '<td>'.$emp['contact'].'</td>';
					echo '<td>'.$emp['em_contact'].'</td>';
					
					echo '<td>';
					$attrib = array('onsubmit'=>"return confirm('Do you really want to remove this employee?');");
					echo form_open('admin/removeEmployee',$attrib);
					echo form_hidden('eid',$emp['eid']);
					echo "<input type='submit' value='Delete' class='image-button del'/>";					
					echo form_close();

					echo form_open('admin/editUser/'.$emp['eid']);
					//echo form_hidden('eid',$emp['eid']);
					echo "<input type='submit' value='Edit' class='image-button edit'/>";					
					echo form_close();

					
					echo '</td>';

					echo '</tr>';
				} ?>
			</tbody>
		</table>
		<?php } ?>
	</fieldset>
</div>
