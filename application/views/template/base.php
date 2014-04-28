<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="<?php echo base_url('design/switcher-1col.gif'); ?>" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="<?php echo base_url('design/switcher-2col.gif'); ?>" alt="2 Columns" /></a>
			</span>

			Project: <strong>Your Project</strong>

		</p>

		<p class="f-right">
			User: <strong><a href="#"><?php echo $this->session->userdata('uname'); ?></a></strong>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong> <a href="#">Account settings</a> </strong>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong><a href="<?php echo base_url('index.php/login/logout'); ?>" id="logout">Log out</a></strong>
		</p>

	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box">
			<li id="menu-active"><a href="#"><span>Page 1</span></a></li> <!-- Active -->
			<li><a href="#"><span>Page 2</span></a></li>
			<li><a href="#"><span>Page 3</span></a></li>
		</ul>

	</div> <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">

				<!-- Logo (Max. width = 200px) -->
				<p id="logo"><a href="#"><img src="<?php echo base_url('tmp/logo.gif'); ?>" alt="Our logo" title="Visit Site" /></a></p>

				<!-- Search -->
<!--				<form action="#" method="get" id="search">
					<fieldset>
						<legend>Search</legend>

						<p><input type="text" size="17" name="" class="input-text" />&nbsp;<input type="submit" value="OK" class="input-submit-02" /><br />
						<a href="javascript:toggle('search-options');" class="ico-drop">Advanced search</a></p>

						
						<div id="search-options" style="display:none;">

							<p>
								<label><input type="checkbox" name="" checked="checked" /> Option I.</label><br />
								<label><input type="checkbox" name="" /> Option II.</label><br />
								<label><input type="checkbox" name="" /> Option III.</label>
							</p>

						</div> <!-- /search-options ->

					</fieldset>
				</form>
-->
				<!-- Create a new project -->
				<p id="btn-create" class="box"><a href="#"><span>Create a new project</span></a></p>

			</div> <!-- /padding -->

			<?php
				function giveID($text, $pg)
				{
					if($pg == $text)
						return " id='submenu-active'";
					else
						return '';
				}

			?>
			<ul class="box">
				<li<?php echo giveID('clientdb', $page); ?>><a href="<?php echo base_url('index.php/clientdb'); ?>">Client Database</a></li>
				<li<?php echo giveID('inout', $page); ?>><a href="<?php echo base_url('index.php/inout'); ?>">Inward/Outward</a></li>
				<li<?php echo giveID('filemgmt', $page); ?>><a href="<?php echo base_url('index.php/filemgmt'); ?>">File Management</a></li>
				<li<?php echo giveID('svcs', $page); ?>><a href="<?php echo base_url('index.php/svcs'); ?>">Services</a></li>
				<li<?php echo giveID('projects', $page); ?>><a href="<?php echo base_url('index.php/projects'); ?>">Projects</a></li>
				<?php
					if($this->session->userdata('isa') == 'y') {
						echo "<li";
						echo giveID('admin', $page);
						echo "><a href='";
						echo base_url('index.php/admin', $page);
						echo "'>Administration</a></li>\n";
					}
				?>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
