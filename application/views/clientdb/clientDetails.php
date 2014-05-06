<?php
	if(isset($new) || isset($success))
		echo "<div id='content'>";
	if(isset($success))
		echo "<p class='msg done'>".$success."</p>";
	if(isset($new))
		echo form_open('clientdb/addClient/add');
	else
		echo form_open('clientdb/addClient/modify');
?>
	<fieldset>
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
				<td>Name of the personnel</td>
				<td><input type="text" size="40" name="name" class="input-text" value="<?php if(isset($name)) echo $name; ?>"></td>
			</tr>
		
			<!-- Function - check if equal and echo attrib -->	
			<?php
				function giveAttrib($val1, $val2, $attrib)
				{
					if($val1 == $val2)
						echo $attrib;
				}
			?>
		

			<!-- Gender -->
			<tr>
				<td>Gender</td>
				<td>
					<input name="sex" <?php
						if(isset($sex))
							giveAttrib("M",$sex,"checked='checked' ");
						else
							echo "checked='checked' "; 
					?>type="radio" value="M">Male
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="sex" <?php if(isset($sex)) giveAttrib("F",$sex,"checked='checked' "); ?>type="radio" value="F">Female
				</td>
			</tr>


			<!-- Date of Birth -->
			<tr>
				<td>DOB</td>
				<td><input name="dob" type="text" size=40 class="input-text" value="<?php if(isset($dob)) echo $dob; ?>" /></td>
			</tr>

			
			<!-- Company Name -->
			<tr>
				<td>Company name</td>
				<td><input type="text" size="40" name="cmpname" class="input-text" value="<?php if(isset($cmpname)) echo $cmpname; ?>" /></td>
			</tr>



			<!-- Client ID -->
			<tr>
				<td>Client ID</td>
				<td><input type="text" size="40" name="cid" class="input-text" value = "<?php echo $cid; ?>" readonly="readonly"></td>
			</tr>


			<!-- Legal Structure - Category 1 -->
			<tr>
				<td>Legal Structure</td>
				<td>
					<select name="status_cat1">
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
				<td>Business Category</td>
				<td>
					<select name="bus_cat2">
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
				<td>Registration No</td>
				<td><input type="text" size="40" name="regno" class="input-text" value="<?php if(isset($regno)) echo $regno; ?>" /></td>
			</tr>
			



			<!-- Office Address -->
			<tr>
				<td class="va-top">Office Address</td>
				<td>
					<textarea name="addr1_gn" cols="40" rows="3" class="input-text"><?php if(isset($addr1_gn)) echo $addr1_gn; ?></textarea>
				</td>
			</tr>
			<!-- District -->
			<tr>
				<td>District</td>
				<td>
					<select name="addr1_ds">
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
				<td>State</td>
				<td><input type="text" size="40" name="addr1_st" class="input-text" value="<?php
				if(isset($addr1_st))
					echo $addr1_st;
				else
					echo "Kerala";
				?>"></td>
			</tr>
			<!-- PIN -->
			<tr>
				<td>PIN</td>
				<td><input type="text" size="40" name="addr1_pin" class="input-text" value="<?php if(isset($addr1_pin)) echo $addr1_pin; ?>"></td>
			</tr>
			


			<!-- Residence Address -->
			<tr>
				<td class="va-top">Residence Address</td>
				<td>
					<textarea name="addr2_gn" cols="40" rows="3" class="input-text"><?php if(isset($addr2_gn)) echo $addr2_gn; ?></textarea>
				</td>
			</tr>
			<!-- District -->
			<tr>
				<td>District</td>
				<td>
					<select name="addr2_ds">
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
				<td>State</td>
				<td><input type="text" size="40" name="addr2_st" class="input-text" value="<?php
				if(isset($addr2_st))
					echo $addr2_st;
				else
					echo "Kerala";
				?>"></td>
			</tr>
			<!-- PIN -->
			<tr>
				<td>PIN</td>
				<td><input type="text" size="40" name="addr2_pin" class="input-text" value="<?php if(isset($addr2_pin)) echo $addr2_pin; ?>"></td>
			</tr>



			<!-- Phone Numbers -->
			<tr>
				<td class="va-top">Phone numbers</td>
				<td>
					<textarea name="phnos" cols="40" rows="3" class="input-text"><?php if(isset($phnos)) echo $phnos; ?></textarea>
				</td>
			</tr>




			<!-- PAN No -->
			<tr>
				<td>PAN No</td>
				<td><input type="text" size="40" name="pan" class="input-text" value="<?php if(isset($pan)) echo $pan; ?>" /></td>
			</tr>
			


			<!-- Digital Auth name and expiry date -->
			<tr>
				<td>Digital auth name</td>
				<td><input type="text" size="40" name="da_name" class="input-text" value="<?php if(isset($da_name)) echo $da_name; ?>" /></td>
			</tr>
			<tr>
				<td>Digital auth Expiry Date</td>
				<td><input type="text" size="40" name="da_exp" class="input-text" value="<?php if(isset($da_exp)) echo $da_exp; ?>" /></td>
			</tr>
			


			<!-- IT and Sales Tax Uname, Password -->
			<tr>
				<td>IT & Sales Tax Username</td>
				<td><input type="text" size="40" name="st_uname" class="input-text" value="<?php if(isset($st_uname)) echo $st_uname; ?>" /></td>
			</tr>
			<tr>
				<td>IT & Sales Tax Password</td>
				<td><input type="text" size="40" name="st_pass" class="input-text" value="<?php if(isset($st_pass)) echo $st_pass; ?>" /></td>
			</tr>



			<!-- Team Assigned -->
			<tr>
				<td>Team Assigned</td>
				<td>
					<select name="tid">
						<option value="0">Team A</option>
					</select>
				</td>
			</tr>
			



			<!-- Status of Filing -->
			<tr>
				<td>Status of filing</td>
				<td>
					<input name="stat_filing" type="radio" value="Y" <?php if(isset($stat_filing)) giveAttrib("Y",$stat_filing,"checked='checked'"); ?>>Yes
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="stat_filing" type="radio" value="N" <?php
						if(isset($stat_filing))
							giveAttrib("N",$stat_filing,"checked='checked'");
						else
							echo "checked='checked'";
					?>>No
				</td>
			</tr>



			<!-- Last visited date -->
			<tr>
				<td>Last date of visit</td>
				<td>
					<input type="text" size="40" name="lvdate" class="input-text" value="<?php
					if(isset($lvdate))
						echo $lvdate;
					else
						echo date('d/m/Y');
					?>">
				</td>
			</tr>



			<!-- Bank Details -->
			<tr>
				<td>Bank Name</td>
				<td>
					<input type="text" size="40" name="bank_name" class="input-text" value="<?php if(isset($bank_name)) echo $bank_name; ?>" />
				</td>
			</tr>
			<tr>
				<td>Account No.</td>
				<td>
					<input type="text" size="40" name="acno" class="input-text" value="<?php if(isset($acno)) echo $acno; ?>" />
				</td>
			</tr>
			<tr>
				<td>MICR Code</td>
				<td>
					<input type="text" size="40" name="micr" class="input-text" value="<?php if(isset($micr)) echo $micr; ?>" />
				</td>
			</tr>
			<tr>
				<td>IFSC Code</td>
				<td>
					<input type="text" size="40" name="ifsc" class="input-text" value="<?php if(isset($ifsc)) echo $ifsc; ?>" />
				</td>
			</tr>
			<tr>
				<td>Branch name</td>
				<td>
					<input type="text" size="40" name="branch" class="input-text" value="<?php if(isset($branch)) echo $branch; ?>" />
				</td>
			</tr>


			<!-- Edit, Save and Add Buttons -->
			<tr>
				<td>
					<?php
					if(isset($new))
						echo "<p><input type='submit' class='input-submit' name='submit' value='Insert Client' /></p>\n";
					else
						echo "<p><input id='edit' onClick='showSave();' type='button' class='input-submit' name='edit' value='Edit' /></p>\n";
					?>
				</td>
				<td align="right"><input name="save" type="submit" class='input-submit' id="save" style="display:none;" value="Save" /></td>
			</tr>
		</tbody>
		</table>
		<script type="text/javascript">
			<?php if(!isset($new))
				echo "disableAll()\n";
			?>
			function enableAll()
			{
				console.log("enableAll");
				var inputs = document.getElementsByTagName('input');
				for(var i = 0; i < inputs.length; i++) {
					inputs[i].disabled = false;
				}
				var selects = document.getElementsByTagName('select');
				for(var i = 0; i < selects.length; i++) {
					selects[i].disabled = false;
				}
				var ta = document.getElementsByTagName('textarea');
				for(var i = 0; i < ta.length; i++) {
					ta[i].disabled = false;
				}
			}
			function disableAll()
			{
				console.log("disableAll");
				var inputs = document.getElementsByTagName('input');
				for(var i = 0; i < inputs.length; i++) {
					inputs[i].disabled = true;
				}
				var selects = document.getElementsByTagName('select');
				for(var i = 0; i < selects.length; i++) {
					selects[i].disabled = true;
				}
				var ta = document.getElementsByTagName('textarea');
				for(var i = 0; i < ta.length; i++) {
					ta[i].disabled = true;
				}

				document.getElementById('edit').disabled = false;
				document.getElementById('getCidBox').disabled = false;
				document.getElementById('getCidBut').disabled = false;
			}
			function showSave()
			{
				enableAll();
				document.getElementById("save").style.display="table-row";
			}
		</script>
	</fieldset>
	</form>
</div>