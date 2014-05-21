<?php
	if(isset($new) || isset($success))
		echo "<div id='content'>";
	if(isset($success))
		echo "<p class='msg done'>".$success."</p>";
	?>
	
	<style type="text/css">
		#addClient_errorloc a ul {margin:0 0 0 25px !important; list-style-type:square !important;}
		#addClient_errorloc a ul li {padding:0 !important; background:none !important;}
		#addClient_errorloc a {color:red;}
	</style>
	<div id="addClient_errorloc" style="color:red; padding-bottom: 10px;"></div>
	
	<?php
	if(isset($new))
		echo form_open('clientdb/addClient/add', array('id'=>"addClient"));
	else
		echo form_open('clientdb/addClient/modify', array('id'=>"addClient"));
?>

<!-- Function - check if equal and echo attrib -->	
<?php
	function giveAttrib($val1, $val2, $attrib)
	{
		if($val1 == $val2)
			echo $attrib;
	}
?>
	<fieldset> <!-- DONT REMOVE THIS FIELDSET, JS depends on it -->
		<?php
		if(isset($new))
			echo "<legend>Add a new Client</legend>\n";
		else
			echo "<legend>Client Details</legend>\n";
		?>
		
		<table class="nostyle">
		<tbody>

			
			<!-- NAME -->
			<tr>
				<td>Name of the personnel</td><td>:</td>
				<td><input type="text" size="40" name="name" class="input-text" value="<?php if(isset($name)) echo $name; ?>"></td>
			</tr>
			
			<!-- Father's NAME -->
			<tr>
				<td>Father's name</td><td>:</td>
				<td><input type="text" size="40" name="fatname" class="input-text" value="<?php if(isset($fatname)) echo $fatname; ?>"></td>
			</tr>
		

			<!-- Gender -->
			<tr>
				<td>Gender</td><td>:</td>
				<td>
					<div id="genderDiv">
					</div>
				</td>
			</tr>


			<!-- Date of Birth -->
			<tr>
				<td>DOB</td><td>:</td>
				<td>
				<input name="dob" id="dob" type="text" placeholder='dd/mm/yyyy' readonly='readonly' value="<?php if(isset($dob)) echo $dob; ?>" />
				</td>

			</tr>

			
			<!-- Company Name -->
			<tr>
				<td>Company name</td><td>:</td>
				<td><input type="text" size="40" name="cmpname" class="input-text" value="<?php if(isset($cmpname)) echo $cmpname; ?>" /></td>
			</tr>



			<!-- Client ID -->
			<tr>
				<td>Client ID</td><td>:</td>
				<td><?php echo $cid; ?></td>
				<?php echo form_hidden('cid',$cid); ?>
			</tr>


			<!-- Legal Structure - Category 1 -->
			<tr>
				<td>Legal Structure</td><td>:</td>
				<td>
					<select name="status_cat1">
						<option value="--" <?php if(!isset($status_cat1)) giveAttrib("000","000", "selected='selected'"); ?>>---</option>
						<option value="LB" <?php if(isset($status_cat1)) giveAttrib("LB",$status_cat1,"selected='selected'"); ?>>LLB</option>
						<option value="FM" <?php if(isset($status_cat1)) giveAttrib("FM",$status_cat1,"selected='selected'"); ?>>Firm</option>
						<option value="CO" <?php if(isset($status_cat1)) giveAttrib("CO",$status_cat1,"selected='selected'"); ?>>Company</option>
						<option value="IL" <?php if(isset($status_cat1)) giveAttrib("IL",$status_cat1,"selected='selected'"); ?>>Individual</option>
						<option value="TR" <?php if(isset($status_cat1)) giveAttrib("TR",$status_cat1,"selected='selected'"); ?>>Trust</option>
					</select>
				</td>
			</tr>




			<!-- Business Category - Category 2 -->
			<tr>
				<td>Business Category</td><td>:</td>
				<td>
					<select name="bus_cat2">
						<option value="--" <?php if(!isset($bus_cat2)) giveAttrib("000","000", "selected='selected'"); ?>>---</option>
						<option value="HL" <?php if(isset($bus_cat2)) giveAttrib("HL",$bus_cat2,"selected='selected'"); ?>>Health Care</option>
						<option value="MD" <?php if(isset($bus_cat2)) giveAttrib("MD",$bus_cat2,"selected='selected'"); ?>>Media</option>
						<option value="JW" <?php if(isset($bus_cat2)) giveAttrib("JW",$bus_cat2,"selected='selected'"); ?>>Jewellery</option>
						<option value="RT" <?php if(isset($bus_cat2)) giveAttrib("RT",$bus_cat2,"selected='selected'"); ?>>Retail</option>
						<option value="MF" <?php if(isset($bus_cat2)) giveAttrib("MF",$bus_cat2,"selected='selected'"); ?>>Manufacturing</option>
						<option value="WH" <?php if(isset($bus_cat2)) giveAttrib("WH",$bus_cat2,"selected='selected'"); ?>>Wholesale</option>
						<option value="ENG" <?php if(isset($bus_cat2)) giveAttrib("ENG",$bus_cat2,"selected='selected'"); ?>>Professionals-Engineer</option>
						<option value="DOC" <?php if(isset($bus_cat2)) giveAttrib("DOC",$bus_cat2,"selected='selected'"); ?>>Professionals-Doctor</option>
						<option value="ARC" <?php if(isset($bus_cat2)) giveAttrib("ARC",$bus_cat2,"selected='selected'"); ?>>Professionals-Architect</option>
						<option value="H&R" <?php if(isset($bus_cat2)) giveAttrib("H&R",$bus_cat2,"selected='selected'"); ?>>Hotels & Restaurants</option>
						<option value="BD" <?php if(isset($bus_cat2)) giveAttrib("BD",$bus_cat2,"selected='selected'"); ?>>Builders</option>
						<option value="EDU" <?php if(isset($bus_cat2)) giveAttrib("EDU",$bus_cat2,"selected='selected'"); ?>>Institutions</option>
						<option value="DL" <?php if(isset($bus_cat2)) giveAttrib("DL",$bus_cat2,"selected='selected'"); ?>>Dealership</option>
						<option value="SS" <?php if(isset($bus_cat2)) giveAttrib("SS",$bus_cat2,"selected='selected'"); ?>>Search/Survey</option>
						<option value="TL" <?php if(isset($bus_cat2)) giveAttrib("TL",$bus_cat2,"selected='selected'"); ?>>Textile</option>
					</select>
				</td>
			</tr>




			<!-- Registration no -->
			<tr>
				<td>Registration No</td><td>:</td>
				<td><input type="text" size="40" name="regno" class="input-text" value="<?php if(isset($regno)) echo $regno; ?>" /></td>
			</tr>
			

			<!-- Mail ID -->
			<tr>
				<td>E-mail ID</td><td>:</td>
				<td><input type="text" size="40" name="email" class="input-text" value="<?php if(isset($email)) echo $email; ?>" /></td>
			</tr>


			<!-- Office Address -->
			<tr>
				<td class="va-top">Office Address</td><td class="va-top">:</td>
				<td>
					<textarea id="addr1_gn" name="addr1_gn" cols="40" rows="3" class="input-text"><?php if(isset($addr1_gn)) echo $addr1_gn; ?></textarea>
				</td>
			</tr>
			<!-- District -->
			<tr>
				<td>District</td><td>:</td>
				<td>
					<select name="addr1_ds" id="addr1_ds">
						<option value="--" <?php if(!isset($addr1_ds)) giveAttrib("--", "--", "selected='selected'"); ?>> --- </option>
						<option value="CLT" <?php if(isset($addr1_ds)) giveAttrib("CLT",$addr1_ds,"selected='selected'"); ?>>Calicut</option>
						<option value="MPM" <?php if(isset($addr1_ds)) giveAttrib("MPM",$addr1_ds,"selected='selected'"); ?>>Malappuram</option>
						<option value="KNR" <?php if(isset($addr1_ds)) giveAttrib("KNR",$addr1_ds,"selected='selected'"); ?>>Kannur</option>
						<option value="EKM" <?php if(isset($addr1_ds)) giveAttrib("EKM",$addr1_ds,"selected='selected'"); ?>>Ernakulam</option>
						<option value="KTM" <?php if(isset($addr1_ds)) giveAttrib("KTM",$addr1_ds,"selected='selected'"); ?>>Kottayam</option>
						<option value="TSR" <?php if(isset($addr1_ds)) giveAttrib("TSR",$addr1_ds,"selected='selected'"); ?>>Thrissur</option>
						<option value="KGD" <?php if(isset($addr1_ds)) giveAttrib("KGD",$addr1_ds,"selected='selected'"); ?>>Kasaragode</option>
						<option value="WND" <?php if(isset($addr1_ds)) giveAttrib("WND",$addr1_ds,"selected='selected'"); ?>>Wayanad</option>
					</select>
				</td>
			</tr>
			<!-- State -->
			<tr>
				<td>State</td><td>:</td>
				<td><input type="text" size="40" id="addr1_st" name="addr1_st" class="input-text" value="<?php
				if(isset($addr1_st))
					echo $addr1_st;
				else
					echo "Kerala";
				?>"></td>
			</tr>
			<!-- PIN -->
			<tr>
				<td>PIN</td><td>:</td>
				<td><input type="text" size="40" id="addr1_pin" name="addr1_pin" class="input-text" value="<?php if(isset($addr1_pin)) echo $addr1_pin; ?>"></td>
			</tr>
			

			<tr>
			<td>
			<div id="useSameAddress" style="display:none">
				<input type="checkbox" id="checkSameAddress" onclick="useSameAddrFn();" /> Use the same address for Residence
			</div>
			</td>
			</tr>
			<!-- Residence Address -->
			<tr>
				<td class="va-top">Residence Address</td><td class="va-top">:</td>
				<td>
					<textarea name="addr2_gn" id="addr2_gn" cols="40" rows="3" class="input-text"><?php if(isset($addr2_gn)) echo $addr2_gn; ?></textarea>
				</td>
			</tr>
			<!-- District -->
			<tr>
				<td>District</td><td>:</td>
				<td>
					<select name="addr2_ds" id="addr2_ds">
						<option value="--" <?php if(!isset($addr2_ds)) giveAttrib("--", "--", "selected='selected'"); ?>> --- </option>
						<option value="CLT" <?php if(isset($addr2_ds)) giveAttrib("CLT",$addr2_ds,"selected='selected'"); ?>>Calicut</option>
						<option value="MPM" <?php if(isset($addr2_ds)) giveAttrib("MPM",$addr2_ds,"selected='selected'"); ?>>Malappuram</option>
						<option value="KNR" <?php if(isset($addr2_ds)) giveAttrib("KNR",$addr2_ds,"selected='selected'"); ?>>Kannur</option>
						<option value="EKM" <?php if(isset($addr2_ds)) giveAttrib("EKM",$addr2_ds,"selected='selected'"); ?>>Ernakulam</option>
						<option value="KTM" <?php if(isset($addr2_ds)) giveAttrib("KTM",$addr2_ds,"selected='selected'"); ?>>Kottayam</option>
						<option value="TSR" <?php if(isset($addr2_ds)) giveAttrib("TSR",$addr2_ds,"selected='selected'"); ?>>Thrissur</option>
						<option value="KGD" <?php if(isset($addr2_ds)) giveAttrib("KGD",$addr2_ds,"selected='selected'"); ?>>Kasaragode</option>
						<option value="WND" <?php if(isset($addr2_ds)) giveAttrib("WND",$addr2_ds,"selected='selected'"); ?>>Wayanad</option>
					</select>
				</td>
			</tr>
			<!-- State -->
			<tr>
				<td>State</td><td>:</td>
				<td><input type="text" size="40" name="addr2_st" id="addr2_st" class="input-text" value="<?php
				if(isset($addr2_st))
					echo $addr2_st;
				else
					echo "Kerala";
				?>"></td>
			</tr>
			<!-- PIN -->
			<tr>
				<td>PIN</td><td>:</td>
				<td><input type="text" size="40" name="addr2_pin" id="addr2_pin" class="input-text" value="<?php if(isset($addr2_pin)) echo $addr2_pin; ?>"></td>
			</tr>



			<!-- Phone Numbers -->
			<tr>
				<td class="va-top">Phone numbers</td><td class="va-top">:</td>
				<td>
					<textarea name="phnos" cols="40" rows="3" class="input-text"><?php if(isset($phnos)) echo $phnos; ?></textarea>
				</td>
			</tr>



			<!-- PAN No -->
			<tr>
				<td>PAN No</td><td>:</td>
				<td><input type="text" size="40" name="pan" class="input-text" value="<?php if(isset($pan)) echo $pan; ?>" /></td>
			</tr>
			


			<!-- Digital Auth name and expiry date -->
			<tr>
				<td>Digital auth name</td><td>:</td>
				<td><input type="text" size="40" name="da_name" class="input-text" value="<?php if(isset($da_name)) echo $da_name; ?>" /></td>
			</tr>
			<tr>
				<td>Digital auth Expiry Date</td><td>:</td>
				<td>
				<input name="da_exp" id="da_exp" type="text" placeholder='dd/mm/yyyy' readonly='readonly' value="<?php if(isset($da_exp)) echo $da_exp; ?>" />
				</td>
			</tr>
			


			<!-- IT Uname, Password -->
			<tr>
				<td>IT Username</td><td>:</td>
				<td><input type="text" size="40" name="it_uname" class="input-text" value="<?php if(isset($it_uname)) echo $it_uname; ?>" /></td>
			</tr>
			<tr>
				<td>IT Password</td><td>:</td>
				<td><input type="text" size="40" name="it_pass" class="input-text" value="<?php if(isset($it_pass)) echo $it_pass; ?>" /></td>
			</tr>


			<!-- Sales Tax Uname, Password -->
			<tr>
				<td>Sales Tax Username</td><td>:</td>
				<td><input type="text" size="40" name="st_uname" class="input-text" value="<?php if(isset($st_uname)) echo $st_uname; ?>" /></td>
			</tr>
			<tr>
				<td>Sales Tax Password</td><td>:</td>
				<td><input type="text" size="40" name="st_pass" class="input-text" value="<?php if(isset($st_pass)) echo $st_pass; ?>" /></td>
			</tr>



			<!-- Team Assigned -->
			<tr>
				<td>Team Assigned</td><td>:</td>
				<td>
					<select name="tid">
						<option value="-" <?php if(!isset($tid)) { ?>selected='selected'<?php }?>> --- </option>
						<?php
							foreach ($teams as $team) {
								echo "<option value='$team' ";
								if(isset($tid)) giveAttrib($tid, $team, "selected='selected'");
								echo ">$team</option>\n";
							}
						?>
					</select>
				</td>
			</tr>



			<!-- Status of Filing -->
			<tr>
				<td>Status of filing</td><td>:</td>
				<td>
					<div id = "statusOfFilingDiv">
					</div>
				</td>
			</tr>



			<!-- Last visited date -->
			<tr>
				<td>Last date of visit</td><td>:</td>
				<td>
				<?php if(isset($lvdate)) {
						echo $lvdate;
						echo form_hidden('lvdate',$lvdate);
					}
					else if(isset($new)) {
						echo date('d/m/Y');
						echo form_hidden('lvdate',date('d/m/Y'));
					}
					else {
						echo "---";
						echo form_hidden('lvdate',' --- ');
					}
				?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<?php if(!isset($new)) { ?>
				<input type="button" id="LVUpdate" value="Update" onclick="LVUpdateFn();" />
				<?php } ?>
				</td>
			</tr>



			<!-- Bank Details -->
			<tr>
				<td>Bank Name</td><td>:</td>
				<td>
					<input type="text" size="40" name="bank_name" class="input-text" value="<?php if(isset($bank_name)) echo $bank_name; ?>" />
				</td>
			</tr>
			<tr>
				<td>Account No.</td><td>:</td>
				<td>
					<input type="text" size="40" name="acno" class="input-text" value="<?php if(isset($acno)) echo $acno; ?>" />
				</td>
			</tr>
			<tr>
				<td>MICR Code</td><td>:</td>
				<td>
					<input type="text" size="40" name="micr" class="input-text" value="<?php if(isset($micr)) echo $micr; ?>" />
				</td>
			</tr>
			<tr>
				<td>IFSC Code</td><td>:</td>
				<td>
					<input type="text" size="40" name="ifsc" class="input-text" value="<?php if(isset($ifsc)) echo $ifsc; ?>" />
				</td>
			</tr>
			<tr>
				<td>Branch name</td><td>:</td>
				<td>
					<input type="text" size="40" name="branch" class="input-text" value="<?php if(isset($branch)) echo $branch; ?>" />
				</td>
			</tr>

			<!-- Edit, Save and Add Buttons -->
			<tr>
				<td>
					<?php
					if(isset($new))
						echo "<p><input type='submit' class='image-button add' name='submit' value='Insert Client' /></p>\n";
					else
						echo "<p><input id='edit' onClick='showSave();' type='button' class='image-button edit' name='edit' value='Edit' /></p>\n";
					?>
				</td><td></td>
				<td align="right"><input name="save" type="submit" class='image-button save' id="save" style="display:none;" value="Save" /></td>
			</tr>
		</tbody>
		</table>
				<link rel="stylesheet" href="<?php echo base_url('css/jquery.datepick.css'); ?>" type="text/css" />
				<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
				<script type="text/javascript" src="<?php echo base_url('js/jquery.plugin.js'); ?>"></script>
				<script type="text/javascript" src="<?php echo base_url('js/jquery.datepick.js'); ?>"></script>
			    <script type="text/javascript">
			    //$(function() {
					//$('#dob').datepick({dateFormat: 'dd/mm/yyyy'});
				//});
				</script>

		<script type="text/javascript">
			<?php if(!isset($new)) {
					echo "disableAll();\n";
				}
				else{
					echo "showSelStatusOfFiling();\n";
					echo "showSelGender();\n";
					echo "enableDOB();\n";
				}
			?>

			function LVUpdateFn()
			{
				if(confirm("Do you really want to update Last visited date?"))
					window.location = "<?php echo base_url('index.php/clientdb/updateLVDate/'.$cid); ?>";
			}

			function showSelStatusOfFiling()
			{
				var text="";
				text += '<input name="stat_filing" type="radio" value="Y" ';
				text += '<?php if(isset($stat_filing)) giveAttrib("Y",$stat_filing,'checked="checked"'); ?>>Yes'+"\n";
				text += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+"\n";
				text += '<input name="stat_filing" type="radio" value="N" ';
				text += '<?php
						if(isset($stat_filing))
							giveAttrib("N",$stat_filing,'checked="checked"');
						else
							echo 'checked="checked"';
					?>';
				text += '>No'+"\n";
				document.getElementById("statusOfFilingDiv").innerHTML = text;
			}

			function showStatusOfFiling()
			{
				var text = "<?php 
					if(isset($stat_filing)) {
						if($stat_filing == 'Y')
							echo 'Yes';
						else
							echo 'No';
					} else
						echo 'unspecified';
				?>";
				document.getElementById("statusOfFilingDiv").innerHTML = text;
			}

			function showSelGender()
			{
				var text = "";
				text += '<input name="sex" ';
				text += "<?php
					if(isset($sex))
						giveAttrib("M",$sex,"checked='checked' ");
					else
						echo "checked='checked' "; 
				?>";
				text += 'type="radio" value="M">Male'+"\n";
				text += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+"\n";
				text += '<input name="sex" ';
				text += "<?php if(isset($sex)) giveAttrib("F",$sex,"checked='checked' "); ?>";
				text += 'type="radio" value="F">Female'+"\n";
				document.getElementById("genderDiv").innerHTML = text;
			}

			function showGender()
			{
				var text = "<?php 
					if(isset($sex)) {
						if($sex == 'M')
							echo 'Male';
						else
							echo 'Female';
					} else
						echo 'unspecified';
				?>";
				document.getElementById("genderDiv").innerHTML = text;
			}

			function enableDOB()
			{
				document.getElementById('dob').setAttribute('class','input-text');
				document.getElementById('dob').disabled = false;
				$('#dob').datepick({dateFormat: 'dd/mm/yyyy'});

				document.getElementById('da_exp').setAttribute('class','input-text');
				document.getElementById('da_exp').disabled = false;
				$('#da_exp').datepick({dateFormat: 'dd/mm/yyyy'});
			}

			function disableDOB()
			{
				document.getElementById('dob').setAttribute('class','show-as-text');
				document.getElementById('dob').disabled = true;

				document.getElementById('da_exp').setAttribute('class','show-as-text');
				document.getElementById('da_exp').disabled = true;
			}

			function enableAll()
			{
				console.log("enableAll");
				var inputs = document.querySelectorAll("fieldset input[type=text]");
				for(var i = 0; i < inputs.length; i++) {
					inputs[i].setAttribute('class','input-text');
					inputs[i].removeAttribute('readonly');
				}
				var selects = document.getElementsByTagName('select');
				for(var i = 0; i < selects.length; i++) {
					selects[i].disabled = false;
					selects[i].removeAttribute('class');
				}
				var ta = document.getElementsByTagName('textarea');
				for(var i = 0; i < ta.length; i++) {
					ta[i].removeAttribute('class');
					ta[i].removeAttribute('readonly');
				}
				var radios = document.querySelectorAll("fieldset input[type=radio]");
				for(var i = 0; i < radios.length; i++) {					
					radios[i].disabled = false;
				}
				var dates = document.querySelectorAll("fieldset input[type=date]");
				for(var i = 0; i < dates.length; i++) {
					dates[i].disabled = false;
					dates[i].setAttribute('class', 'input-text')
				}
				var mails = document.querySelectorAll("fieldset input[type=email]");
				for(var i = 0; i < mails.length; i++) {
					mails[i].setAttribute('class','input-text');
					mails[i].removeAttribute('readonly');
				}


				enableDOB();

				showSelGender();
				showSelStatusOfFiling();
				hideLVUpdate();

				document.getElementById('useSameAddress').style.display = "block";
			}
			function disableAll()
			{
				console.log("disableAll");
				var inputs = document.querySelectorAll("fieldset input[type=text]");
				for(var i = 0; i < inputs.length; i++) {
					inputs[i].setAttribute('class','show-as-text');
					inputs[i].setAttribute('readonly','readonly');
				}
				var selects = document.getElementsByTagName('select');
				for(var i = 0; i < selects.length; i++) {			
					selects[i].disabled = true;
					selects[i].setAttribute('class','show-as-text');
				}
				var ta = document.getElementsByTagName('textarea');
				for(var i = 0; i < ta.length; i++) {
					ta[i].setAttribute('class','show-as-text');
					ta[i].setAttribute('readonly','readonly');
				}
				var radios = document.querySelectorAll("fieldset input[type=radio]");
				for(var i = 0; i < radios.length; i++) {					
					radios[i].disabled = true;
				}
				var dates = document.querySelectorAll("fieldset input[type=date]");
				for(var i = 0; i < dates.length; i++) {
					dates[i].disabled = true;
					dates[i].setAttribute('class', 'show-as-text')
				}
				var mails = document.querySelectorAll("fieldset input[type=email]");
				for(var i = 0; i < mails.length; i++) {
					mails[i].setAttribute('class','show-as-text');
					mails[i].setAttribute('readonly', 'readonly');
				}

				disableDOB();

				showGender();
				showStatusOfFiling();
				showLVUpdate();

				document.getElementById('useSameAddress').style.display ="none";
			}
			function showSave()
			{
				enableAll();
				document.getElementById("save").style.display="table-row";
			}
			function hideLVUpdate()
			{
				document.getElementById("LVUpdate").style.display="none";
			}
			function showLVUpdate()
			{
				document.getElementById("LVUpdate").style.display="table-row";
			}


			function useSameAddrFn()
			{
				if(document.getElementById("checkSameAddress").checked) {
					document.getElementById("addr2_gn").value = document.getElementById("addr1_gn").value;
					document.getElementById("addr2_ds").selectedIndex = document.getElementById("addr1_ds").selectedIndex;
					document.getElementById("addr2_st").value = document.getElementById("addr1_st").value;
					document.getElementById("addr2_pin").value = document.getElementById("addr1_pin").value;
				} else {
					document.getElementById("addr2_gn").value = "";
					document.getElementById("addr2_ds").selectedIndex= 0;
					document.getElementById("addr2_st").value = "";
					document.getElementById("addr2_pin").value = "";
				}
			}
		</script>
	</fieldset>
	</form>


	<!-- VALIDATION -->
	<script type="text/javascript">
		var frmValidator = new Validator("addClient");

		frmValidator.EnableOnPageErrorDisplaySingleBox();
		frmValidator.EnableMsgsTogether();

		//client name
		frmValidator.addValidation("name","req","Name not entered.");
		frmValidator.addValidation("name","maxlen=50","Name can't exceed 50 characters");
		frmValidator.addValidation("name","regexp=^[a-zA-Z\ \.]*$","Invalid name");
		
		//fatname
		frmValidator.addValidation("fatname","req","Father's Name not entered");
		frmValidator.addValidation("fatname", "maxlen=50", "Father's name can't exceed 50 characters");
		frmValidator.addValidation("fatname","regexp=^[a-zA-Z\ \.]*$","Father's name invalid");


		//dob
		frmValidator.addValidation("dob", "req", "DOB not entered");

		//cmpname
		frmValidator.addValidation("cmpname","req","Company Name not entered");
		frmValidator.addValidation("cmpname","maxlen=100","Company name can't exceed 100 characters");

		//status_cat1
		frmValidator.addValidation("status_cat1","dontselect='--'","Choose Legal Structure");

		//bus_cat2
		frmValidator.addValidation("bus_cat2","dontselect=--","Choose Business Category");

		//regno
		frmValidator.addValidation("regno","req","Registration Number not entered");
		frmValidator.addValidation("regno","maxlen=20","Registration Number can't exceed 20 characters");

		//email
		frmValidator.addValidation("email","req","Email ID not entered");
		frmValidator.addValidation("email","maxlen=150","Email ID can't exceed 150 characters");
		frmValidator.addValidation("email","email","Invalid Email ID");

		//addr1_gn
		frmValidator.addValidation("addr1_gn","req","Office Address not entered");

		//addr1_ds
		frmValidator.addValidation("addr1_ds","dontselect=--","Choose District (Office Address)");

		//addr1_st
		frmValidator.addValidation("addr1_st","req","State (Office Address) not entered");
		frmValidator.addValidation("addr1_st", "maxlen=20", "State (Office Address) can't exceed 20 characters");

		//addr1_pin
		frmValidator.addValidation("addr1_pin","maxlen=6","Invalid PIN Code (Office Address)");
		frmValidator.addValidation("addr1_pin","minlen=6","Invalid PIN Code (Office Address)");
		frmValidator.addValidation("addr1_pin","num","Invalid PIN Code (Office Address)");
		

		//addr2_gn
		frmValidator.addValidation("addr2_gn","req","Residence Address not entered");

		//addr2_ds
		frmValidator.addValidation("addr2_ds","dontselect=--","Choose District (Residence Address)");

		//addr2_st
		frmValidator.addValidation("addr2_st","req","State (Residence Address) not entered");
		frmValidator.addValidation("addr2_st", "maxlen=20", "State (Residence Address) can't exceed 20 characters");

		//addr2_pin
		frmValidator.addValidation("addr2_pin","maxlen=6","Invalid PIN Code (Residence Address)");
		frmValidator.addValidation("addr2_pin","minlen=6","Invalid PIN Code (Residence Address)");
		frmValidator.addValidation("addr2_pin","num","Invalid PIN Code (Residence Address)");

		//phnos
		frmValidator.addValidation("phnos","req","Contact numbers not entered");

		//pan
		frmValidator.addValidation("pan", "maxlen=10", "Invalid PAN number");
		frmValidator.addValidation("pan", "minlen=10", "Invalid PAN number");
		frmValidator.addValidation("pan", "alnum", "Invalid PAN number");

		//da_name
		frmValidator.addValidation("da_name", "maxlen=50", "Digital Auth name can't exceed 50 characters");
		//frmValidator.addValidation("da_name", "req", "Please enter Digital Auth Name");

		//da_exp
		//frmValidator.addValidation("da_exp", "req", "Please enter Digital Auth Expiry Date");

		//it_uname
		//frmValidator.addValidation("it_uname", "req", "IT Username not entered");
		frmValidator.addValidation("it_uname", "maxlen=30", "IT username can't exceed 30 characters");

		//it_pass
		//frmValidator.addValidation("it_pass", "req", "IT Password not entered");
		frmValidator.addValidation("it_pass", "maxlen=30", "IT password can't exceed 30 characters");

		//st_uname
		//frmValidator.addValidation("st_uname", "req", "Sales Tax Username not entered");
		frmValidator.addValidation("st_uname", "maxlen=30", "Sales Tax username can't exceed 30 characters");

		//st_pass
		//frmValidator.addValidation("st_pass", "req", "Sales Tax Password not entered");
		frmValidator.addValidation("st_pass", "maxlen=30", "Sales Tax password can't exceed 30 characters");

		//tid
		frmValidator.addValidation("tid","dontselect=-","Choose Team");

		//lvdate
		//frmValidator.addValidation("lvdate", "req", "Please enter Last Visited Date");

		//bank_name
		frmValidator.addValidation("bank_name", "req", "Bank Name not entered");
		frmValidator.addValidation("bank_name", "maxlen=50", "Bank name can't exceed 50 characters");

		//acno
		frmValidator.addValidation("acno", "req", "Bank Account Number not entered");
		frmValidator.addValidation("acno", "maxlen=30", "Account Number can't exceed 30 characters");

		//micr
		frmValidator.addValidation("micr", "req", "MICR Code not entered");
		frmValidator.addValidation("micr", "maxlen=20", "MICR Code can't exceed 20 characters");

		//ifsc
		frmValidator.addValidation("ifsc", "alnum", "Invalid IFSC Code");
		frmValidator.addValidation("ifsc", "maxlen=11", "Invalid IFSC Code");
		frmValidator.addValidation("ifsc", "minlen=11", "Invalid IFSC Code");

		//branch
		frmValidator.addValidation("branch", "req", "Bank Branch not entered");
		frmValidator.addValidation("branch","maxlen=50","Bank Branch Name can't exceed 50 characters");

	</script>
</div>