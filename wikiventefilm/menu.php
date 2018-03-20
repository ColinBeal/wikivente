<?php

	 	include 'connectdb.php' ;

		$sql = "SELECT nom, lien, id FROM meta_menu";
		$resultat = mysqli_query($conn, $sql);

		if (isset($_SESSION["login"]) && isset($_SESSION["type"]))
		{
			if ($_SESSION["type"] == "moderateur")
				$user = 2;
			else
				$user = 1;
		}
		else
		{
			$user = 0;
		}


?>

		<?php
    echo "<ul>";
        if (mysqli_num_rows($resultat) > 0)
        {
          while($row = mysqli_fetch_assoc($resultat))
          {
						if($row["nom"]!="moderation" || ($row["nom"]=="moderation" && $user==2 ))
						{
	            echo "
		            <li>
	                <a href='".$row["lien"]."''> ".$row["nom"]." </a>
		            </li>
	            ";
						}
          }
        }
        else
        {
            echo "aucun resultats";
        }

      echo " </ul>";

			if ($user>=1)
			{
				echo "<input type='button' name='ajout' value='ajouter une annonce'/>";
			}
     ?>
