<?php
session_start();

if (!isset($_SESSION["login"]))
{
  header('Location: index.php');
  exit;
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<?php
	include "head.html";
	?>
	<body>
	<?php
		include "connectdb.php";
		include "all.php";
	?>

  <?php


  echo "<div class='row' id='banniere'>";
  	include "banniere.php";
  echo "</div>";

  echo "<div class='row' id='centre'>";

  	echo "<div class='col-md-4' id='menu'>";
  		include "menu.php";
  	echo "</div>";

  	echo "<div class='col-md-8' id='contenu' >";

    $sql = "SELECT nom, options FROM recherche_option";

    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
          echo "<form class='recherche' action='#' method='post'>";
          echo "<p>Titre : <input type='text' name='titre' required/></p><br/>";
          echo "<p>Description : <input type='text' name='description' required/></p><br/>";
          echo "<p>Prix : <input type='number' name='prix' required/></p><br/>";
          while($row = mysqli_fetch_assoc($result))
          {
            echo $row["nom"] . "<p><select class='custom-select' name='".$row["nom"]."' required>";
            $version = explode("#", $row["options"]);
            for($i=0 ; $i < sizeof($version); $i++)
            {
              echo "<option value='" . $version[$i] . "'>" . $version[$i] . "</option>";
            }
            echo "</select></p><br/>";
          }
          echo "<input type='submit' name='submit'/>";
					echo "</form>";

          if (isset($_POST["submit"]) && !empty($_POST["submit"]))
          {
            $_POST["submit"] = null;
            unset($_POST["submit"]);
            $sql2 = "INSERT INTO article (titre, prix, description, version, categorie, support) VALUES ('" .$_POST["titre"]. "'," .$_POST["prix"]. ", '" .$_POST["description"]. "','" .$_POST["version"]. "','" .$_POST["categorie"]. "','" .$_POST["support"]. "')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 == true)
            {
              echo "Article Envoyé aux Modérateurs";
            }
            else
            {
              echo "arf .. ça veut pas marcher";
            }

          }
        }
        else
        {
            echo "aucun resultats à moderer";
        }

  	echo "</div>";

  echo "</div>";



  ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
