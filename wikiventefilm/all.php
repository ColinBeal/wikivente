<?php
  if(isset($_GET["reset"]))
  {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
  }

  if (!isset($_SESSION["login"]) && !isset($_SESSION["password"]))
  {
    if (isset($_POST["login"]) && isset($_POST["password"]))
    {
      
      if ($_POST["submit"]=="enregistrement")
      {
        $sql = "INSERT INTO utilisateurs (login, pass) VALUES ('" .$_POST["login"]. "','" .$_POST["password"]. "')";
        if($result2 = mysqli_query($conn, $sql))
        {
          $_SESSION["login"] = $_POST["login"];
          $_SESSION["password"] = $_POST["password"];
          header('Location: ?');
          exit;
        }
        else
        {
          header('Location: ?log=allex');
          exit;
        }
      }

      if($_POST["submit"]=="connexion")
      {
        $sql = "SELECT id FROM utilisateurs WHERE login='".$_POST["login"]."' AND pass='".$_POST["password"]."'";
        $result2 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result2)>0)
        {
          $_SESSION["login"] = $_POST["login"];
          $_SESSION["password"] = $_POST["password"];
          header('Location: ?');
          exit;
        }
        else
        {
          header('Location: ?log=nonex');
          exit;
        }
        mysqli_close($conn);
      }
    }

    echo "
    <form action='#' method='post'>
      <div>
        <div>
          <p>Login <input type='text' name='login' required/></p>
        </div>
        <div>
          <p>Mot de passe <input type='password' name='password' required/></p>
        </div>
        <input type='submit' name='submit' value='connexion'/>
        <input type='submit' name='submit' value='enregistrement'/>
      </div>";

      if(isset($_GET["log"]))
      {
        if($_GET["log"]=="allex")
          echo "Ce login est déja utilisé";
        if($_GET["log"]=="nonex")
          echo "Ce compte n'existe pas ou mot de passe incorrect";
      }

    echo "</form>";
  }
  else
  {
    if(isset($_GET["log"]))
    {
      header('Location: ?');
      exit;
    }

    echo "
    <div>
        <p> Bonjour ".$_SESSION["login"]."! </p>
    </div>
    ";

    echo "
      <form action='?reset=true' method='post'>
        <input type='submit' value='deconnexion'/>
      </form>";
  }
?>
