<?php
session_start();
$_SESSION["panier"]=NULL;

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<?php
	include("head.html");
	?>
	<body>
	<?php
		include ("corps.php");
	?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
