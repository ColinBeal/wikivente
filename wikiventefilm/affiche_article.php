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
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<link rel="stylesheet" media="screen" type="text/css" title="design" href="style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="jquery-2.2.1.min.js"></script>
	</head>
	<body>
		<?php
		        if (mysqli_num_rows($result) > 0)
		        {
								$row = mysqli_fetch_assoc($result);
		            echo "
			            <div class='article'>
			              <div class='illustr'>
			                <img src='".$row["urlimage"]."' alt='illustr' width='70px' height'70px'/>
			              </div>
			              <div class='caract'>
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
