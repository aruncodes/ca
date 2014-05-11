<div id='content'>
<h1>Client List</h1>

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
	function Client(cid,name,cmpname,retAddr) {
		this.cid = cid;
		this.name = name;
		this.cmpname = cmpname;
		this.retAddr = retAddr;
		this.delAddr = "<?php echo base_url('index.php/admin/deleteClient').'/'; ?>"+cid;
	}
	clients = new Array();
	<?php
	$n = count($cids);
	echo "var n = $n\n";
	for($i = 0; $i < $n; $i++) {
		$retAddr = base_url("index.php/clientdb/setSession")."/".$cids[$i]['cid'];
		$arg = $cids[$i]['cid'].',"'.$cids[$i]['name'].'","'.$cids[$i]['cmpname'].'","'.$retAddr.'"';
		echo "clients[$i] = new Client(".$arg.");\n";
	}
	?>

	function search()
	{
		clearTable();
		var sTerm = document.getElementById("search").value.toLowerCase();
		if(sTerm == ""){
			populateAll();
			return;
		}
		
		var table = document.getElementById('clientsList');
		var row, cell1, cell2, cell3, name;
		var tIndex = 1;
		
		for(var i = 0; i < n; i++) {
			name = clients[i].name.toLowerCase();
			if(name.indexOf(sTerm) != -1) {
				row = table.insertRow(tIndex++);
				cell1 = row.insertCell(0);
				cell2 = row.insertCell(1);
				cell3 = row.insertCell(2);
				cell4 = row.insertCell(3);

				cell1.innerHTML = "<a href='"+clients[i].retAddr+"'>"+clients[i].cid+"</a>";
				cell2.innerHTML = clients[i].name;
				cell3.innerHTML = clients[i].cmpname;
				cell4.innerHTML = "<a href='"+clients[i].delAddr+"'>"+"<?php echo $redCross; ?>"+"</a>";
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

	function populateAll()
	{
		var table = document.getElementById('clientsList');
		var row, cell1, cell2, cell3;
		for(var i = 0; i < n; i++) {
			row = table.insertRow(i+1);
			cell1 = row.insertCell(0);
			cell2 = row.insertCell(1);
			cell3 = row.insertCell(2);
			cell4 = row.insertCell(3);

			cell1.innerHTML = "<a href='"+clients[i].retAddr+"'>"+clients[i].cid+"</a>";
			cell2.innerHTML = clients[i].name;
			cell3.innerHTML = clients[i].cmpname;
			cell4.innerHTML = "<a href='"+clients[i].delAddr+"'>"+"<?php echo $redCross; ?>"+"</a>";
		}
	}
</script>

<table class="nostyle" style="margin: 0px auto;">
<tr>
	<td style="font-size: 1.3em;">Search : </td>
	<td><input id="search" type="text" placeholder="Search by name" class="input-text" autofocus="autofocus" onkeyup="search();" /></td>
</tr>
</table>

<br /><br />

<table style="margin:0px auto" border=1 id="clientsList">
	<thead>
	<tr>
		<th>Client ID</th>
		<th>Client Name</th>
		<th>Company Name</th>
		<th>Del</th>
	</tr>
	</thead>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
	populateAll();
</script>

</div>