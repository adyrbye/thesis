<?php

include_once '../thesis/thesisheader.php';
include_once '../thesis/sidebar.php';
?>
		<div id="main">
			<h2>Log In</h2>
			<p>This is the entry page for the mock data entry form.</p>
			
			<form name="mocklogin" action="form.php" method="post">
				<p>Username: 
					<input name="user" type="text" id="user" size="5" maxlength="5" />
				</p>
				<p>Password: 
					<input name="pwd" type="password" id="pwd" size="12" maxlength="12" />
				</p>
				<p>
					<input type="submit" name="submit" value="Log in" />
					<input name="reset" type="reset" id="reset" value="Clear form" />
				</p>
			</form>
		</div>

<?php
include_once '../thesis/thesisfooter.php';
?>