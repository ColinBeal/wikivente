<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Panier</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	<body>
		<?php
		echo "<div id='banniere'>";
			include ("banniere.php");
		echo "</div>";
		?>

		<h1>Votre Panier</h1>

		<?php
		echo "<div id='centre'>";
			echo "<div id='menu'>";
				include ("menu.php");
			echo "</div>";
			echo "<div id='contenu'>";
		?>

		<?php
		if(isset($_GET["reset"]))
		{
			setcookie("panier", NULL, 1, "/");
			header('Location: panier.php');
			exit;
		}
		if(isset($_POST["ajout"]))
		{
				if($_POST["ajout"]!=NULL)
				{
					if(!isset($_COOKIE["panier"]))
					{
						setcookie("panier", $_POST["ajout"], time() + 3600, "/");
					}
					else
					{
						setcookie("panier", $_COOKIE["panier"]."|".$_POST["ajout"], time() + 3600, "/");
					}
				}
				header('Location: panier.php');
				exit;
		}
		if(isset($_COOKIE["panier"]) && strlen($_COOKIE["panier"]>0))
		{
			 	include 'connectdb.php' ;
			 	$panier = $_COOKIE["panier"];
				$tab = explode("|",$panier);
				$sql = "SELECT titre, prix, version, urlimage FROM article WHERE ";
				for($i=0 ; $i < count($tab); $i++)
				{
					$sql .= "id=".$tab[$i];
					if($i != (count($tab)-1))
							$sql .= " OR ";
				}
				$result = mysqli_query($conn, $sql);
				mysqli_close($conn);
        if (mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
						echo "
            <div class='article'>
              <div class='illustr'>
                <img src='".$row["urlimage"]."' alt='illustr' width='100px' height'100px'/>
              </div>
              <div class='caract'>
                <p>Titre : ".$row["titre"]."</p>
                <p> Version : ".$row["version"]."</p>
                <p> Prix : ".$row["prix"]." €</p>
              </div>
            </div>
            ";
          }
        }
        else
        {
            echo "aucun resultats";
        }
}
else {
	echo "panier vide";
}
			echo "</div>";
			echo "</div>";
     ?>

		 <form action='panier.php?reset=true' method='post'>
			 <input type='submit' value='Reset panier'/>
		 </form>
   </div>
	</body>
</html>
