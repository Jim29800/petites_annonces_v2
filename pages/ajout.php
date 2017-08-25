
<?php
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$rubrique = htmlspecialchars((int)$_POST["rubrique"]);
$titre = htmlspecialchars ($_POST["titre"]);
$prix = htmlspecialchars((float)$_POST["prix"]);
$description = htmlspecialchars($_POST["description"]);
$utilisateur = htmlspecialchars((int)$_POST["utilisateur"] );

// $sql = 'INSERT INTO ann_annonce (rub_oid, ann_titre, ann_prix, ann_description, uti_oid)VALUES
// ('. (int)$_POST["rubrique"] . ',"'. $_POST["titre"] . '",' . (float)$_POST["prix"] . ',"' . $_POST["description"] . '",' . (int)$_POST["utilisateur" ]. ');
// ';

 $sql = sprintf('INSERT INTO ann_annonce (rub_oid, ann_titre, ann_prix, ann_description, uti_oid)VALUES
( "%d", "%s", "%d", "%s", "%d");'
, $rubrique ,$titre, $prix,$description ,$utilisateur );

$bdd->exec($sql);
header('Location: http://localhost/private/annonces-pf/index.php?p=annonces');
exit();
?>