<div id="content" class="box">
<style type="text/css">

</style>
<script type="text/javascript">
	function contains(a, obj) {
	    for (var i = 0; i < a.length; i++) {
	        if (a[i].toLowerCase() === obj) {
	            return true;
	        }
	    }
	    return false;
	}
	function checkUserExists(uname) {
		uname = uname.trim().toLowerCase();

		uname_array = [<?php if(isset($unames)) echo $unames; ?>];

		if(uname == "") {
			document.getElementById('uname_msg').innerHTML = "";
		} else if(contains(uname_array,uname))	{
			document.getElementById('uname_msg').innerHTML = "<p class='msg small warning'> Sorry, that username already exists! </p>";
			document.getElementById('submit').disabled = true;
		} else {
			document.getElementById('uname_msg').innerHTML = "<p class='msg small done'> Username available! </p>";
			document.getElementById('submit').disabled = false;
		}
	}
</script>
	<fieldset>
		<?php
			if($mode == "new") {
				echo '<legend>Add user</legend>';
			} else if($mode == "edit") {
				if($page == "editDetails")
					echo '<legend>Edit Profile</legend>';
				else
					echo '<legend>Edit Employee</legend>';
			} else if($mode == "show") {
				if($page == "viewDetails")
					echo '<legend>View Profile</legend>';
				else
					echo '<legend>View Employee Details</legend>';
			} 

			function changeInput($m) {
				if($m == "show") {
					echo ' class = "input-text show-as-text" readonly  ';
				} else {
					echo ' class = "input-text" ';
				}
			}

			if(isset($msg)) echo $msg;
		?>

		<style type="text/css">
		#emp_detail_errorloc a ul {margin:0 0 0 25px !important; list-style-type:square !important;}
		#emp_detail_errorloc a ul li {padding:0 !important; background:none !important;}
		#emp_detail_errorloc a {color:red;}
		</style>
		<div id="emp_detail_errorloc" style="color:red; padding-bottom: 10px;"></div>

		<?php 
			if($page == "editDetails") {
				echo form_open('userControl/editUser/--/update',array('id'=>'emp_detail'));
			}else {
				echo form_open('admin/editUser/'.$mode.'/0/change',array('id'=>'emp_detail'));
			} ?>
		<table class="nostyle">
			<tbody>
			<?php
				if(isset($emp['eid'])) {
					echo '<input type="hidden" name="eid" value="'.$emp['eid'].'" />';
				}
			?>
			<!-- Name -->
				<tr>
					<td>Name</td> <td>: </td>
					<td> <input required="required"  <?php changeInput($mode); ?> size="40" type="text" name="name" value="<?php if($mode != "new" && isset($emp['name'])) echo $emp['name']; ?>" ></td>
				</tr>

				<!-- Gender -->
				<tr>
					<td>Gender</td> <td>: </td>
					<td>
					<?php 
					if($mode == "show" ) {
						if(isset($emp['sex']) &&$emp['sex']=='F')
							echo '&nbsp;Female';
						else
							echo '&nbsp;Male';
					} else { ?>
					<input type="radio" name="sex" value="M" <?php if( (isset($emp['sex']) &&$emp['sex']!='F') || $mode=="new") echo 'checked="checked"'; ?>>Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="sex" value="F" <?php if($mode != "new" && isset($emp['sex']) &&$emp['sex']=='F') echo 'checked="checked"'; ?> >Female
					<?php } ?>
					</td>
				</tr>

				<!-- Username -->
				<tr>
					<td>Username</td> <td>: </td>
					<td> <input required="required" <?php changeInput($mode); ?> size="40" type="text"  name="uname" <?php if($mode == "edit") echo "disabled"; ?> value="<?php if($mode != "new" && isset($emp['uname'])) echo $emp['uname']; ?>" onblur="checkUserExists(this.value);" onkeyup="checkUserExists(this.value);" onchange="checkUserExists(this.value);" ></td>
					<td id="uname_msg">
						
					</td>
				</tr>
				<tr>
					<td></td><td></td>
					
				</tr>

				<?php if($mode == "new" || (isset($emp['uname']) &&$emp['uname']!='admin')) {// you should not let admin account loose admin rights?>
				<?php if(isset($isa) && $isa) { ?>
				<!-- Is admin? -->
				<tr>
					<td>Admin Privileges</td> <td>: </td>
					<td> 
					<?php 
					if($mode == "show") {
						if(isset($emp['isadmin']) &&$emp['isadmin']=='y')
							echo "&nbsp;Yes";
						else echo "&nbsp;No";
					} else {
					?>
					<input <?php changeInput($mode); ?> size="40" type="checkbox" name="isadmin" value="y" <?php if($mode != "new" && isset($emp['isadmin']) &&$emp['isadmin']=='y') echo 'checked="checked"'; ?> >
					<?php }?>
					</td>
				</tr>
				<?php }} ?>
				<!-- Date of Birth -->
				<tr>
					<td>Date of Birth</td> <td>: </td>
					<td> <input required="required" readonly='readonly' type="text" <?php changeInput($mode); ?> size="40" placeholder="dd/mm/yyyy" name="dob" id="dob" <?php if($mode == "show") echo 'disabled="disabled" '; ?>value="<?php if($mode != "new" && isset($emp['dob'])) echo $emp['dob']; ?>" ></td>
				</tr>

				<!-- Date of Joining -->
				<tr>
					<td>Date of Joining</td> <td>: </td>
					<td> <input required="required" readonly='readonly' type="text" <?php changeInput($mode); ?> size="40" placeholder="dd/mm/yyyy" name="doj" <?php if($mode == "show") echo 'disabled="disabled" '; ?>id="doj" value="<?php if($mode != "new" && isset($emp['doj'])) echo $emp['doj']; ?>" ></td>
				</tr>

				<!-- Qualification -->
				<tr>
					<td>Qualification</td> <td>: </td>
					<td> <input required="required" <?php changeInput($mode); ?> size="40" type="text" name="quali" value="<?php if($mode != "new" && isset($emp['qualification'])) echo $emp['qualification']; ?>" ></td>
				</tr>

				<!-- Salary -->
				<?php if(isset($isa) && $isa) { ?>
				<tr>
					<td>Salary</td> <td>: </td>
					<td> <input <?php changeInput($mode); ?> size="40" type="text" name="sal" value="<?php if($mode != "new" && isset($emp['sal_structure'])) echo $emp['sal_structure']; ?>" ></td>
				</tr>

				<!-- Leaves -->
				<tr>
					<td>Leaves</td> <td>: </td>
					<td> <input <?php changeInput($mode); ?> size="40" type="text" name="leaves" value="<?php if($mode != "new" && isset($emp['leaves'])) echo $emp['leaves']; ?>" ></td>
				</tr>
				<?php } ?>
				<!-- Contact No. -->
				<tr>
					<td>Email</td> <td>: </td>
					<td> <input required="required" <?php changeInput($mode); ?> size="40" type="email" name="email" value="<?php if($mode != "new" && isset($emp['email'])) echo $emp['email']; ?>" ></td>
				</tr>

				<!-- Contact No. -->
				<tr>
					<td>Contact No.</td> <td>: </td>
					<td> <input required="required" <?php changeInput($mode); ?> size="40" type="text" name="contact" value="<?php if($mode != "new" && isset($emp['contact'])) echo $emp['contact']; ?>" ></td>
				</tr>

				<!-- Emergency Contact No. -->
				<tr>
					<td>Emergency Contact No.</td> <td>: </td>
					<td> <input <?php changeInput($mode); ?> size="40" type="text" name="em_contact" value="<?php if($mode != "new" && isset($emp['em_contact'])) echo $emp['em_contact']; ?>" ></td>
				</tr>

				<!-- Address -->
				<tr>
					<td class="va-top">Address</td> <td class="va-top">: </td>
					<td> <textarea <?php changeInput($mode); ?> cols="43" rows="6" name="addr" ><?php if($mode != "new" && isset($emp['addr_gn'])) echo $emp['addr_gn']; ?></textarea></td>
				</tr>

				<!-- State -->
				<tr>
					<td>State</td> <td>: </td>
					<td> <input <?php changeInput($mode); ?> size="40" type="text" name="state" value="<?php if($mode != "new" && isset($emp['state'])) echo $emp['state']; ?>" ></td>
				</tr>

				<!-- PIN -->
				<tr>
					<td>PIN</td> <td>: </td>
					<td> <input <?php changeInput($mode); ?> size="40" type="text" name="pin" value="<?php if($mode != "new" && isset($emp['pin'])) echo $emp['pin']; ?>" ></td>
				</tr>

				<!-- Submit -->
				<tr>
					<td></td> <td></td>
					<td> 
					<?php if($mode != "show") { ?>
						<input class="image-button save" size="40" type="submit" name="save" value="SAVE" id="submit">
					<?php } else if($mode == "show" && ($this->session->userdata['isa'] == 'y') || $this->session->userdata['uname'] == $emp['uname']) {
								echo form_close();
								if($this->session->userdata['isa'] == 'y' && $this->session->userdata['uname'] != $emp['uname'])
									echo form_open('admin/editUser/edit/'.$emp["eid"]);
								else
									echo form_open('userControl/editUser');

						?>						 
						 			<input class="image-button edit" value="EDIT" type="submit" />
							<?php 
							echo form_close();
						} 
							?>
					</td>
				</tr>
			</tbody>
		</table>
		<?php echo form_close(); ?>
	</fieldset>	
	<!-- VALIDATION -->
	<script type="text/javascript">
		var frmValidator = new Validator("emp_detail");

		frmValidator.EnableOnPageErrorDisplaySingleBox();
		frmValidator.EnableMsgsTogether();

		frmValidator.addValidation("name","maxlen=50","Name can't exceed 50 characters");
		frmValidator.addValidation("name","regexp=^[a-zA-Z\ \.]*$","Invalid name");

		frmValidator.addValidation("uname","minlen=4","Username should be atleast 4 characters long");
		frmValidator.addValidation("uname","maxlen=30","Username should not exceed 30 characters long");
		frmValidator.addValidation("uname","alnum","Username should contain alphabets and numericals only");

		frmValidator.addValidation("pin","num","Please enter a valid PIN Code");

	</script>

	<link rel="stylesheet" href="<?php echo base_url('css/jquery.datepick.css'); ?>" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.plugin.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.datepick.js'); ?>"></script>
    <script type="text/javascript">
    		$(function() {
				$('#dob').datepick({dateFormat: 'dd/mm/yyyy'});
				$('#doj').datepick({dateFormat: 'dd/mm/yyyy'});
			});
    		</script>
</div>
