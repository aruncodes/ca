
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
				<li<?php echo giveSubID('existingTeams', $page); ?>><a href="<?php echo base_url('index.php/projects/existingTeams'); ?>">Existing Teams</a></li>
				<?php if(isset($teams)) { echo '<ul>';
						//for($i = 1; $i <= $teams; $i++) {
						foreach ($teams as $i) {
							echo '<li><a href="'.base_url('index.php/projects/existingTeams/'.$i['teamid']).'"> Team '.$i['teamid'].'</li>';
						}
					 echo '</ul>'; }?>

				<li<?php echo giveSubID('addNewTeam', $page); ?>><a href="<?php echo base_url('index.php/projects/addNewTeam'); ?>">Add New Team</a></li>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
