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


			<?php
				function giveID($text, $pg)
				{
					if($pg == $text)
						return " id='menu-active'";
					else
						return '';
				}

			?>

	<!-- Menu -->
	<div id="menu" class="box">

		<ul class="box">
			<li<?php echo giveID('clientdb', $page); ?>><a href="<?php echo base_url('index.php/clientdb'); ?>"><span>Client Database</span></a></li>
			<li<?php echo giveID('inout', $page); ?>><a href="<?php echo base_url('index.php/inout'); ?>"><span>Inward/Outward</span></a></li>
			<li<?php echo giveID('filemgmt', $page); ?>><a href="<?php echo base_url('index.php/filemgmt'); ?>"><span>File Management</span></a></li>
			<li<?php echo giveID('svcs', $page); ?>><a href="<?php echo base_url('index.php/services'); ?>"><span>Services</span></a></li>
			<li<?php echo giveID('projects', $page); ?>><a href="<?php echo base_url('index.php/projects'); ?>"><span>Projects</span></a></li>
			<?php
				if($this->session->userdata('isa') == 'y') {
					echo "<li";
					echo giveID('admin', $page);
					echo "><a href='";
					echo base_url('index.php/admin', $page);
					echo "'><span>Administration</span></a></li>\n";
				}
			?>
			
		</ul>

	</div> <!-- /header -->
