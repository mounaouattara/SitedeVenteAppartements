<?php
require ("includes/header.php");
?>


<div class="container">

<h1>Administration</h1>
<a href="?action=add">Ajouter un produit</a><br/>
<a href="?action=modifyanddelete">Modifier un produit/Supprimer un produit</a><br/><br/>

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda culpa dolorum eos harum, illo iste nulla quaerat, quas quos recusandae repudiandae sed similique sint tempore vel veritatis. Fugiat, non?
<br>

<?php
        if(isset($_SESSION['connecte'])){
            if(isset($_GET['action'])){
        if($_GET['action']=='add') {

            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $nombrepiece = $_POST['nombrepiece'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];
                $surface = $_POST['surface'];
                $datevente = $_POST['datevente'];

                if ($title && $nombrepiece && $description && $prix && $surface && $datevente) {

                    $insert = $bdd->prepare("INSERT INTO biens(title, nombrepiece, description, prix, surface, datevente) VALUES('$title','$nombrepiece','$description','$prix','$surface','$datevente')");
                    $insert->execute();
                } else {
                    echo "Veuillez remplir tous les champs.";
                }

            }
            ?>


            <form action="#" method="post"><br/>
                <label for="title">Titre:</label><input type="text" name="title" required/><br/>
                <label for="nombrepiece">Nombre de pièces de l'appartement :</label><input type="text"
                                                                                           name="nombrepiece"
                                                                                           id="nombrepiece"
                                                                                           required/> <br/>
                <label for="description">Description de l'appartement:</label><textarea name="description" id="description" cols="30" rows="10" required></textarea><br/>
                <label for="prix">Prix de l'appartement :</label><input type="text" name="prix" id="prix"
                                                                        required/> <br/>
                <label for="surface">Surface de l'appartement :</label><input type="text" name="surface" id="surface"
                                                                              required/> <br/>
                <label for="datevente">Date de la vente :</label><input type="date" name="datevente" id="datevente"
                                                                        required/><br/>
                <input type="submit" name="submit"> <br/>
            </form>

            <?php

        }else if ($_GET['action']=='modifyanddelete'){

            $select = $bdd->prepare("SELECT * FROM biens");
            $select->execute();

            while ($s=$select->fetch(PDO::FETCH_OBJ)){
                echo $s->title;

                ?>
                <a href="?action=modify&amp;id=<?php echo $s->id_b;?>">Modifier</a>
                <a href="?action=delete&amp;id=<?php echo $s->id_b;?>">X</a><br/><br/>
                <?php
            }

        } elseif ($_GET['action']=='modify'){

                $id=$_GET['id'];

            $select = $bdd->prepare("SELECT * FROM  biens WHERE id_b=$id");
            $select->execute();

            $data = $select->fetch(PDO::FETCH_OBJ);

            ?>


            <form action="#" method="post"><br/>
                <label for="title">Titre:</label><input value="<?php echo $data->title; ?>" type="text" name="title"/><br/>
                <label for="nombrepiece">Nombre de pièces de l'appartement :</label><input value="<?php echo $data->nombrepiece; ?>"type="text"
                                                                                           name="nombrepiece"
                                                                                           id="nombrepiece"
                                                                                           /> <br/>
                <label for="description">Description de l'appartement:</label><textarea id="description" name="description" cols="30" rows="10"><?php echo $data->description; ?></textarea><br/>
                <label for="prix">Prix de l'appartement :</label><input value="<?php echo $data->prix; ?>"type="text" name="prix" id="prix"
                                                                        /> <br/>
                <label for="surface">Surface de l'appartement :</label><input value="<?php echo $data->surface; ?>" type="text" name="surface" id="surface"
                                                                              /> <br/>
                <label for="datevente">Date de la vente :</label><input value="<?php echo $data->datevente; ?>"type="date" name="datevente" id="datevente"
                                                                        /><br/>
                <input type="submit" name="submit" value="Modifier"> <br/>
            </form>


            <?php


            if(isset($_POST['submit'])){
                $title= $_POST['title'];
                $nombrepiece = $_POST['nombrepiece'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];
                $surface = $_POST['surface'];
                $datevente = $_POST['datevente'];

                $update = $bdd->prepare("UPDATE biens SET title='$title', nombrepiece='$nombrepiece', description='$description', prix='$prix', surface='$surface', datevente='$datevente' WHERE id_b=$id");
                $update->execute();

                header('Location : admin.php?action=modifyanddelete');
            }

        }
        elseif ($_GET['action']=='delete'){

            $id=$_GET['id'];
            $delete = $bdd->prepare("DELETE FROM biens WHERE id_b=$id");
            $delete->execute();

        }
        else{
            die('Une erreur s\'est produite.');
        }
        }
        else{
            header('Location : ../index.php');
            }
        }
        ?>

 </div>

<?php
    require ("includes/footer.php");
?>