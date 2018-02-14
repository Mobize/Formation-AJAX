
$(document).ready(function(){

    setInterval(ajax,5000);/* definit une interval de 5 secondes pour appeler (et donc rafraichir) la fonction ajax() */
    /* setInterval(function(){ajax(); 5000}); */
    ajax();

    function ajax(){

        $.post('ajax.php','',function(donnees){
            if( donnees.validation == 'ok')
            {
                $('#resultat').html(donnees.resultat);
            }
            else
            {
                alert('Pb affichage employes');
            }
        },'json')

    }

});