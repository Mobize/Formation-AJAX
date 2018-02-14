
$(document).ready(function(){
    $('#action').click(function(event){ /* on selectionne le bouton avec l'id #action */

        $.ajax( 
            {
                url:'fichier.txt', /* chemin du fichier à afficher */
                dataType: "text",/* Format de reponse */
                success :function(data){ /* si readystate =4 + status =200 ( data = contenu du fichier texte dans notre cas ) */
                    $("#demo").html(data);/* affichage du fichier texte dans le html (div #demo) */
                }
            }
        )

    });


})/* fin du document ready */