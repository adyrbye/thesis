<?php

include_once '../thesis/thesisheader.php';
include_once '../thesis/sidebar.php';

?>
		<div id="main">
			<h2>All Books, With All Associated Information</h2>
			<p>This is a 'kitchen sink' listing of all books found on the first bookcase. All information currently known about a given book is included here.</p>
			<p>To view a listing of all books emphasizing publication details instead, choose 'All Books' at left.</p>
			<p>To view a listing of all books with research notes, please choose 'With Research Notes' at left.</p>
			<p>To view books by tag, please choose 'By Tags' at left.</p>
<?php

$query = 'SELECT books.id AS b_id, books.title, books.format, books.originalyear, books.editionyear, books.publisher, books.isbn, books.notes FROM books ORDER BY books.title';
$cloud = mysql_query($query, $dbpipeline);

while ($array = mysql_fetch_assoc($cloud)){
	if (!empty($array)) {
		echo '<table class="bookinfo"><tr><td width="200"><strong>' . str_replace('&', '&amp;', $array['title']) . '</strong></td><td width="200">';
		//adding second query for writer names
		$select_writers = 'SELECT books.id, writers.name AS wname FROM books, writers, bookstowriters WHERE books.id=bookstowriters.book_id AND writers.id=bookstowriters.writer_id AND books.id="' . $array['b_id'] . '"';
		$writers_selected = mysql_query($select_writers, $dbpipeline);
		while ($writers_array = mysql_fetch_assoc($writers_selected)){
			if (!empty($writers_array)){
				echo $writers_array['wname'] . '<br />';
			}
		}
		echo '</td></tr><tr><td ><em>Originally Published:</em> ';
		if ($array['originalyear'] != NULL) {
			echo $array['originalyear'];
			} else {
			echo 'n/a';
			}
		echo '</td><td><em>Edition Published</em>: ';
		if ($array['editionyear'] != NULL) {
			echo $array['editionyear'];
			} else {
			echo 'n/a';
			}
		echo '</td></tr><tr><td><em>ISBN:</em> ';
		if ($array['isbn'] != NULL) {
			echo $array['isbn'];
			} else {
			echo 'n/a';
			}
		echo '</td><td><em>Format:</em> ' . $array['format'] . '</td></tr>';
		echo '<tr><td colspan="2"><em>Publisher:</em> ' . str_replace('&', '&amp;', $array['publisher']) . '</td></tr><tr><td colspan="2"><em>Marginalia:</em> ';
		//adding third query for marginalia info
		$select_marginalia = 'SELECT books.id, books.marginalia_id, marginalia.category FROM books, marginalia WHERE books.marginalia_id=marginalia.id AND books.id="' . $array['b_id'] . '"';
		$marginalia_selected = mysql_query($select_marginalia, $dbpipeline);
		while ($marginalia_array = mysql_fetch_assoc($marginalia_selected)){
			if (!empty($marginalia_array)){
				echo $marginalia_array['category'] . '<br />';
			}
		}
		echo '</td></tr><tr><td colspan="2"><em>Notes:</em> ';
		if ($array['notes'] != NULL) {
			echo $array['notes'];
			} else {
			echo 'n/a';
			}
		echo '</td></tr><tr><td colspan="2"><em>Tagged With:</em> |';
		//adding in a fourth query for tags; UNDER DEVELOPMENT
		$select_tags = 'SELECT books.id, tags.name AS tname FROM books, tags, bookstagged WHERE books.id = bookstagged.book_id AND tags.id = bookstagged.tag_id AND books.id="' . $array['b_id'] . '" ORDER BY tags.name';
		$tags_selected = mysql_query($select_tags, $dbpipeline);
		while ($tags_array = mysql_fetch_assoc($tags_selected)){
			if (!empty($tags_array)){
				echo ' ' . str_replace('&', '&amp;',$tags_array['tname']) . ' |';
			}
		}
		echo '</td></tr></table>';
	}else {
		echo $sampleentry;
 	}
}

?>
		</div>
		
<?php
include_once '../thesis/thesisfooter.php';
?>