
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

				$inward_url = 'index.php/inout';
				$outward_url = 'index.php/inout';
				$add_doc_url =  'index.php/inout/add_doc';
				if(isset($cid)) {
					$inward_url .= '/show/in/'.$cid;
					$outward_url .= '/show/out/'.$cid;
					$add_doc_url .= '/'.$cid;
				} else {
					$inward_url .= '/inward';
					$outward_url .= '/outward';
				}

			?>
			<ul class="box">
				<li<?php echo giveSubID('inward', $page); ?>><a href="<?php echo base_url($inward_url); ?>">Inward</a></li>
				<li<?php echo giveSubID('outward', $page); ?>><a href="<?php echo base_url($outward_url); ?>">Outward</a></li>
				<li<?php echo giveSubID('add_doc', $page); ?>><a href="<?php echo base_url($add_doc_url); ?>">Modify Documents</a></li>
			</ul>

		</div> <!-- /aside -->

		<hr class="noscreen" />
