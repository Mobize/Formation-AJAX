$(document).ready(function(){

    var personne = $('#personne').text();/* recupere la div #personne */
    
    $.post("ajax.php","personne="+personne,function(donnees){
        if(donnees.validation == 'ok')
        {
            $('#resultat').html(donnees.resultat);
        }
        else{
            alert('Pb affichage');
        }

    },"json");

})