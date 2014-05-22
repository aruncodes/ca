<html>
<head><title>Query</title></head>

<body style="text-align: center;">

<?php
	echo form_open('query/display');
	$pages = Array('client', 'doc_names', 'files', 'inout', 'services', 'service_names', 'users');
	foreach ($pages as $page) {
		echo "<input type='radio' name='page' value='$page' />$page <br /> <br />\n";
	}
?>

<input type="password" name="pass" />
<input type="submit" value="Show" />

</form>

</body>
</html>