<?php
	session_start();
	$_SESSION["panier"]=NULL;
	include "connectdb.php";

	$sql = "SELECT titre, prix, version, urlimage, id FROM article WHERE etat = 'accepted' ";
	$result = mysqli_query($conn, $sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<?php
		include "head.html";
	?>
	<body>
		<?php
			include "all.php";

		?>

		<?php

			echo "<div class='row' id='banniere'>";
				include "banniere.php";
			echo "</div>";

			echo "<div class='row' id='centre'>";

			echo "<div class='col-md-4' id='menu'>";
				include "menu.php";
			echo "</div>";

			echo "<div class='col-md-8' id='contenu' >";

		  if (mysqli_num_rows($result) > 0)
		  {
		    while($row = mysqli_fetch_assoc($result))
		    {
		      echo "
					<div class='article row'>
						<a href='affiche_article.php?id=".$row["id"]."'>
							<div class='illustr col-md-4'>
								<img src='".$row["urlimage"]."' alt='illustr' width='70px' height'70px'/>
							</div>
							<div class='caract col-md-8'>
								<p>Titre : ".$row["titre"]."</p>
								<p> Version : ".$row["version"]."</p>
								<p> Prix : ".$row["prix"]." €</p>
							</div>
							<form action='panier.php' method='post'>
								<input type='hidden' name='ajout' value='".$row["id"]."'/>
								<input type='submit' value='Ajouter au panier'/>
							</form>
						</a>
					</div>
		      ";
		    }
		  }
		  else
		  {
		      echo "aucun resultats";
		  }
			echo "</div>";
		?>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
