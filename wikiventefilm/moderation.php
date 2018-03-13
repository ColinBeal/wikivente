<?php
session_start();


if (isset($_SESSION["login"]))
{
  include "connectdb.php";
  $sql2 = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."' AND type='moderateur'";
  $resultat2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($resultat2)==null)
  {
    header('Location: index.php');
    exit;
  }
}
else
{
  header('Location: index.php');
  exit;
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<?php
	include("head.html");
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

    if(isset($_POST['submit']))
    {
      if ($_POST['submit']=="Accepter")
      {
        $sql = "UPDATE article SET etat='accepted' WHERE id=".$_POST['ajout'];
        $result = mysqli_query($conn, $sql);
      }
      elseif ($_POST['submit']=="Supprimer")
      {
        $sql = "DELETE FROM article WHERE id=".$_POST['ajout'];
        $result = mysqli_query($conn, $sql);

      }
    }

    $sql = "SELECT titre, prix, version, urlimage, id FROM article WHERE etat='waiting'";

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
              <form action='moderation.php' method='post'>
                <input type='hidden' name='ajout' value='".$row["id"]."'/>
                <input type='submit' name='submit' value='Accepter'/>
                <input type='submit' name='submit' value='Supprimer'/>
              </form>
            </div>
            ";
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
