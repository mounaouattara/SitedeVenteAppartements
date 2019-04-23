<?php

    require_once ("includes/header.php");?>

            <div class="container">

                <div id="column_one">

<?php

$select = $bdd->prepare("SELECT * FROM biens ORDER BY id_b DESC LIMIT 0,3");
$select->execute();

while ($s=$select->fetch(PDO::FETCH_OBJ)){

    ?>


                    <h2><?php echo$s->title;?></h2>
                    <h5><?php echo$s->nombrepiece;?></h5>
                    <h5><?php echo$s->description;?></h5>
                    <h5><?php echo$s->prix;?>euros</h5>
                    <h5><?php echo$s->surface;?></h5>
                    <h5><?php echo$s->datevente;?></h5>
                    <br/><br/>
            <?php } ?>
    </div>





            <div id="column_two">

            <?php

            $select = $bdd->prepare("SELECT * FROM biens");
            $select->execute();

            while ($s=$select->fetch(PDO::FETCH_OBJ)){

                ?>
            <h2><?php echo$s->title;?></h2>
            <h5><?php echo$s->nombrepiece;?></h5>
            <h5><?php echo$s->description;?></h5>
            <h5><?php echo$s->prix;?>euros</h5>
            <h5><?php echo$s->surface;?></h5>
            <h5><?php echo$s->datevente;?></h5>
            <br/><br/>


            <?php

        }

    require_once ("includes/footer.php");

?></div></div>