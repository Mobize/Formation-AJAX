<?php

require_once('inc/init.php');

/* traitement du formulaire en post */
if ( isset($_POST['connexion']) )/* si on clique sur connexion */
{

    $resultat = $pdo->prepare('SELECT * FROM membre WHERE pseudo = :pseudo');
    $resultat->execute( array('pseudo' =>$_POST['pseudo']) );
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);

    if ( $resultat->rowCount() == 0)/* le pseudo n est pas en base de donnée donc creation d un nouveau membre */
    {
        /* insertion en base d'un nouveau membre */
        $result=$pdo->prepare("INSERT INTO membre VALUES(NULL,:pseudo,:civilite,:ville,:date_de_naissance,:ip,".time().")");
        $result->execute(array(
            'pseudo'            => $_POST['pseudo'],
            'civilite'          =>$_POST['civilite'],
            'ville'             =>$_POST['ville'],
            'date_de_naissance' =>$_POST['date_de_naissance'],
            'ip'                =>gethostbyname($_SERVER['SERVER_NAME'])
        ));
        $id_membre=$pdo->lastInsertId();/* recupere la derniere insertion dans la base et la stock dans une variable $id_membre */

    }
    elseif( $resultat->rowCount()>0  && $membre['ip'] == gethostbyname($_SERVER['SERVER_NAME'] ))
    {
        /* le pseudo est connu et l'internaute est proprietaire du pseudo (meme ip) */
        /* on met à jour la date de connexion */
        $result = $pdo->prepare('UPDATE membre SET date_connexion='.time().' WHERE id_membre=:id_membre');
        $result->execute(array('id_membre' => $membre['id_membre']));
        $id_membre=$membre['id_membre'];
    }
    else
    {
        $msg .='<div class="erreur">Ce pseudo est déja reservé</div>';
    }
    if(empty($msg))
    {
        /* remplir $_SESSION et rediriger vers index.php */
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('location:index.php');
        exit();
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
            <input type="text" id="pseudo" name="pseudo" required value=""><br>

            <label for="civilité">Civilité</label>
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