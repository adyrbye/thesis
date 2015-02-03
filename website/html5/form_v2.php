<?php

include_once '../thesis/header_v2.php';
include_once '../thesis/sidebar_v2.php';

$username = 'admin';
$password = 'arglefraster';

$form = '
		<article>
			<h2>Enter a New Book</h2>
			<p>This is a mock data entry form, with a selection of the fields that would be required for the real deal. It exists solely to test the behaviour of a variety of form elements, not to pass data to the site database.</p>
			
			<form name="mockentry" action="form_v2.php" method="post">
				<p>Title: <br />
					<input name="title" type="text" id="title" size="50" maxlength="100" autocorrect="off" autocapitalize="off" />
				</p>
				<p>Writer (Last, First): <br />
					<input name="writer" type="text" id="writer" size="50" maxlength="50" autocorrect="off" autocapitalize="off"/>
				</p>
				<p>Year This Edition Published: <br />
					<input name="edition_year" type="text" id="edition_year" size="4" maxlength="4" />
				</p>				
				<p>ISBN: <br />
					<input name="isbn" type="text" id="isbn" size="13" maxlength="13" />
				</p>
				<p>Format: <br />
   					<input class="radio" type="radio" name="format" value="hardcover" /> hardcover<br />
    				<input class="radio" type="radio" name="format" value="trade paperback" /> trade paperback<br />
    				<input class="radio" type="radio" name="format" value="mass market paperback" /> mass market paperback</p>
				<p>Tag with: <br />
    				<input class="check" name="allegory" type="checkbox" id="allegory" value="yes">allegory<br />
    				<input class="check" name="biology" type="checkbox" id="biology" value="yes">biology<br />
    				<input class="check" name="cultural studies" type="checkbox" id="cultural_studies" value="yes">cultural studies<br />
    				<input class="check" name="digital humanities" type="checkbox" id="digital_humanities" value="yes">digital humanities<br />
    				<input class="check" name="ethics" type="checkbox" id="ethics" value="yes">ethics<br />  						    											
					<input class="check" name="feminism" type="checkbox" id="feminism" value="yes">feminism<br />
					<input class="check" name="genetics" type="checkbox" id="genetics" value="yes">genetics<br />
    				<input class="check" name="history" type="checkbox" id="history" value="yes">history<br />
    				<input class="check" name="literary criticism" type="checkbox" id="literery_criticism" value="yes">literary criticism<br />
    				<input class="check" name="middle ages" type="checkbox" id="middle_ages" value="yes">middle ages<br />
    				<input class="check" name="nature" type="checkbox" id="nature" value="yes">nature<br />
				</p>
				<p>
				<textarea type="text" name="notes" cols="50" rows="4" id="notes" autocorrect="off" autocapitalize="off">This space provided for research notes.</textarea>
				</p>
				<p>
					<input class="button" type="submit" name="submit" value="Submit" />
					<input class="button" name="reset" type="reset" id="reset" value="Clear form" />
				</p>
			</form>

		</article>';

if ($_POST['user']==$username){
	if ($_POST['pwd']==$password){
		echo $form;
	}else{
		echo '<article><p><strong>Bad username or password.</strong></p><p>Use the log in link in the footer to try again, or try the navigation bar at left to choose a different page.</p></article>';
	}
}

include_once '../thesis/footer_v2.php';

?>