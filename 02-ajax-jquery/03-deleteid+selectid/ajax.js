
$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
    })

    function ajax(){

        var id = $('#personne').find(":selected").val();/* trouve la valeur du 'select' */
        $.post("ajax.php","id="+id, function(donnees){

            if ( donnees.validation == 'ok')
            {
                $('#employes').html(donnees.resultat);
            }
            else{
                alert('pb liste employes');
            }

        },"json");
    }
})