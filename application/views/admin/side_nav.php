	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="#"><img src="<?php echo base_url('tmp/logo.gif'); ?>" alt="Our logo" title="Visit Site" /></a></p>

			</div> <!-- /padding -->

			<?php
				function giveSubID($text, $pg)
				{
					if($pg == $text)
						return " id='submenu-active'";
					else
						return '';
				}

			?>
			<ul class="box">
				<li<?php echo giveSubID('teamMgmt', $page); ?>><a href="<?php echo base_url('index.php/admin/teamMgmt'); ?>">Team Management</a></li>
				<?php echo '<ul>';
					if(isset($teams)) { 						
						foreach ($teams as $i) {
							echo '<li><a href="'.base_url('index.php/admin/teamMgmt/'.$i).'"> Team '.$i.'</a></li>';
						}
					}
					echo '<li><a href="'.base_url('index.php/admin/addNewTeam').'">Add New Team</a></li>';
					echo '</ul>';
					?>					
				<li<?php echo giveSubID('employeeMgmt', $page); ?>><a href="<?php echo base_url('index.php/admin/employeeMgmt'); ?>">Employee Management</a></li>
					<ul><li><a  href="<?php echo base_url('index.php/admin/editUser/new'); ?>">Add User</a></li></ul>
				<li<?php echo giveSubID('delClient', $page); ?>><a href="<?php echo base_url('index.php/admin/deleteClient'); ?>">Client Management</a></li>
					<ul><li><a  href="<?php echo base_url('index.php/admin/generate_xls'); ?>">Export Client List</a></li></ul>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
