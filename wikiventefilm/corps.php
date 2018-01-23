
<?php
echo "<div id='banniere'>";
	include ("banniere.php");
echo "</div>";

echo "<div id='centre'>";
	echo "<div id='menu'>";
		include ("menu.php");
	echo "</div>";

	echo "<div id='contenu'>";
		include ("affiche_article.php");
	echo "</div>";
echo "</div>";

?>
