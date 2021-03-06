var tableRerservacion;

document.addEventListener('DOMContentLoaded', function () {

    tableRerservacion = $('#datatableReservacion').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Reservacion/getReservacion",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idreserva"
            },
            {
                "data": "no_habitacion"
            },
            {
                "data": "Concepto"
            },
            {
                "data": "fecha_ingreso"
            },
            {
                "data": "fecha_salida"
            },
            {
                "data": "status"
            },
            {
                "data": "options"
            }
        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "order": [[ 1, "asc" ]],
        "responsive": "true",
        "Destroy": "true",

    });



    if (document.querySelector("#formReservacion")) {
        var formReservacion = document.querySelector("#formReservacion");
        formReservacion.onsubmit = function (e) {
            e.preventDefault();

            
            var strSelectCliente = document.querySelector('#selectCliente').value;
            

            if (strSelectCliente=='') {

                Swal.fire({
                    icon: 'error',
                    title: 'ATENCION',
                    text: 'Todos los campos son obligatorios!',
                });
                return false;
            }
            

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Reservacion/setReservacion';

            var formData = new FormData(formReservacion);
            request.open('POST', ajaxUrl, true);
            request.send(formData);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        $('#modalreserva').modal('hide');
                        formReservacion.reset();
                        fechaActual();
                      
                        if (objData.msg == '1') {
                            
                            Swal.fire(
                                'Guardado!',
                                'Se guardo exitosamente',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Editado!',
                                'Se actualizo exitosamente',
                                'success'
                            )
                        }
                        
                        formReservacion.reset();
                        fechaActual();
                        tableRerservacion.ajax.reload(function () {

                        });

                    } else {
                        Swal.fire(
                            'Error!',
                            'No se pudo realizar la accion',
                            'error'
                        )
                    }
                }
                return false;
            }
        }
    }




});

window.addEventListener('load', function () {
    fntCliente();
    fechaActual();
    
}, false);

 function fechaActual() {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo a??o
    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes //agrega cero si el menor de 10
    document.getElementById('inputFechaEntrada').value = ano + "-" + mes + "-" + dia;
 }
function fntCliente() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'reservacion/getSelectTipoCliente';
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            document.querySelector('#selectCliente').innerHTML = request.responseText;
            document.querySelector('#selectCliente').value = 1;
            $('#selectCliente').selectpicker('render');
            $('#selectConcepto').selectpicker('render');
        }
    }

}

function fntSalidaReservacion(button) {

    var idReserva = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'reservacion/DeleteReserva/' + idReserva ;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            Swal.fire(
                'Habitacion Libre!',
                'Se actualizo exitosamente',
                'success'
            );
            tableRerservacion.ajax.reload(function () {

            });
            formReservacion.reset();
                        fechaActual();
            
        }
    }
}

function fntImprimirReservacion(button) {

    var idReserva = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Reportes/imprimirReporte/' + idReserva ;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            
            if (objData.status) {
              
                document.getElementById("idpago").innerHTML = objData.data.idpago;
                document.getElementById("idCliente").innerHTML = objData.data.idcliente;
                document.getElementById("fecha_salida").innerHTML = objData.data.fecha_salida;
                document.getElementById("total").innerHTML = objData.data.total;
                document.getElementById("dias").innerHTML = objData.data.dias;
                document.getElementById("nombre").innerHTML = objData.data.nombre;
                formReservacion.reset();
                fechaActual();
                
            } else {
                 Swal.fire(
                'Erro!',
                'Se actualizo exitosamente',
                'success'
            );
            }
            
           
            
        }
    }
    $('#modalTicket').modal('show');

}
function printDiv(Impresion) {
     var contenido= document.getElementById(Impresion).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
     location.reload();
}



function fntIngresoReservacion(button) {

    var idHabitacion = button.getAttribute("precio");
    var habitacion = button.getAttribute("habitacion");
    var reserva = button.getAttribute("rl");

        document.querySelector("#selectCliente").removeAttribute('disabled');
        document.querySelector("#selectConcepto").removeAttribute('disabled');
        $('#selectCliente').selectpicker('render'); 
        $('#selectConcepto').selectpicker('render');

       document.querySelector("#inputPrecioHabitacion").value = idHabitacion;
       document.querySelector("#inputHabitacion").value = habitacion;
       document.querySelector("#inputReserva").value = reserva;          
             
    $('#modalreserva').modal('show');
}

function fntModificarReservacion(button) {

    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idReserva = button.getAttribute("rl");
    var idHabitacion = button.getAttribute("precio");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'Reportes/imprimirReporte/' + idReserva ;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var objData = JSON.parse(request.responseText);
            
            if (objData.status) {
                

                document.querySelector("#inputReserva").value = idReserva;   
                document.querySelector("#inputPrecioHabitacion").value = idHabitacion;
                
          
                document.querySelector("#inputFechaSalida").value = objData.data.fecha_salida;
                document.querySelector("#inputNumeroDias").value = objData.data.dias;
                document.querySelector("#selectCliente").value = objData.data.idcliente;
                document.querySelector("#selectConcepto").value = objData.data.concepto;
                document.querySelector("#idpago1").value = objData.data.idpago;
                

                $('#selectCliente').selectpicker('render'); 
                $('#selectConcepto').selectpicker('render');

                
                
            } else {
                 Swal.fire(
                'Erro!',
                'Se actualizo exitosamente',
                'success'
            );
            }
            
           
            
        }
    }
    $('#modalreserva').modal('show');
}