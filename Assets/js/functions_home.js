window.addEventListener('load',function(){
    fntOcupadoHabitacion();
    fntLibreHabitacion();
    fntClientes() ;
},false);

function fntOcupadoHabitacion() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Home/getCountOcupadoHabitacion';
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200)  {
            var obj = JSON.parse(request.responseText);
            document.getElementById("numeroEstadia").innerHTML =obj[0].numeroH;
        }
    }
    
    
}
function fntLibreHabitacion() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Home/getCountLibreHabitacion';
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200)  {
            var obj = JSON.parse(request.responseText);
            document.getElementById("numeroHabitaciones").innerHTML =obj[0].numeroH;
        }
    }
    
    
}

function fntClientes() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Home/getCountClientes';
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200)  {
            var obj = JSON.parse(request.responseText);
            document.getElementById("numeroClientes").innerHTML =obj[0].numeroH;
        }
    }
    
    
}
