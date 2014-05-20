<div id="kopp">

<style type="text/css">
	#kopp table tr td {
		text-align: center;
		height: 25px;
	}
	legend {
		text-align:left;
	}
	#kopp {
		text-align: center;
	}
</style>

<script type="text/javascript">
	function editButton(sno)
	{
		for(var i = 0; i < <?php echo count($files); ?>; i++)
			if(i != sno)
				disableSelect(i);
		document.getElementById('editSave'+sno).src="<?php echo base_url('design/ico-done.gif'); ?>";
		document.getElementById('editSave'+sno).onclick=function() { saveButton(sno); }
		document.getElementById('selType'+sno).disabled = false;
		document.getElementById('selPrio'+sno).disabled = false;
		document.getElementById('location'+sno).disabled = false;
	}
	function disableSelect(sno)
	{
		document.getElementById('editSave'+sno).src="<?php echo base_url('design/ico-edit.gif'); ?>";
		document.getElementById('editSave'+sno).onclick=function() { editButton(sno); }
		document.getElementById('selType'+sno).disabled = true;
		document.getElementById('selPrio'+sno).disabled = true;
		document.getElementById('location'+sno).disabled = true;
	}
	function saveButton(sno)
	{
		var form = document.createElement("form");
		form.setAttribute('method',"post");
		form.setAttribute('action','<?php echo base_url("index.php/filemgmt/modFile"); ?>');

		var id = document.createElement("input");
		id.setAttribute('name','id');
		id.setAttribute('value', document.getElementById('id'+sno).value);

		var file_type = document.createElement("input");
		file_type.setAttribute('name','file_type');
		file_type.setAttribute('value', document.getElementById('selType'+sno).value);

		var priority = document.createElement("input");
		priority.setAttribute('name','priority');
		priority.setAttribute('value', document.getElementById('selPrio'+sno).value);

		var location = document.createElement("input");
		location.setAttribute('name','location');
		location.setAttribute('value', document.getElementById('location'+sno).value);

    	form.appendChild(id);
    	form.appendChild(file_type);
    	form.appendChild(priority);
    	form.appendChild(location);

    	document.body.appendChild(form);
    	form.submit();
	}
</script>

<fieldset>
<h3><?php echo "Client ID : ".$cid; ?></h3>
<legend>Client's Files</legend>
<?php
	function getSelAttrib($a1, $a2)
	{
		if($a1 == $a2)
			echo "selected='selected' ";
	}
	$fn = 1;
	if(isset($files['error']))
		echo "<p>No current files</p>\n";
	else {
		echo '<table style="margin:0px auto">
	<thead>
		<th>S.No.</th>
		<th>File Name</th>
		<th>Priority</th>
		<th>Location</th>
		<th>Edit</th>
		<th>Del</th>
	</thead>'."\n";
		$sno = 0;
		foreach($files as $file) {
			echo "<tr>\n";
				echo "<td>$fn</td>\n";	$fn++;

				echo "<input type='hidden' id='id$sno' value='".$file['id']."' />";

				echo "<td>".$clientData['status_cat1']."/";
				echo $clientData['addr1_ds']."/".$clientData['bus_cat2']."/".$cid."/";
				

				echo "<select id='selType".$sno."' disabled='disabled'>\n";
				echo "<option value='AL' "; getSelAttrib("AL", $file['file_type']); echo "/>AL</option>\n";
				echo "<option value='FR' "; getSelAttrib("FR", $file['file_type']); echo "/>FR</option>\n";
				echo "</select>\n";
				

				echo "<td>\n";
				echo "<select id='selPrio".$sno."' disabled='disabled'>\n";
				echo "<option value='HP' "; getSelAttrib("HP", $file['priority']); echo "/>HP</option>\n";
				echo "<option value='MP' "; getSelAttrib("MP", $file['priority']); echo "/>MP</option>\n";
				echo "<option value='LP' "; getSelAttrib("LP", $file['priority']); echo "/>LP</option>\n";
				echo "</select>\n";
				echo "</td>\n";


				echo "<td><input type='text' class='input-text' id='location$sno' disabled='disabled' value='".$file['location']."' /></td>\n";

				echo "<td>\n";
					echo "<input type='hidden' name='id' value='".$file['id']."' />\n";
					echo "<input type='image' onClick='editButton($sno)' id='editSave$sno' src='".base_url('design/ico-edit.gif')."' />\n";
					$sno++;
				echo "</td>\n";

				echo "<td>\n";
				$attrib = array('onsubmit'=>"return confirm('Are you sure you want to remove this file?');");
				echo form_open("filemgmt/remFile",$attrib);
				echo "<input type='hidden' name='id' value='".$file['id']."' />\n";
				echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />\n";
				echo "</form>\n";
				echo "</td>\n";

			
			echo "</tr>\n";
		}
		echo "</table>";
	}
	?>
</fieldset>
<fieldset>
	<legend>Add a new file</legend>
	<?php echo form_open('filemgmt/addFile'); ?>
	<table style="margin: 0px auto;" class="nostyle">
		<tr style="font-weight: bold;">
			<td>S.No.</td>
			<td>File Name - choose file type</td>
			<td>Priority</td>
			<td>Location</td>
		</tr>
		<tr>
			<td><?php echo $fn; ?></td>
			<td>
				<?php echo $clientData['status_cat1']."/";
				echo $clientData['addr1_ds']."/".$clientData['bus_cat2']."/".$cid."/";
				?>
				<select name="file_type">
					<option value="FR">FR Finance & Reports</option>
					<option value="AL">AL Assessment & Litigations</option>
				</select>
			</td>
			<td>
				<select name="priority">
					<option value="HP">High Priority</option>
					<option value="MP">Medium Priority</option>
					<option value="LP">Low Priority</option>
				</select>
			</td>
			<td>
				<input type="text" name="location" class="input-text" required/>
			</td>
			<td>
				<input type="submit" value="Add" class="image-button addsmall" />
			</td>
		</tr>
	</table>
		<input type="hidden" name="fid" value="<?php echo $fid; ?>" />
	</form>
</fieldset>
</div>
</div>