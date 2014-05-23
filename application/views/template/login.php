<div id="main" style="padding-top:100px; min-width:500px; position:relative; width:500px; margin:0PX auto">

	<!-- Columns -->
	<div id="cols" class="box loginbox">

		<!-- Content (Right Column) -->
		<div id="content" class="box loginfield">

			<h1><?php echo $company_name; ?></h1>
				<?php
				if(isset($error))
					echo "<p class='msg error'>$error</p>\n";
				?>
				<?php
					if(isset($info))
						echo "<p class='msg info'>$info</p>\n";
				?>
				<?php echo form_open('login/details'); ?>
	<fieldset>
				<legend>Login</legend>
				<table class="nostyle">
					<tr>
						<td style="width:70px;">Username:</td>
						<td><input type="text" size="40" name="uname" class="input-text" required="required" autofocus="autofocus" <?php
							if(isset($uname)) echo "value = '$uname' ";
						?>/></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" size="40" name="pass" class="input-text" required="required" /></td>
					</tr>					
					<tr>
						<td colspan="2" class="t-right"><input type="submit" class="input-submit" value="Sign in" /></td>
					</tr>
				</table>
				</form>
				<a href="<?php echo base_url('index.php/login/forgotpass'); ?>">Forgot Password</a>
			</fieldset>
			
		</div> <!-- /content -->
