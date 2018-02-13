<?php
session_start();

if (isset($_GET["id"]))
{
	include 'connectdb.php' ;

	$sql = "SELECT titre, prix, version, urlimage, id FROM article WHERE id=".$_GET["id"];

	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
}
else
{
	header('Location: liste_annonce.php');
	exit();
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<?php
include("head.html");
 ?>
	<body>
		<?php
		echo "<div id='banniere'>";
			include ("banniere.php");
		echo "</div>";

		echo "<div id='centre'>";
			echo "<div id='menu'>";
				include ("menu.php");
			echo "</div>";
			echo "</div>";

		        if (mysqli_num_rows($result) > 0)
		        {
								$row = mysqli_fetch_assoc($result);
		            echo "
			            <div class='article row'>
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
			            </div>
		            ";
		        }
		        else
		        {
		            echo "aucun resultats pour cet article... :/";
		        }
		     ?>
	</body>
</html>
