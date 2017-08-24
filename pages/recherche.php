<?php
$nav = '
<li><a href="?p=annonceurs">Annonceurs </a></li>
<li><a href="?p=rubriques">Rubriques</a></li>
<li class="active"><a href="?p=annonces">Annonces</a></li>
' ;
$header = '
Recherche
' ;
$section = "
<form method='POST' action=''>
<input type='text' name='recherche'>
<input type='submit'> 
";
try    
    {
        $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');;
    }
catch (Exception $e)
    {        
        die('Erreur : ' . $e->getMessage());        
    };

    if (!isset($_POST["recherche"])){
        $section = "
        <form method='POST' action=''>
        <input type='text' name='recherche'>
        <input type='submit'> 
        <p>indefini<p>";
    }
    elseif (empty($_POST["recherche"])) {
        $section = "
        <form method='POST' action=''>
        <input type='text' name='recherche'>
        <input type='submit'> 
        <p>Champ vide<p>";
    }
    else {
        $annonce = $bdd->query('
        select ann_oid, uti_prenom, ann_titre, ann_description, ann_prix , rub_label
        from ann_annonce
        INNER JOIN uti_utilisateur ON ann_annonce.uti_oid = uti_utilisateur.uti_oid
        INNER JOIN rub_rubrique ON ann_annonce.rub_oid = rub_rubrique.rub_oid
        WHERE ann_titre like "%'.$_POST["recherche"].'%"
        ORDER BY ann_oid;
            ');
            $section ="
            <span>
                <table class='table' >
                    <thead>
                        <tr>
                            <th>Réference de l'annonce</th>
                            <th>Rubrique</th>
                            <th>titre</th>
                            <th>Prix</th>
                            <th>Description</th>
                            <th>Vendeur</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>";
        while ($donnees = $annonce->fetch())
        {
            $section .="<tr>
            <td name='tab_annonces'>" .  $donnees['ann_oid'] . "</td>
            <td>" .  $donnees['rub_label'] ."</td>
            <td>" .  $donnees['ann_titre'] . "</td>
            <td>" .  $donnees['ann_prix'] . "€</td>
            <td>" .  $donnees['ann_description'] ."</td>
            <td class='text-uppercase'>" . $donnees['uti_prenom'] ."</td>
            <td><a href='./pages/supprimer.php?val=" . $donnees['ann_oid'] . "' class='btn btn-default'>X</a></td>
            </tr>";
            };
            $section .="
                </tbody>
            </table>
        </span>";
    };



    