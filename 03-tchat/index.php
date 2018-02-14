<?php
require_once('inc/init.php');

if ( !isset($_SESSION['pseudo']) )/* si on a pas de pseudo enregistré en session c'est que je ne suiss pas passé
par la page connexion */
{
    header('location:connexion.php');/* on redirige vers la page de connexion */
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tchat</title>
</head>
<body>
    
</body>
</html>