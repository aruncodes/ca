<!-- <table>
<tbody>
	<tr>
		<th> Document</th>
	</tr>

</tbody>
</table>
 -->
<?php
	if($result == FALSE) {
		echo '<p class="msg error"> Client ID doesn\'t exist </p>';
		echo '</div>';
	} else {
?>
<style type="text/css">
	#inward-tab tbody tr td{
		min-width: 250px;
	}
	#subcat td {
		font-weight: bolder;	
	}	
</style>
<table id="inward-tab" style="margin-left: 50px;" <?php if($page != "inward") echo 'class="nostyle"'; ?>>
	<tbody>
	<?php if($page == "inward") { ?>
		<tr id="sub-cat">
			<td>
				Accounts
			</td>
			<td>
				Notices
			</td>
			<td>
				Others
			</td>
		</tr>
	<?php }?>
		<tr>
			<td style="border: 1px solid #cfcfcf;">
				<ul>
				 <?php foreach( $result[0] as $doc) { ?>
				 	<li> <?php echo $doc; ?> </li>
				 <?php } ?>
				 </ul>
			</td>
			<td>
			<?php if($page == "inward") { ?>
				<ul>
				 <?php foreach( $result[1] as $doc) { ?>
				 	<li> <?php echo $doc; ?> </li>
				 <?php } ?>
				 </ul>
				<?php }?>
			</td>
			<td>
			<?php if($page == "inward") { ?>
				<ul>
				 <?php foreach( $result[2] as $doc) { ?>
				 	<li> <?php echo $doc; ?> </li>
				 <?php } ?>
				 </ul>
				 <?php }?>
			</td>
		</tr>
	</tbody>
</table> 
</div>

<?php } ?>