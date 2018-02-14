<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DELETEID + SELECTID</title>
</head>
<body>
   <form action="#" method="post">
    
    <?php
        
        require_once('init.php');
        $result=$pdo->query('SELECT DISTINCT(prenom) FROM employes');/* selectionne uniquement les prenoms distinct (pour empecher les doublons) */
        echo'<select name="personne" id="selectionIndivudu">';
        while($employe = $result->fetch(PDO::FETCH_ASSOC))
        {
            echo'<option value="'.$employe['prenom'].'">'.$employe['prenom'].'</option>';/* creation de mon select initial avec tout les employes */
        }   /* value= est le resultat de ma requete dans ajax.php ('SELECT * FROM employes WHERE prenom=:prenom') */

        echo'</select>';

    ?>
    
    
    <!-- <input type="submit" value="afficher" id="submit">  a remettre-->
    </form>
    <div id="employes" style="display:inline"></div>

    <script src="./jquery-3.3.1.js"></script>   
    <script src="./ajax.js"></script> 
</body>
</html>