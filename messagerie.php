ancienne page de co :

<?php
require("includes/header.php");

$user='SippyCup';
$password_definit='1234';

if(isset ($_POST['submit']))//si le formulaire a été validé//
{
    $_login = $_POST['login'];
    $_email = $_POST['email'];
    $_mdp = sha1($_POST['mdp']);

    if($_login&&$_mdp){
        if($_login==$user&&$_mdp==&$password_definit){
            $_SESSION['login']=$_login;
          header('Location: admin.php');
        }
        else{
            echo 'Identifiants erronés';
        }
    }

    $requete = $bdd->query("SELECT* FROM users WHERE
    login ='$_login' AND email ='$_email' AND mdp='$_mdp'");

    if($reponse =$requete->fetch()) /*ligne qui stocke les infos*/
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:index.php");//redirection
    }
    else
    {
        echo "Identifiant incorrect";
    }
}
?>
<div class="container">
    <form method="POST" action="#">
        <label for="login">Login :</label>
        <input type="text" placeholder="ecrivez..." id="login" name="login">
        <label for="email">Email :</label>
        <input type="email" placeholder="Ecrivez votre mail" id="email" name="email" required></br>
        <label for="password">Mot de passe:</label>
        <input type="password" placeholder="Ecrivez votre mot de passe" id="mdp" name="mdp" required></br>
        <input type="submit" name="submit">
        <input type="reset" name="Annuler">
    </form>
</div>


<?php
require("includes/footer.php");
?>

//<?php
require("includes/header.php");

if(isset ($_POST['submit']))//si le formulaire a été validé//
{
    $_email = $_POST['email'];
    $_mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("SELECT* FROM users WHERE
    email ='$_email' AND mdp='$_mdp'");

    if($reponse =$requete->fetch()) /*ligne qui stocke les infos*/
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:index.php");//redirection
    }
    else
    {
        echo "Identifiant incorrect";
    }
}
__ ____ ____ ___







<?php
require("includes/header.php");

if(isset ($_POST['submit']))//si le formulaire a été validé//
{
    $_email = $_POST['email'];
    $_mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("SELECT* FROM users WHERE
    email ='$_email' AND mdp='$_mdp'");

    if($reponse =$requete->fetch()) /*ligne qui stocke les infos*/
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:index.php");//redirection
    }
    else
    {
        echo "Identifiant incorrect";
    }
}
?>
<div class="container">
    <form method="POST" action="#">
        <label for="email">Email :</label>
        <input type="email" placeholder="Ecrivez votre mail" id="email" name="email" required></br>
        <label for="password">Mot de passe:</label>
        <input type="password" placeholder="Ecrivez votre mot de passe" id="mdp" name="mdp" required></br>
        <input type="submit" name="submit">
        <input type="reset" name="Annuler">
    </form>
</div>


<?php
require("includes/footer.php");
?>