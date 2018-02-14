<?php

require_once('inc/init.php');

/* traitement du formulaire en post */
if ( isset($_POST['connexion']) )/* si on clique sur connexion */
{

    $resultat = $pdo->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
    $resultat->execute( array('pseudo' =>$_POST['pseudo']) );
    $membre = $resultat->fetch(PDO::FETCH8ASSOC);

    if ( $resultat->rowCount() == 0)
    {
        /* insertion en base d'un nouveau membre */
    }
    elseif( $resultat->rowCount()>0  && $membre['ip'] == $_SERVER['REMOTE_ADDR'] )
    {
        /* le pseudo est connu et l'internaute est proprietaire du psudo (meme ip) */
        /* on met à jour la date de connexion */
    }
    else
    {
        $msg .='<div class="erreur">Ce pseudo est déja reservé</div>';
    }
    if(empty($msg))
    {
        /* remplir $_SESSION et rediriger vers index.php */
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="inc/style.css">
</head>
<body>
    <?= $msg ?>
    <fieldset>
        <form action="" method="post">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" value=""><br>

            <label for="civimité">Sexe</label>
            <input type="radio" name="civilite" id="civilite" value="f" checked> Femme
            <input type="radio" name="civilite" id="civilite" value="m" > Homme<br>

            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" value=""><br>

            <label for="date_de_naissance">Date de naisance (YYYY-MM-DD)</label>
            <input type="text" id="date_de_naissance" name="date_de_naissance" value=""><br>

            <input type="submit" name="connexion" value="Connexion au Tchat !">
        </form>
    </fieldset>
</body>
</html>