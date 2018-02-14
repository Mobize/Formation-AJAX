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
    <div id="employes" style="display:inline">
    <?php
        
        require_once('init.php');
        $result=$pdo->query('SELECT * FROM employes');
        echo'<select name="personne" id="personne">';
        while($employe = $result->fetch(PDO::FETCH_ASSOC))
        {
            echo'<option value="'.$employe['id_employes'].'">'.$employe['prenom'].'</option>';/* creation de mon select initial avec tout les employes */
        }

        echo'</select>';

    ?>
    </div>
    <input type="submit" value="supprimer" id="submit">
    </form>

    <script src="./jquery-3.3.1.js"></script>   
    <script src="./ajax.js"></script> 
</body>
</html>