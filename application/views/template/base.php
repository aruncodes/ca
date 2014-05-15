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
	<style type="text/css">
/*	div#menu  ul.box li {
		list-style-type: none;
	    text-align: center;
	    float: left;
	    width: 16%;
	}*/
	div#menu  ul.box li span {
		min-width: 100px;
		max-width: 175px;
	}

	</style>
	<div id="menu" class="box">

		<ul class="box" >

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
