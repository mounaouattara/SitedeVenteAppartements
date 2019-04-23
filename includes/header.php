<?php
session_start();

try{
    $bdd = new PDO(
        "mysql:host=localhost; dbname=appart", "root", ""
    );
}
catch(Exception $e)
{
    die("erreur de connection");
}


//Attribution des variables de session
//$level=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
//$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
//$login=(isset($_SESSION['login']))?$_SESSION['login']:'';

//include("constants.php");
//include("functions.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="js/javascript.js">
    <title>Agence immobilière</title>
</head>



<body>
<nav>

    <div class="up">
           <h2>APPARTS.CO</h2>
    </div>

    <div class="down">
        <ul>
            <li> <a href="index.php">Accueil</a></li>
            <li><a href="">Recherche</a></li>
            <li><a href="liste.php"> Liste exhaustive</a></li>

            <?php
            if(isset($_SESSION['connecte'])){
                ?>
                <li><a href="posts.php">Poster une annonce</a></li>

                <li><a class="bouton_droite" href="deconnection.php">Deconnection [<?php echo $_SESSION['login']; ?>]</a></li>
                <?php
            }
            else {
                ?>
                <li><a class="bouton_droite" href="inscription.php">Inscription</a></li>
                <li><a class="bouton_droite" href="connection.php">Connection</a></li>
                <?php
            }
            ?>
        </ul>
    </div>

</nav>
