<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<title>
		
<?php

$title='Reconstructing Lives Project';
$subtitle='Page by Page: 21st Century Lives Revealed by the Books of the House of the Books';
$sampleentry = '<p>Sample book entry:</p><table class="bookinfo"><tr><td width="200">A Fabulous Book Lost to the Vagaries of Time, Now Rediscovered</td> <td width="200">McGillicuddy, Thomas<br />Arglefraster, Annmarie<br />Boobadoocat, Velcro<br />Snugglemonkey, Persephone</td></tr> <tr><td>Originally Published: 1987</td> <td>This Edition Published: 2009</td> </tr> <tr><td>ISBN: 1234567890123</td> <td>Format: Hardcover</td></tr> <tr><td colspan="2">Publisher: Publisher Name Here</td></tr></table>';

echo $title;

?>

		</title>
		<link href="../thesis/thesis_stylesheet.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div id="banner"></div>
		<div id="header">
			
			<?php
				$dbpipeline = mysql_pconnect('localhost', 'adyrbye', 'REDACTED')
				or die('Error! Error!');

				$db = mysql_select_db('adyrbye');
			
				if ($db == true) {
				echo '<h1>' . $subtitle . '</h1>';
				} else {
				echo '<p><h1>The ' . $title . ' is currently unavailable. Please try again later.</h1></p>';
				}  
			?> 
			
		</div>
		<br />