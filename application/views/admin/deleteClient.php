<div id='content'>
<fieldset>
	<legend>Client List</legend>

<?php
if(isset($error)) {
	echo "<p>No clients available</p>\n";
	echo "</div>\n";
	return;
}
?>

<br />

<?php
	$redCross = "<img src = '".base_url("design/ico-delete.gif")."'></img>";
?>

<script type="text/javascript">
	function Client(cid,name,cmpname,status_cat1,retAddr) {
		this.cid = cid;
		this.name = name;
		this.cmpname = cmpname;
		this.retAddr = retAddr;
		this.ls = status_cat1;
		this.delAddr = "<?php echo base_url('index.php/admin/deleteClient').'/'; ?>"+cid;
	}
	clients = new Array();
	<?php
	$n = count($cids);
	echo "var n = $n\n";
	for($i = 0; $i < $n; $i++) {
		$retAddr = base_url("index.php/clientdb/setSession")."/".$cids[$i]['cid'];
		$arg = $cids[$i]['cid'].',"'.$cids[$i]['name'].'","'.$cids[$i]['cmpname'].'","'.$cids[$i]['status_cat1'].'","'.$retAddr.'"';
		echo "clients[$i] = new Client(".$arg.");\n";
	}
	?>

	function search()
	{
		clearTable();
		var sTerm = document.getElementById("search").value.toLowerCase();
		
		var table = document.getElementById('clientsList');
		var row, cell1, cell2, cell3, name, cmpname, lsSel;
		var tIndex = 1;
		
		lsSel = document.getElementById('legalStr').value;
		for(var i = 0; i < n; i++) {
			name = clients[i].name.toLowerCase();
			cmpname = clients[i].cmpname.toLowerCase();
			if(lsSel == "AL" || lsSel == clients[i].ls) {
				if(name.indexOf(sTerm) != -1 || cmpname.indexOf(sTerm) != -1) {
					row = table.insertRow(tIndex++);
					cell1 = row.insertCell(0);
					cell2 = row.insertCell(1);
					cell3 = row.insertCell(2);
					cell4 = row.insertCell(3);
					cell5 = row.insertCell(4);

					cell1.innerHTML = "<a href='"+clients[i].retAddr+"'>"+clients[i].cid+"</a>";
					cell2.innerHTML = clients[i].name;
					cell3.innerHTML = clients[i].cmpname;
					cell4.innerHTML = clients[i].ls;
					cell5.innerHTML = "<a href='"+clients[i].delAddr+"' onclick=\"return confirm('Are you sure you want to remove this client?');\">"+"<?php echo $redCross; ?>"+"</a>";
				}
			}
		}
	}

	function clearTable()
	{
		var table = document.getElementById('clientsList');
		var rowCount = table.rows.length;
		for(var i = rowCount-1; i > 0; i--)
			table.deleteRow(i);
	}

</script>

<table class="nostyle" style="margin: 0px auto;">
<tr>
	<td style="font-size: 1.3em;">Search : </td>
	<td><input id="search" type="text" placeholder="name/company" class="input-text" autofocus="autofocus" onkeyup="search();" /></td>
	<td>
		<select style="height:30px" id="legalStr" onchange="search();">
		<option value="AL" selected="selected">All</option>
		<option value="LB">LLB</option>
		<option value="FM">Firm</option>
		<option value="CO">Company</option>
		<option value="IL">Individual</option>
		<option value="TR">Trust</option>
		</select>
	</td>
</tr>
</table>

<br /><br />

<table style="margin:0px auto" border=1 id="clientsList">
	<thead>
	<tr>
		<th>Client ID</th>
		<th>Client Name</th>
		<th>Company Name</th>
		<th>Legal Structure</th>
		<th>Del</th>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	search();
</script>
</fieldset>
</div>