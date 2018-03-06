<?php

	 include 'connectdb.php' ;

		$sql = "SELECT nom, lien, id FROM meta_menu";

		$resultat = mysqli_query($conn, $sql);




?>

		<?php
    echo "<ul>";
        if (mysqli_num_rows($resultat) > 0)
        {
          while($row = mysqli_fetch_assoc($resultat))
          {
            echo "
	            <li>
                <a href='".$row["lien"]."''> ".$row["nom"]." </a>
	            </li>
            ";
          }
        }
        else
        {
            echo "aucun resultats";
        }

      echo " </ul>";
     ?>
