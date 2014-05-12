<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">
			<strong>Company Name</strong>
		</p>

		<p class="f-right">
			Logged in: <strong><a href="<?php echo base_url('index.php/userControl/showUser'); ?>"><?php echo $this->session->userdata('uname'); ?></a></strong>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong> <a href="<?php echo base_url('index.php/userControl'); ?>">Account settings</a> </strong>
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

		<ul class="box" style="margin:0px auto; width:700px;">
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
