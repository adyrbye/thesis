<?php

include_once '../thesis/header_v2.php';
include_once '../thesis/sidebar_v2.php';

?>
		<article>
			<h2>All Books</h2>
			<p>This is a listing of all books found on the first bookcase to be catalogued from the House of the Books.</p>
			<p>Some books have research notes associated with them. To view the list of books with notes, please choose 'With Research Notes' from the menu at left.</p>
			<p>All volumes have also been tagged according to subject matter. To view the list of books with associated tags, please choose 'With Tags' from the menu at left, or, to search for all books with a particular tag, choose 'By Tag'.</p>

<?php

$query = 'SELECT books.id AS b_id, books.title, books.format, books.originalyear, books.editionyear, books.publisher, books.isbn FROM books';
$cloud = mysql_query($query, $dbpipeline);

//adapting the 'bytag' solution to echoing out the entire bookshelf
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
		echo '<tr><td colspan="2"><em>Publisher:</em> ' . str_replace('&', '&amp;', $array['publisher']) . '</td></tr></table>';
	}else {
		echo $sampleentry;
 	}
}

?>
		</article>
		
<?php
include_once '../thesis/footer_v2.php';
?>