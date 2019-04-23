<?php
function verif_auth($auth_necessaire)
{
    $level=(isset($_SESSION['level']))?$_SESSION['level']:1;
    return ($auth_necessaire <= intval($level));
}
?>

<?php
if(verif_auth(INSCRIT))
{
//Afficher le forum
}
else
{
//Laisser tomber :p
}
?>
