<?php
session_start();


if(isset($_POST["ajout"]))
{
		if($_POST["ajout"]!=NULL)
		{
			if(!isset($_COOKIE["panier"]))
			{
				echo "creation";
				setcookie("panier", $_POST["ajout"], time() + 3600, "/");
			}
			else
			{
				echo "ajout";
				setcookie("panier", $_COOKIE["panier"]."|".$_POST["ajout"], time() + 3600, "/");
			}
		}
		header('Location: panier.php');
		exit();
}

if(isset($_COOKIE["panier"]))
{
	 	include 'connectdb.php' ;
		echo $_COOKIE["panier"]."\n\n";
	 	$panier = $_COOKIE["panier"];
		echo $panier."\n\n";
		$tab = explode("|",$panier);
		echo count($tab)."\n\n";

		$sql = "SELECT titre, prix, version, urlimage FROM article WHERE ";
		for($i=0 ; $i < count($tab); $i++)
		{
			$sql .= "id=".$tab[$i];
			if($i != (count($tab)-1))
					$sql .= " OR ";
		}
		echo $sql;
		$result = mysqli_query($conn, $sql);

		mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Panier</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	<body>
		<h1>Votre Panier</h1>
    <div class="corps">
		<?php

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
     ?>
   </div>
	</body>
</html>
