<div id="content" class="box">
	<?php echo form_open('index.php/'); ?>
	<fieldset>
		<legend>Add a new Client</legend>
		<table class="nostyle">
		<tbody>
			<tr>
				<td>Name of the personnel</td>
				<td><input type="text" size="40" name="name" class="input-text"></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input name="gender" checked="checked" type="radio" value="M">Male
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="gender" type="radio" value="F">Female
				</td>
			</tr>
			<tr>
				<td>DOB</td>
				<td></td>
			</tr>
			<tr>
				<td>Company name</td>
				<td><input type="text" size="40" name="companyName" class="input-text"></td>
			</tr>
			<tr>
				<td>Client ID</td>
				<td><input type="text" size="40" name="clientId" class="input-text" value = "readonly, fill from db" readonly="readonly"></td>
			</tr>
			<tr>
				<td>Legal Structure</td>
				<td>
					<select>
						<option value="llb">LLB</option>
						<option value="firm">Firm</option>
						<option value="company">Company</option>
						<option value="individual">Individual</option>
						<option value="trust">Trust</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Business Category</td>
				<td>
					<select>
						<option value="healthcare">Health Care</option>
						<option value="media">Media</option>
						<option value="jewellery">Jewellery</option>
						<option value="retail">Retail</option>
						<option value="manufacturing">Manufacturing</option>
						<option value="wholesale">Wholesale</option>
						<option value="professionals">Professionals</option>
						<option value="hotelsRestaurants">Hotels & Restaurants</option>
						<option value="builders">Builders</option>
						<option value="institutions">Institutions</option>
						<option value="dealership">Dealership</option>
						<option value="search/survey">Search/Survey</option>
						<option value="textile">Textile</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Registration No</td>
				<td><input type="text" size="40" name="regnNo" class="input-text"></td>
			</tr>
			<tr>
				<td class="va-top">Address office & residence</td>
				<td>
					<textarea cols="40" rows="7" class="input-text"></textarea>
				</td>
			</tr>
			<tr>
				<td class="va-top">Phone numbers</td>
				<td>
					<textarea cols="40" rows="4" class="input-text"></textarea>
				</td>
			</tr>
			<tr>
				<td>PAN No</td>
				<td><input type="text" size="40" name="name" class="input-text"></td>
			</tr>
			<tr>
				<td class="va-top">Digital auth name & exp date</td>
				<td>
					<textarea cols="40" rows="4" class="input-text"></textarea>
				</td>
			</tr>
			<tr>
				<td class="va-top">IT & Sales Tax Uname & Password</td>
				<td>
					<textarea cols="40" rows="4" class="input-text"></textarea>
				</td>
			</tr>
			<tr>
				<td>Team Assigned</td>
				<td>
					<select>
					<?php
						echo "<option>"."got to work on it"."</option>";
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Status of the filing</td>
				<td>
					<input name="status" type="radio" value="Y">Yes
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="status" type="radio" value="N" checked="checked">No
				</td>
			</tr>
			<tr>
				<td>Last date of visit</td>
				<td></td>
			</tr>
			<tr>
			<script type="text/javascript">
			function showOther() {
				if( document.getElementById('svc_cat').value == 'others') {
					document.getElementById('service_other').style.display='table-row';
				} else {
					document.getElementById('service_other').style.display='none';
				}
			}
			</script>
				<td>Category of services</td>
				<td>
					<select id="svc_cat" onchange="javascript: showOther();">
						<option value="statAudit">Statuatory Audit</option>
						<option value="intAudit">Internal Audit</option>
						<option value="auditReportSvcs">Audit Report Services</option>
						<option value="vatSalesTax">VAT Sales Tax</option>
						<option value="prepOfDocsForAssmnt">Preparation of Documents for assessment</option>
						<option value="rocCompliance">ROC Compliance</option>
						<option value="others">Others</option>
					</select>
					
				</td>
			</tr>
			<tr id="service_other"  style="display:none;">
			<td></td>
			<td><input class="input-text" size="40" name="service_other" type="text" /></td></tr>
			<tr>
				<td class="va-top">Bank Details</td>
				<td>
					<textarea cols="40" rows="4" class="input-text"></textarea>
				</td>
			</tr>
			<tr>
				<td>List of documents received</td>
				<td></td>
			</tr>
		</tbody>
		</table>
	</fieldset>
	</form>
</div>