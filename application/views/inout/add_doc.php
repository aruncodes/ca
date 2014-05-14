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



<!-- Delete a user added document name -->
<?php echo form_open('inout/rem_doc'); ?>
<?php
$redCross = "<img src = '".base_url("design/ico-delete.gif")."'></img>";
?>
<fieldset>
<legend>Delete a User Added Document</legend>
	<table style='margin:0px auto;'>
	<tr>
	<td>
		<table name="inward" style='border:1px solid black; margin-right: 30px'>
		<tr>
			<th colspan="3" style='border-bottom: 1px solid black;'>Inward Documents</th>
		</tr>
		<tr>
			<td>
				<table name="accountDocs" style='margin-right: 30px;'>
					<tr>
						<th style='border-bottom: 1px solid black;' colspan=2>Account Documents</th>
					</tr>
					<?php foreach($inward[0] as $doc) {?>
						<tr>
						<td><?php echo $doc[1]; ?></td>
						<td><a href="<?php echo base_url('index.php/inout/rem_doc').'/'.$doc[0]; ?>"><?php if($doc[0]>0) echo $redCross; ?></a></td>
						</tr>
					<?php } ?>
				</table>
			</td>
			<td>
				<table name="noticeDocs" style='margin-right: 30px;'>
					<tr>
						<th style='border-bottom: 1px solid black;' colspan=2>Notice Documents</th>
					</tr>
					<?php foreach($inward[1] as $doc) { ?>
						<tr>
						<td><?php echo $doc[1]; ?></td>
						<td><a href="<?php echo base_url('index.php/inout/rem_doc').'/'.$doc[0]; ?>"><?php if($doc[0]>0) echo $redCross; ?></a></td>
						</tr>
					<?php } ?>
				</table>
			</td>
			<td>
				<table name="otherDocs" style='margin-right: 30px;'>
					<tr>
						<th style='border-bottom: 1px solid black;' colspan=2>Other Documents</th>
					</tr>
					<?php foreach($inward[2] as $doc) { ?>
						<tr>
						<td><?php echo $doc[1]; ?></td>
						<td><a href="<?php echo base_url('index.php/inout/rem_doc').'/'.$doc[0]; ?>"><?php if($doc[0]>0) echo $redCross; ?></a></td>
						</tr>
					<?php } ?>
				</table>
			</td>
		</tr>
		</table>
	</td>
	<td>
		<table name="outward" style='border:1px solid black;'>
			<tr>
				<th style='border-bottom: 1px solid black;' colspan=2>Outward Documents</th>
			</tr>
			<?php foreach($outward[0] as $doc) { ?>
				<tr>
				<td><?php echo $doc[1]; ?></td>
				<td><a href="<?php echo base_url('index.php/inout/rem_doc').'/'.$doc[0]; ?>"><?php if($doc[0]>0) echo $redCross; ?></a></td>
				</tr>
			<?php } ?>
		</table>
	</td>
	</tr>
</table>
</fieldset>
</form>

</div>