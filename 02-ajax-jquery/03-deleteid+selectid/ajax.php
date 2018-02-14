<?php

require_once('init.php');
extract($_POST);

$result=$pdo->prepare('DELETE FROM employes WHERE id_employes= :id');
$result->execute(array('id' => $id ));

/* je regenere la liste des prenoms */
$tab = array();/* creation d une variable avec comme valeur un tableau */
$tab['resultat']="";/* insertion d'un champ resultat dans mon tableau */

$result = $pdo->query('SELECT * FROM employes');
$tab['resultat'].='<select name="personne" id="personne">';
while( $employe =$result->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'].='<option value="'.$employe['id_employes'].'">'.$employe['prenom'].' '.$employe['nom'].'</option>';/* creation du select mis a jour */
}
$tab['resultat'].='</select>';

$tab['validation'] = 'ok';

/* {'resultat' : '<select>.....</select>', 'validation' : 'ok'} */
/* reponse.resultat et reponse.validation */

echo json_encode($tab);