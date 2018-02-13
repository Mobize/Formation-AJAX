document.addEventListener("DOMContentLoaded", function(event){

    document.getElementById('submit').addEventListener('click',function(event){
        event.preventDefault();
        ajax();
    })

    function ajax(){

        if( window.XMLHttpRequest )  r = new XMLHttpRequest();     
        else r = new ActiveXObject("Microsoft.XMLHTTP"); 
        var p = document.getElementById('personne');
        var id= p.options[p.selectedIndex].value;
        var parameters ="id="+id;
        r.open('POST',"ajax.php",true);
        r.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
        r.onreadystatechange = function(){

            if(r.readyState == 4 && r.status == 200 )
            {
                var obj = JSON.parse(r.responseText);
                document.getElementById('employes').innerHTML = obj.resultat;
            }
        }
        r.send(parameters);
    }
});