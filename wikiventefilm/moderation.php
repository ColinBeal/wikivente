<?php
session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<?php
	include("head.html");
	?>
	<body>
	<?php
		include "connectdb.php";
		include "all.php";
		include ("corps.php");
	?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
