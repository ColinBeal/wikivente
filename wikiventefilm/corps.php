<?php
echo "<div class='row' id='banniere'>";
	include "banniere.php";
echo "</div>";

echo "<div class='row' id='centre'>";

	echo "<div class='col-md-4' id='menu'>";
		include "menu.php";
	echo "</div>";

	echo "<div class='col-md-8' id='contenu' >";
		include "liste_annonce.php";
	echo "</div>";

echo "</div>";

?>
