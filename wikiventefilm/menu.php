<?php

	 include 'connectdb.php' ;

		$sql = "SELECT nom, lien, id FROM meta_menu";
		$result = mysqli_query($conn, $sql);
?>

		<?php
    echo "<ul>";
        if (mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
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
