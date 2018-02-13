
document.addEventListener("DOMContentLoaded", function(event){

document.getElementById('submit').addEventListener('click',function(event){

    event.preventDefault();//annule le comportement par defaut du submit (qui recharge habituellement la page)
    ajax();    
})





function ajax()
{
    if( window.XMLHttpRequest )  r = new XMLHttpRequest();     /* pour tout les navigateurs sauf internet explorer */
    else r = new ActiveXObject("Microsoft.XMLHTTP");            /* pour internet explorer */

    var p = document.getElementById('personne'); /* recuperation du champ 'personne' */
    var personne = p.value;/* recuperationde la valeur de 'p' */

    var parameters = 'personne='+personne;
    r.open("POST","ajax.php",true);
    r.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    r.send(parameters);

    document.getElementById('resultat').innerHTML="<div class=\"divresul\"> Employé "+personne+" ajouté!</div>"; /* affichage sur la page HTML dans la div "resultat" */
    document.getElementById('personne').value=""; /* on vide le champ "personne" apres affichage */


}

});