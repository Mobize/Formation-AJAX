/* AJAX */
/* Asynchronous Javascript And Xml */

document.getElementById('action').addEventListener('click',loadDoc);/* au clic sur le bouton 'action' j'appelle la fonction 'loadDoc' */

function loadDoc()
{
    var xhttp = new XMLHttpRequest(); /* new XMLHttpRequest = nouvel objet */
    /* readyState , doit etre egal à 4 pour confirmer qu'il a abouti
       status , doit etre égal à 200 pour confirmer le chargement reussi du fichier */
    xhttp.onreadystatechange = function () {

        if(xhttp.readyState == 4 && xhttp.status == 200 )/* si les statut sont bons */
        {
            document.getElementById('demo').innerHTML = xhttp.responseText;/* affiche le contenu du fichier texte */
        }
    }
    xhttp.open('GET','fichier.txt',true)/* 1 methode d'envoi,2 fichier appelé, asynchrone = oui */
    xhttp.send(); /* envoi */
}