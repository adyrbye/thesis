<?php

include_once '../thesis/header_v2.php';
include_once '../thesis/sidebar_v2.php';
?>
		<article>
		
			<h2>Log In</h2>
			<p>This is the entry page for the mock data entry form.</p>
			
			<form name="mocklogin" action="form_v2.php" method="post">
				<p>Username: 
					<input name="user" type="text" id="user" size="5" maxlength="5" autocorrect="off" autocapitalize="off" />
				</p>
				<p>Password: 
					<input name="pwd" type="password" id="pwd" size="12" maxlength="12" autocorrect="off" autocapitalize="off" />
				</p>
				<p>
					<input class="button" type="submit" name="submit" value="Log in" />
					<input class="button" name="reset" type="reset" id="reset" value="Clear form" />
				</p>
			</form>
		</article>

<?php
include_once '../thesis/footer_v2.php';
?>