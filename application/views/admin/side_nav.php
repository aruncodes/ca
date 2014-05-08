	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="#"><img src="<?php echo base_url('tmp/logo.gif'); ?>" alt="Our logo" title="Visit Site" /></a></p>

				<!-- Create a new project -->
				<p id="btn-create" class="box"><a href="#"><span>Create a new project</span></a></p>

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
				<?php if(isset($teams)) { 
						echo '<ul>';						
						foreach ($teams as $i) {
							echo '<li><a href="'.base_url('index.php/admin/teamMgmt/'.$i).'"> Team '.$i.'</a></li>';
						}
						echo '<li><a href="'.base_url('index.php/admin/addNewTeam').'">Add New Team</a></li>';
						echo '</ul>';
					}?>					
				<li<?php echo giveSubID('employeeMgmt', $page); ?>><a href="<?php echo base_url('index.php/admin/employeeMgmt'); ?>">Employee Management</a></li>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
