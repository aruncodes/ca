<div id="content" class="box">
	<?php if(isset($msg)) echo $msg; ?>
	<fieldset>
		<legend>Add New Document</legend>
		<?php echo form_open('inout/add_doc') ?>
			<table class="nostyle">
				<tr>
					<td> Document Name :</td> 
					<td> <input type="text" name="doc_name" class="input-text" placeholder="Document Name"/></td>
					<td>
						<select name="doc_type" style="height:30px;">
							<optgroup label="Inward"> 
								<option value="INA"> Accounts </option>
								<option value="INN"> Notices </option>
								<option value="INO"> Others </option>
							</optgroup>
								<option value="OUT">Outward</option>
						</select>
					</td>
					<td><input type="submit" name="submit" class="image-button addsmall" value="Add"></td>
				</tr>
			</table>
		<?php echo form_close(); ?>
	</fieldset>
</div>