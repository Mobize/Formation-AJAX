$(document).ready(function(){

    /* initialisations diverses */
   /*  var lastid = 0; */
    var timer = setInterval(affichage_message,5000);/* rafraichit les messages toutes les 5 secondes */
    var timer_membre_connecte = setInterval(affichage_membre_connecte,10000);/* rafraichit lea liste des membres toutes les 10 secondes */
    $('#message_tchat').scrollTop($('#message_tchat')[0].scrollHeight);/* met l'ascenceur tout en bas pour rendre visible le dernier message */
    
    convertir_smiley();

    function affichage_membre_connecte(){

        showLoader('#liste_membre_connecte');

        $.post('inc/ajax.php','action=affichage_membre_connecte',function(donnees){
            if (donnees.validation == 'ok')
            {
                $('#liste_membre_connecte').empty().append(donnees.resultat);
                hideLoader();
            }
        },'json');
    }

    function convertir_smiley(){

        $('#message_tchat p').each(function(){  /* pour chaque paragraphe de ma div #message_tchat */
            $('#message_tchat').html( $('#message_tchat').html().replace(':)','<img src="smil/smiley1.gif">') );/* converti les symbole en images */
            $('#message_tchat').html( $('#message_tchat').html().replace(':|','<img src="smil/smiley2.gif">') );
            $('#message_tchat').html( $('#message_tchat').html().replace(':d','<img src="smil/smiley3.gif">') );
            $('#message_tchat').html( $('#message_tchat').html().replace(':p','<img src="smil/smiley4.gif">') );
            $('#message_tchat').html( $('#message_tchat').html().replace('{3','<img src="smil/smiley5.gif">') );
            $('#message_tchat').html( $('#message_tchat').html().replace(':o','<img src="smil/smiley6.gif">') );
        })

    }

    function affichage_message(){

        showLoader('#message_tchat');

        $.post('inc/ajax.php','action=affichage_message&lastid='+lastid,function(donnees){

            $('#message_tchat').append(donnees.resultat);
            lastid=donnees.lastid;
            $('#message_tchat').scrollTop($('#message_tchat')[0].scrollHeight);
            convertir_smiley();

            hideLoader();

        },'json')

        
    }

    /* insertion de message sur clic du bouton envoi */
    $('#submit').on('click',function(event){

        event.preventDefault();
        showLoader('#formulaire_tchat');
        clearInterval(timer);/* stop le timer */
        var message= $('#message').val();
        var parameters = 'message='+message+'&action=envoi_message';
        $.post('inc/ajax.php',parameters,function(donnees){
            if ( donnees.validation == 'ok')
            {
                affichage_message();
                $('#message').val('');/* remet le champ text vide */
                $('#message').focus();
            }else{
                alert("pb");
            }
            timer = setInterval(affichage_message,5000);/* reprend le timer */
            hideLoader();
        },'json');
    })

    /* insertion de smiley au clic */
    $('.smiley').on('click',function(event){
        var prevMesg = $('#message').val();/* recupere la valeur de mon message */
        var emotiText = $(event.target).attr('alt');/* recupere la valeur de l'attribut alt de ma classe smiley exemple->   :)  */
        $("#message").val(prevMesg + emotiText);/*affiche le message + smiley */
    });

    /* affiche une image de chargement */
    function showLoader(div){
        $(div).append("<div class='loader'></div>");
        $('.loader').fadeTo(500,0.6);
    }

    function hideLoader(){
        $('.loader').fadeOut(500,function(){
            $('.loader').remove();
        });
    }

});/* fin du document ready */