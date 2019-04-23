<?php
    require("includes/header.php");

    if(isset($_POST['submit'])){
        $login= htmlentities($_POST['login']);
        $email= htmlentities($_POST['email']);
        $mdp=sha1($_POST['mdp']);
        $level = htmlentities($_POST['level']);

        $_SESSION['login']=$login;


        $query= $bdd->query("INSERT INTO users(login, email, mdp, level) VALUES ('$login', '$email', '$mdp', '$level')");

            if($query){
                echo "Inscription terminée, <a href='../connection.php'>connectez-vous</a>";
            }

            else{
                echo "Veuillez completer tous les champs.";
            }
    }
?>

        <div class="container">
        <form method="POST" action="#">
        <label for="mail">Saissisez votre identifiant :</label>
            <input type="text" placeholder="Ecrivez votre identifiant..." id="login" name="login" required></br>
            <label for="mail">Saissisez votre email :</label>
            <input name="email" placeholder="Ecrivez votre mail" type="email" id="email" required></br>
            <label for="mdp">Saissisez votre mot de passe:</label>
            <input type="password" name="mdp" id="mdp" placeholder="Ecrivez votre mot de passe..." required></br>
            </br>
            <label for="level">Qui êtes-vous ?</label>

            <select name="level" id="level" required>
                <optgroup label="">
                    <option value=""></option>
                </optgroup>
            <optgroup label="Vous êtes un...">
                <option value="2">Acheteur</option>
                <option value="3">Vendeur</option>
            </optgroup>
            </select>

            <input type="submit" name="submit" value="Validez">
            <input type="reset" name="reset" >
        </form>
</div>

<?php
    require("includes/footer.php");
?>


