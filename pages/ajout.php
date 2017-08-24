
<?php
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



$sql = 'INSERT INTO ann_annonce (rub_oid, ann_titre, ann_prix, ann_description, uti_oid)VALUES
('. (int)$_POST["rubrique"] . ',"'. $_POST["titre"] . '",' . (float)$_POST["prix"] . ',"' . $_POST["description"] . '",' . (int)$_POST["utilisateur" ]. ');
';

$bdd->exec($sql);
header('Location: http://localhost/private/annonces-pf/index.php?p=annonces');
exit();
?>