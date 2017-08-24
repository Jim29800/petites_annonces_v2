<?php 
if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'accueil';
}
ob_start();
if($p === 'accueil'){
    include('./pages/accueil.php');
}
elseif($p === 'annonceurs'){
    include('./pages/annonceurs.php');
}
elseif($p === 'rubriques'){
    include('./pages/rubriques.php');
}
elseif($p === 'annonces'){
    include('./pages/annonces.php');
}
elseif($p === 'recherche'){
    include('./pages/recherche.php');
}
else {
    include('./pages/accueil.php');
}
$content = ob_get_clean();
include('./pages/templates/default.php');
?>