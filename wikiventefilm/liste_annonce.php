<?php

		include("head.html");

	 	include 'connectdb.php';

		$sql = "SELECT titre, prix, version, urlimage, id FROM article WHERE etat = 'accepted' ";

		$result = mysqli_query($conn, $sql);

		mysqli_close($conn);



        if (mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            echo "
						<div class='article row'>
							<div class='illustr col-md-4'>
								<img src='".$row["urlimage"]."' alt='illustr' width='70px' height'70px'/>
							</div>
							<div class='caract col-md-8'>
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
        }
        else
        {
            echo "aucun resultats";
        }
?>
