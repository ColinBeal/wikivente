<?php

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


        if (mysqli_num_rows($result) > 0)
        {
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
								<button type='button' > Ajouter au panier </button>
	            </div>
            ";
        }
        else
        {
            echo "aucun resultats pour cet article... :/";
        }
     ?>
