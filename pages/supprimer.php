<?php
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$annonce = $bdd->query('
select * from  ann_annonce;
');
    $bdd->query("
    DELETE FROM annonces_pf.ann_annonce WHERE ann_oid='" . $_GET["val"]  . "';
        ");
        header('Location: http://localhost/private/annonces-pf/index.php?p=annonces');
        exit();
?>