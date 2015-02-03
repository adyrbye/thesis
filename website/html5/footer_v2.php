		<footer>
			<small>Last updated May 21, 2012. <?php
echo strftime('It is currently %H:%M %p on %A, %B %e %G');
?> | <a href="http://huco.artsrn.ualberta.ca/~adyrbye/thesis/admin_v2.php">Log in</a></small>
		</footer>
	</body>
</html>

<?php 
mysqli_close($dbpipeline);
?>