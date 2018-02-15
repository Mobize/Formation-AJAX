<?php

require_once('init.php');/* connexion à la base */

extract($_POST);/* extraire les donnees du post et creer des variables pour chaque index */
//$_POST['titi'] => $titi

$result = $pdo->prepare('INSERT INTO employes (prenom) VALUES (:toto)');/* requete pour inserer */

if($result->execute(array('toto' => $titi)) ){/* si j insere un prenom */

    $tab['validation'] = 'ok';/* creation d'une variable avec l'index ['validation] et la valeur 'ok' */
    echo json_encode($tab); /* { 'validation' : 'ok' }  affichage de 'ok'*/
}