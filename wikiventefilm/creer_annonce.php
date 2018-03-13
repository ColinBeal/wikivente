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

    mysqli_close($conn);

        if (mysqli_num_rows($result) > 0)
        {
          echo "<form class='recherche' action='#' method='get'>";
          echo "<input type='text' name='titre' value='titre'/><br/>";
          echo "<input type='text' name='description' value='description'/><br/>";
          echo "<input type='number' name='prix' value='prix'/><br/>";
          while($row = mysqli_fetch_assoc($result))
          {
            echo $row["nom"] . "<select class='custom-select' name='".$row["nom"]."'>";
            $version = explode("#", $row["options"]);
            for($i=0 ; $i < sizeof($version); $i++)
            {
              echo "<option value='" . $version[$i] . "'>" . $version[$i] . "</option>";
            }
            echo "</select><br/>";
          }
          echo "<input type='submit' name='submit'/>";
					echo "</form>";
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
