<?php
$nav = '
<li><a href="?p=annonceurs">Annonceurs </a></li>
<li class="active"><a href="?p=rubriques">Rubriques</a></li>
<li><a href="?p=annonces">Annonces</a></li>
' ;
$header = '
    Les annonceurs
' ;
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$annonce = $bdd->query('
select * from  rub_rubrique;
');
$section ="
<span>
    <table class='table'>
        <thead>
            <tr>
                <th>Réference de la rubrique</th>
                <th>Nom de la rubrique</th>
            </tr>
        </thead>
        <tbody>";
                while ($donnees = $annonce->fetch())
            {
                $section .="
                <tr>
                <td>" . $donnees['rub_oid'] . "</td>
                    <td class='text-uppercase'>" . $donnees['rub_label'] . "</td>
                </tr>";
            };
            $section .="
        </tbody>
    </table>
</span>";


?>