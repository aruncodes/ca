
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
				<?php if(isset($teams)) {
						foreach ($teams as $i) {
							echo '<li'.giveSubID('team'.$i,$page).'><a href="'.base_url('index.php/projects/existingTeams/'.$i).'"> Team '.$i.'</a></li>';
						}
					}
				?>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
