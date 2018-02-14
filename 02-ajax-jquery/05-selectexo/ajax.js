


$(document).ready(function(){

    ajax(); /* pour afficher le tableau dès le chargement de la page*/ 
    $('#selectionIndivudu').change(function(event){  /* $('#submit').click(function(event){ */
        /* event.preventDefault(); */
        ajax();
    })

    function ajax(){

        var personne = $('#selectionIndivudu').find(":selected").val();/* trouve la valeur du 'select' */
        $.post("ajax.php","personne="+personne, function(donnees){/* personne=  correspond à $personne de ajax.php généré avec extract($_POST); */

            if ( donnees.validation == 'ok')
            {
                $('#employes').html(donnees.resultat);/* affiche le resultat dans ma div #employes */
            }
            else{
                alert('pb liste employes');
            }

        },"json");
    }
})