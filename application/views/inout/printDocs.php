<div id = "content">

<h2>Acknowledgment</h2>
<?php echo form_open('clientdb/forgotCID/show');?>
<table style='margin:0px auto' class="nostyle" style="margin-bottom: 25px;">
		<tbody>
		<tr>
			<td>Name of the Personnel </td>
			<td><?php echo $client['name']; ?></td>
		</tr>
		
		<tr>
			<td>Company Name </td>
			<td><?php echo $client['cmpname']; ?></td>
		</tr>
		
		<tr>
			<td>Client ID </td>
			<td><?php echo $client['cid']; ?></td>
		</tr>
		
		<tr>
			<td>Legal Structure </td>
			<td><?php echo $client['status_cat1']; ?></td>
		</tr>
		
		<tr>
			<td>Office Address </td>
			<td><?php echo $client['addr1_gn']." <br />\n"; ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php
					echo $client['addr1_ds']." <br />\n";
					echo $client['addr1_st']." <br />\n";
					echo $client['addr1_pin']." <br />\n";
			?>
			</td>
		</tr>

		<tr>
			<td>Phone numbers </td>
			<td><?php echo $client['phnos'] ?></td>
		</tr>
	</tbody>
</table>

<h3>Documents Details</h3>

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
						<th style='border-bottom: 1px solid black;'>Account Documents</th>
					</tr>
					<?php foreach($inward[0] as $doc)
						echo '
						<tr>
						<td>'.$doc[1].'</td>
						</tr>
						';
					?>
				</table>
			</td>
			<td>
				<table name="noticeDocs" style='margin-right: 30px;'>
					<tr>
						<th style='border-bottom: 1px solid black;'>Notice Documents</th>
					</tr>
					<?php foreach($inward[1] as $doc)
						echo '
						<tr>
						<td>'.$doc[1].'</td>
						</tr>
						';
					?>
				</table>
			</td>
			<td>
				<table name="otherDocs" style='margin-right: 30px;'>
					<tr>
						<th style='border-bottom: 1px solid black;'>Other Documents</th>
					</tr>
					<?php foreach($inward[2] as $doc)
						echo '
						<tr>
						<td>'.$doc[1].'</td>
						</tr>
						';
					?>
				</table>
			</td>			
		</tr>
		</table>
	</td>
	<td>
		<table name="outward" style='border:1px solid black;'>
			<tr>
				<th style='border-bottom: 1px solid black;'>Outward Documents</th>
			</tr>
			<?php foreach($outward[0] as $doc)
				echo '
				<tr>
				<td>'.$doc[1].'</td>
				</tr>
				';
			?>
		</table>
	</td>
	</tr>
</table>

<style type="text/css">
	h2,h3 {
		 text-decoration: underline;
	}
	td {
		vertical-align: top;
    }
	body {
		text-align: center;
	}
</style>
</div>
</body>
</html>