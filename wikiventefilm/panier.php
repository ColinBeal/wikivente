<?php
session_start();
?>

<!DOCTYPE html>
<html>
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
				include ("banniere.php");
			echo "</div>";

			echo "<div class='row' id='centre'>";
				echo "<div class='col-md-4' id='menu'>";
					include ("menu.php");
				echo "</div>";

				echo "<div class='col-md-8' id='contenu' >";



				if(isset($_POST["reset"]))
				{
					unset($_COOKIE['panier']);
					setcookie("panier", NULL, -1, "/");
					header('Location: panier.php');
					exit;
				}

				if(isset($_POST["supprime"]))
				{
						if($_POST["supprime"]!=NULL)
						{
							if(isset($_COOKIE["panier"]))
							{
								$panier = $_COOKIE["panier"];

								unset($_COOKIE['panier']);
								setcookie("panier", NULL, -1, "/");

								$tab = explode("|",$panier);

								for ($i=0; $i < count($tab); $i++)
								{
									echo "<script>alert(".$tab[$i].")</script>";
								}

								$first = true;
								for ($i=0; $i < count($tab) ; $i++)
								{
									if ($tab[$i] != $_POST["supprime"])
									{
                      if($first)
                      {
                        $leCookie = $tab[$i];
												$first = false;
                      }
                      else
                      {
                        $leCookie = $leCookie."|".$tab[$i];
                      }

									}
                }
                setcookie("panier", $leCookie , time() + 3600, "/");
							}
						}
						header('Location: panier.php');
						exit;
				}





				if(isset($_POST["ajout"]))
				{
						if($_POST["ajout"]!=NULL)
						{
							if(!isset($_COOKIE["panier"]))
							{
								setcookie("panier", $_POST["ajout"], time() + 3600, "/");
							}
							else
							{
								setcookie("panier", $_COOKIE["panier"]."|".$_POST["ajout"], time() + 3600, "/");
							}
						}
						header('Location: panier.php');
						exit;
				}


				if(isset($_COOKIE["panier"]) && strlen($_COOKIE["panier"])>0)
				{

					 	include 'connectdb.php' ;

					 	$panier = $_COOKIE["panier"];

						$tab = explode("|",$panier);

						$sql = "SELECT titre, prix, version, urlimage, id FROM article WHERE ";
						for($i=0 ; $i < count($tab); $i++)
						{
							$sql .= "id=".$tab[$i];
							if($i != (count($tab)-1))
									$sql .= " OR ";
						}

						$result = mysqli_query($conn, $sql);

						mysqli_close($conn);


				        if (mysqli_num_rows($result) > 0)
				        {
									$prix = 0;
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
												<input type='hidden' name='supprime' value='".$row["id"]."'/>
												<input type='submit' value='Supprimer du panier'/>
											</form>
										</div><br/><br/>
				            ";
										$prix += $row["prix"];
				          }
    							$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
    							$paypal_id='alexvig-facilitator@orange.fr';

									echo "
										<form action='".$paypal_url."' method='post' name='frmPayPal1'>
										    <input type='hidden' name='business' value='".$paypal_id."'>
										    <input type='hidden' name='cmd' value='_xclick'>
										    <input type='hidden' name='item_name' value='Products Total'>
										    <input type='hidden' name='amount' value='".$prix."'>
										    <input type='hidden' name='no_shipping' value='1'>
										    <input type='hidden' name='currency_code' value='EUR'>
										    <input type='hidden' name='handling' value='0'>
										    <input type='hidden' name='cancel_return' value='http://ufrsciencestech.u-bourgogne.fr/~av636682/wikivente-master/wikiventefilm/paiement.php'>
										    <input type='hidden' name='return' value='http://ufrsciencestech.u-bourgogne.fr/~av636682/wikivente-master/wikiventefilm/paiement.php'>
										    <input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!''>
										    <img alt='' border='0' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>
										</form>
									";
				        }
				        else
				        {
				            echo "aucun resultats";
				        }
				}
				else
				{
					echo "panier vide";
				}

				echo"<form action='panier.php' method='post'>";
					echo"<input class='btn btn-warning' type='submit' name='reset' value='Reset panier'/>";
				echo"</form>";

				echo "</div>";
			?>


	</body>
</html>
