<?php
/* connexion à la bdd */

$pdo = new PDO('mysql:host=localhost;dbname=tchat',
'root',
'',
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ));

/*  ouverture de session */
session_start();

/* initialisation variable */
$msg = '';

/* fonction de calcul d'age à partir d'une date de naissance sous la forme AAA-MM-JJ*/

function age($naiss)
{
    list($y, $m, $d) = explode('-',$naiss);     /* fonction qui récupere les entres du tableau et crée des variables $y=0, $m=1, $d=2 */
    $diff = date('m') - $m;                      /* $diff = mois actuel moins le mois de l internaute */
    if( ($diff < 0))                              /* si la difference de mois est inferieur à 0 */
    {
        $y++;                                    /* j'ajoute 1 an */
    }
    elseif( $diff == 0 && ( date('d') - $d < 0) )/* ou si la difference de mois est égale à 0 et le jour actuel moins le jour de l internaute est inferieur à 0  */
    {   
        $y++;                                   /* j'ajoute 1 an */
    }
    return date('Y') - $y; 
}