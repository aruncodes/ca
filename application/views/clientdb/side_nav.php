
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
				<li<?php echo giveSubID('existingClient', $page); ?>><a href="<?php echo base_url('index.php/clientdb/existingClient'); ?>">Existing Client</a></li>
				<li<?php echo giveSubID('addNewClient', $page); ?>><a href="<?php echo base_url('index.php/clientdb/addClient'); ?>">New Client</a></li>
				<li<?php echo giveSubID('listClients', $page); ?>><a href="<?php echo base_url('index.php/clientdb/listClients'); ?>">Search Clients</a></li>
				<ul><li><a  href="<?php echo base_url('index.php/admin/generate_xls'); ?>">Export Client List</a></li></ul>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
