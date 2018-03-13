<?php

	 	include 'connectdb.php' ;

		$sql = "SELECT nom, lien, id FROM meta_menu";
		$resultat = mysqli_query($conn, $sql);

		if (isset($_SESSION["login"]))
		{
			$sql2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."' AND type='moderateur'";
			$resultat2 = mysqli_query($conn, $sql2);
			$num = mysqli_num_rows($resultat2);
			$user = 1;
		}
		else
		{
			$num = null;
			$user = null;
		}


?>

		<?php
    echo "<ul>";
        if (mysqli_num_rows($resultat) > 0)
        {
          while($row = mysqli_fetch_assoc($resultat))
          {
						if($row["nom"]!="moderation" || ($row["nom"]=="moderation" && $num!=null ))
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

			if ($user==1)
			{
				echo "<input type='button' name='ajout' value='ajouter une annonce'/>";
			}
     ?>
