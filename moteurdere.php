//moteurderecherche

<?php
require_once ('includes/header.php')
?>

<?php
    if(isset($_GET['recherche'])){
        $recherche = $_GET['recherche'];
        $sql = "SELECT * FROM biens,adresse
                WHERE biens.id_adr = adresse.id_adr ";

        if(isset($_GET['min'])){
            $sql .= "AND prix > ".$_GET['min']." ";
        }

        if(isset($_GET['max'])){
            $sql .= "AND prix < ".$_GET['max']." ";
        }

        if(isset()){
            $sql .= "AND commune LIKE '%".$recherche."%' ";
        }

        $requete = $bdd->query($sql);

        while($reponse= $requete->fetch())
        {
            echo $reponse['description'];
        }
}
?>

moteur de recherche qui permet de rechercher par superficie, nombre de piece, commune, ville etc...


<div class="navbar-collapse collapse" id="navbar">
<form class="navbar-form navbar-right" method="get">
    <div class="form-group">
    <input type="text" name="recherche" placeholder="Recherche..." class="form-control"></div>
    <div class="form-group">
    <input type="text" name="min" placeholder="min" class="form-control"></div>
    <div class="form-group">
    <input type="text" name="max" placeholder="max" class="form-control"></div>
    <button type="submit" name="rechercher" class="btn btn-success">Lancer</button>
</form>
</div>

//*--database :

create table immo;
use immo;

create table categorie
( id_cat int not null auto_increment,
libelle varchar (50),
primary key(id_cat));

create table users
( id_u int not null auto_increment,
login varchar(50),
mdp varchar (255),
email varchar(255),
primary key(id_u));

create table adresse
( id_adr int not null auto_increment,
numero int,
rue varchar(50),
commune varchar (50),
cp varchar(10),
primary key(id_adr));

create table biens
(id_b int not null auto_increment,
id_adr int not null,
id_cat int not null,
description text,
nb_pieces int,
surface int,
primary key(id_b),
foreign key(id_adr) references adresse(id_adr),
foreign key(i_cat) references
categories(id_cat));

create table envoyer
(id_exp int not null,
id_dest int not null,
primary key(id_exp,id_dest),
foreign key(id_exp) references users(id_u),
foreign key(id_dest) references users(id_u));--*!//

<?php
require_once ('includes/footer.php')
?>