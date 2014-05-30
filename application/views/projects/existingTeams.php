<div id="content" class="box">
	<fieldset>
	<legend> Team <?php echo $teamid; ?> </legend>
	<?php if(isset($msg)) echo $msg; ?>
	<table>
		<tr>
			<th>
				Team Members
			</th>
			<th>
				Clients
			</th>
		</tr>
		<tr>
			<td>
				<table class="nostyle">
					<?php 
					if(count($members) == 0)
						echo '<tr><td> No employees found! </td></tr>';					
					foreach ($members as $mem) {
						echo '<tr><td>';
						echo $mem['name'];
						echo '</td></tr>';
					}
					
					?>
				</table>
			</td>
			<td>
				<table class="nostyle">
					<?php
					if(count($clients) == 0)
						echo '<tr><td> No clients found! </td></tr>';
					$p = 0;
					$rows = 10;
					echo '<tr>';
					foreach ($clients as $client) {
						if($p % $rows == 0) {
							echo '<td><table name="cpage" class="nostyle" id="tab'.($p/$rows).'">';
						}
						echo '<tr><td>';
						echo '<a href="'.base_url('index.php/clientdb/setSession/'.$client['cid']).'">'.$client['cid'].'</a> - '.$client['name'].' - <i>'.$client['cmpname'].'</i>';
						echo '</td><td>';
						$attrib = array('onsubmit'=>"return confirm('Are you sure you want to remove this client from team?');");
						echo form_open('admin/removeClient/'.$teamid,$attrib);
						echo "<input type='hidden' name='cid' value='".$client['cid']."' />";
						echo "<input type='image' src='".base_url('design/ico-delete.gif')."' />";
						echo form_close();
						echo '</td></tr>';

						$p += 1;
						if($p % $rows == 0) {
							echo '</table></td>';
						}
					}
					if($p % $rows != 0) echo '</table></td>';
					echo '</tr>';

					if($p > $rows) {
						echo '<table class="nostyle"  style="margin:5px auto;"><tr><td>';
							echo 'Pages : ';
								for ($i=0; $i < $p/$rows; $i++) { 
									echo '<a style="padding:0px 5px;" href="#" onclick="hideAll();show('.$i.');">'.($i+1).'</a>';
								}
						echo '</td></tr></table>';
					}

					if(count($non_clients) > 0) {
						echo '<table style="margin:5px auto;" class="nostyle"><tr style="height:15px;"> <td colspan="2"></td><tr>';
						echo form_open('admin/addClient/'.$teamid);
						echo '<tr class="add-row"><td>';
						echo '<select name="cid">';
						foreach($non_clients as $mem) {
							echo '<option value="'.$mem['cid'].'">'.$mem['cid'].' - '.$mem['name'].' - <i>'.$mem['cmpname'].'</i>'.'</option>';						
						}
						echo '</select>';
						echo "</td><td><input type='submit' value ='Add' class='image-button addsmall' />";
						echo '</td></tr></table>';
						echo form_close();
					}
					?>
				</table>
			</td>
		</tr>
	</table>
	<script type="text/javascript">
	function hideAll() {
		var tables = document.getElementsByName('cpage');
		for (var i = 0; i < tables.length; i++) {
			tables[i].style.display='none';
		};
	}

	function show(id) {
		tab = document.getElementById('tab'+id);
		tab.style.display = 'block';
		//alert('shown tab'+id)
	}

	hideAll();
	show(0);
	</script>
	</fieldset>
</div>