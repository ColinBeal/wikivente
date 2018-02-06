<?php
$panier="1|3";

if(isset($panier))
{
	 include 'connectdb.php' ;

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
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Panier</title>
        <link rel="stylesheet" type="text/css" href="style.css">
		</head>		
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
