<?php
	session_start();
	include 'connectdb.php';

	$sql = "SELECT nom, type ,att_name FROM recherche";
	$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Panier</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
				<?php
				if (mysqli_num_rows($result) > 0)
				{
					echo "<form action='#' method='get'>";
					while($row = mysqli_fetch_assoc($result))
					{
						switch ($row["type"])
						{
							case 'text':
								echo $row["nom"] . "<input type='text' name='" . $row["att_name"] . "'/><br/>";
								break;

							case 'number':
								echo $row["nom"] . "<input type='number' name='" . $row["att_name"] . "'/><br/>";
								break;

							case 'select':
							{
									$sql = "SELECT nom, options FROM recherche_option WHERE nom='".$row["nom"]."'";
									$result2 = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result2) > 0)
									{
										while($row2 = mysqli_fetch_assoc($result2))
										{
											echo $row2["nom"] . "<select name='".$row2["nom"]."'>";
											$option = explode("#", $row2["options"]);
											for($i=0 ; $i < sizeof($option); $i++)
											{
												echo "<option value='" . $option[$i] . "'>" . $option[$i] . "</option>";
											}
											echo "</select><br/>";
										}
									}
								break;
							}
						}
					}
					echo "<input type='submit' name='submit'/>";
					echo "</form>";
				}

				if(isset($_GET["submit"]))
				{
					$flag=0;
					$sql = "SELECT titre, prix, version, urlimage,id  FROM article WHERE ";

					if ($_GET["titre"]!=null)
					{
						$sql .= "titre LIKE '%" .$_GET["titre"]. "%'";
						$flag++;
					}
					if ($_GET["version"]!=null AND $_GET["version"]!="Selectionnez")
					{
						if ($flag!=0) { $sql .= " AND "; }
						$sql .= "version='" .$_GET["version"]."'";
						$flag++;
					}
					if ($_GET["min"]!=null)
					{
						if ($flag!=0) { $sql .= " AND "; }
						$sql .= "prix > " .$_GET["min"];
						$flag++;
					}
					if ($_GET["max"]!=null)
					{
						if ($flag!=0) { $sql .= " AND "; }
						$sql .= "prix < " .$_GET["max"];
						$flag++;
					}
					if ($_GET["support"]!=null AND $_GET["support"]!="Selectionnez")
					{
						if ($flag!=0) { $sql .= " AND "; }
						$sql .= "support='" .$_GET["support"]."'";
						$flag++;
					}
					if ($flag == 0)
					{
						$sql = "SELECT titre, prix, version, urlimage,id  FROM article";
					}

					$result3 = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result3) > 0)
					{
						while($row3 = mysqli_fetch_assoc($result3))
						{
							echo "
				      	<div class='article'>
				          <div class='illustr'>
				            <img src='".$row3["urlimage"]."' alt='illustr' width='70px' height'70px'/>
				          </div>
				          <div class='caract'>
				          	<p>Titre : ".$row3["titre"]."</p>
				            <p> Version : ".$row3["version"]."</p>
				            <p> Prix : ".$row3["prix"]." €</p>
				          </div>
									<form action='panier.php' method='post'>
										<input type='hidden' name='ajout' value='".$row3["id"]."'/>
										<input type='submit' value='Ajouter au panier'/>
									</form>
				        </div>
			        ";
						}
					}
					else
						echo "aucun résultats";
				}
				mysqli_close($conn);
				?>
			</form>
		</body>
</html>
