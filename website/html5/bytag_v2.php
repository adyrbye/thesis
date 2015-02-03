<?php

include_once '../thesis/header_v2.php';
include_once '../thesis/sidebar_v2.php';

$query = 'SELECT tags.name FROM tags ORDER BY name';
$cloud = mysql_query($query, $dbpipeline);

?>

		<article>
			<h2>View Books by Tag</h2>
			<p>Select a tag from the drop-down list to view all books associated with that tag.</p>
			<form id="selecttag" method="post" action="bytag_v2.php">
				<select name="tag" id="tag">
					<option value="choose_tag" selected="selected">Choose tag</option>
					<?php 
						$i = 0;
						while ($array = mysql_fetch_assoc($cloud)){
							do {
								if ($array != NULL) {
									echo "<option value='" . $array['name'] . "'>" . $array['name'] . "</option>";
									break;
								} else {
									echo "<option value='invalid'>Invalid!</option>";
									break;
								}
							} while ($i < count($array));
							$i++;
						}
					?>
				</select>
				<input class="tagbutton" type="submit" name="Submit" value="Submit" />
			</form>
			
			<?php

			$select_books = 'SELECT books.title, books.format, books.originalyear, books.editionyear, books.publisher, books.isbn, tags.name AS tname FROM books, tags, bookstagged WHERE books.id = bookstagged.book_id AND tags.id = bookstagged.tag_id AND tags.name = "' . $_POST['tag'] . '"';
			$books_selected = mysql_query($select_books, $dbpipeline);

			if (!empty($_POST['tag'])){
				echo '<p>Now showing all books tagged with "' . $_POST['tag'] . '":</p>';
			}

			while ($books_array = mysql_fetch_assoc($books_selected)){
				if (!empty($books_array)) {
					echo '<table class="bookinfo"><tr><td><strong>' . $books_array['title'] . '</strong></td><td>';
					//adding second query for writer names
					$select_writers = 'SELECT books.title, writers.name AS wname FROM books, writers, bookstowriters WHERE books.id=bookstowriters.book_id AND writers.id=bookstowriters.writer_id AND books.title="' . $books_array['title'] . '"';
					$writers_selected = mysql_query($select_writers, $dbpipeline);
					while ($writers_array = mysql_fetch_assoc($writers_selected)){
						if (!empty($writers_array)){
							echo $writers_array['wname'] . '<br />';
					}
				}
				echo '</td></tr><tr><td ><em>Originally Published:</em> ';
				if ($books_array['originalyear'] != NULL) {
					echo $books_array['originalyear'];
				} else {
					echo 'n/a';
				}
				echo '</td><td><em>Edition Published</em>: ';
				if ($books_array['editionyear'] != NULL) {
					echo $books_array['editionyear'];
				} else {
					echo 'n/a';
				}
				echo '</td></tr><tr><td><em>ISBN:</em> ';
				if ($books_array['isbn'] != NULL) {
					echo $books_array['isbn'];
				} else {
					echo 'n/a';
				}
				echo '</td><td><em>Format:</em> ' . $books_array['format'] . '</td></tr>';
				echo '<tr><td colspan="2"><em>Publisher:</em> ' . str_replace('&', '&amp;', $books_array['publisher']) . '</td></tr></table>';
			} else {
				echo $sampleentry;
			}
		}

	?>
			<br />
			<br />
		</article>

<?php
include_once '../thesis/footer_v2.php';
?>