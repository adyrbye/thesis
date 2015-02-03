<!DOCTYPE html>
<html lang="en">
	<head>
		
<?php

$linkcss= '
		<!--Desktop stylesheet-->
		<link href="../thesis/thesis_stylesheet_v2.css" rel="stylesheet" type="text/css" />		
		<!--iPad (portrait) stylesheet-->
		<link href="../thesis/ipad_portrait.css" rel="stylesheet" type="text/css" media="only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: portrait)" />
		<!--iPad (landscape) stylesheet-->
		<link href="../thesis/ipad_landscape.css" rel="stylesheet" type="text/css" media="only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape)" />';

$altcssA= '
		<link href="../thesis/ipad_portrait.css" rel="stylesheet" type="text/css" />';	
		
$altcssB= '
		<link href="../thesis/ipad_landscape.css" rel="stylesheet" type="text/css" />';	

echo $linkcss;
?>		

			
		<!--Meta information for character set, search engine optimization (SEO)-->
		<meta charset="UTF-8" /> 
		<!--Link to a free web font from Google Web Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,700,400italic' rel='stylesheet' type='text/css'>
		<title>
		
<?php

$title='Reconstructing Lives Project';
$subtitle='Page by Page: 21st Century Lives Revealed by the Books of the House of the Books';

echo $title;

?>

		</title>
	</head>
	<body>
		<div id="banner"></div>
		<header>
			<a href="home_v2.php">
			
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
			</a>
		</header>