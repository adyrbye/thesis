<?php

include_once '../thesis/header_v2.php';
include_once '../thesis/sidebar_v2.php';

?>
		<article>
			<h2>All Books, With Researcher Notes</h2>
			<p>This is a listing of all books found on the first bookcase with research notes associated with them.</p>
			<p>To view all books from that bookcase instead, choose 'All Books' from the menu at left.</p>
			<p>All volumes have also been tagged according to subject matter. To view the list of books with associated tags, please choose 'With Tags' from the menu at left, or, to search for all books with a particular tag, choose 'By Tag'.</p>
<?php

$query = 'SELECT books.id AS b_id, books.title, books.format, books.originalyear, books.editionyear, books.publisher, books.isbn, books.notes FROM books WHERE books.notes IS NOT NULL';
$cloud = mysql_query($query, $dbpipeline);

while ($array = mysql_fetch_assoc($cloud)){
	if (!empty($array)) {
		echo '<table class="bookinfo"><tr><td><strong>' . str_replace('&', '&amp;', $array['title']) . '</strong></td><td>';
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
		echo '</td></tr><tr><td colspan="2"><em>Notes:</em> ' . $array['notes'] . '</td></tr></table>';
	}else {
		echo $sampleentry;
 	}
}

?>
		</article>
		
<?php
include_once '../thesis/footer_v2.php';
?>