<?php

	 include 'connectdb.php' ;

		$sql = "SELECT titre, prix, version, urlimage, id FROM article";

		$result = mysqli_query($conn, $sql);

		mysqli_close($conn);


?>

		<?php

        if (mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            echo "
						<a href=pagearticle.php?id=".$row["id"].">
            <div class='article'>
              <div class='illustr'>
                <img src='".$row["urlimage"]."' alt='illustr' width='70px' height'70px'/>
              </div>
              <div class='caract'>
                <p>Titre : ".$row["titre"]."</p>
                <p> Version : ".$row["version"]."</p>
                <p> Prix : ".$row["prix"]." €</p>
              </div>
              <button type='button'> Voir article </button>
            </div>
            </a>
            ";
          }
        }
        else
        {
            echo "aucun resultats";
        }
     ?>
