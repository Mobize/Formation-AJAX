
$(document).ready(function(){

    $('#submit').click(function(event){/* au clic sur le bouton ("#submit") on crée une fonction */
        event.preventDefault();/* on stoppe le rafraichissement de la page (desactivation du comportement normal du submit) */
        ajax();/* appelle de la fonction nommée ajax() */
    })

    function ajax(){/* création de la fonction ajax() */

        personne = $('#personne').val();/* recupere la valeur de l'id #personne (input) en l'incluant dans une variable 'personne'*/

        /* 1 ere méthode :  $.post("fichier destination","parametres",function("reponse"){},"format") */
        /*                  $.post("fichier.txt"         ,""         ,function(data)     {$('#demo).html(data);}),"text"); */

        $.post("ajax.php","titi="+personne,function(donnees){
            if( donnees.validation == 'ok')/* si ça correspond à mon entree de tableau ['validation'] creé dans ajax.php */
            {
                $('#resultat').append("<div class='divresul'>employé "+personne+' ajouté</div>');/* affichage dans la div #resultat (+creation d'une div à l'interieur)
                 et affichage de la valeur de l input '#personne' stocké dans la variable personne */
                $("#personne").val(""); /* on remet la valeur de l'input #personne à 'vide' */
            }
            else
            {
                alert("Pb insertion");/* sinon j'affiche une alerte */
            }
        },"json");



    }

})