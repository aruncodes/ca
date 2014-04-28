<html>
<head>
	<title>LOGIN</title>
</head>

<body>

<?php echo form_open('login/details'); ?>
	<table>
		<tr>
			<td>Username:</td><td><input type="text" name="uname" required="required"/></td>
		</tr>
		<tr>
			<td>Password:</td><td><input type="password" name="pass" required="required"/></td>
		</tr>
	</table>
	<p> <input type="submit" value="Sign in" /> </p>
</form>
	<a href="<?php echo base_url('index.php/login/forgotpass'); ?>">Forgot Password</a>

</body>

</html>