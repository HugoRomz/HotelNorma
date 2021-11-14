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
                "data": "fecha_salida"
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
        // 'dom': 'lBfrtip',
        // 'buttons': [
        //     {
        //         "extend": "copyHtml5",
        //         "text": "<i class='far fa-copy'></i> Copiar",
        //         "titleAttr":"Copiar",
        //         "className": "btn btn-secondary"
        //     },{
        //         "extend": "excelHtml5",
        //         "text": "<i class='fas fa-file-excel'></i> Excel",
        //         "titleAttr":"Esportar a Excel",
        //         "className": "btn btn-success"
        //     },{
        //         "extend": "csvHtml5",
        //         "text": "<i class='fas fa-file-csv'></i> CSV",
        //         "titleAttr":"Esportar a CSV",
        //         "className": "btn btn-info"
        //     }
        // ],
        "responsive": "true",
        "Destroy": "true",

    });

    // if (document.querySelector("#formCliente")) {
    //     var formCliente = document.querySelector("#formCliente");
    //     formCliente.onsubmit = function (e) {
    //         e.preventDefault();

    //         var strIdHabitacion = document.querySelector('#idCliente').value;
    //         var strNombreCliente = document.querySelector('#inputNombreCliente').value;
    //         var strApellidoCliente = document.querySelector('#inputApellidoCliente').value;
    //         var strDireccion = document.querySelector('#inputDireccionCliente').value;
    //         var intEdad = document.querySelector('#inputEdadCliente').value;
            

    //         if (strIdHabitacion == '',strNombreCliente == '',strApellidoCliente == '',strDireccion == '',intEdad=='') {

    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'ATENCION',
    //                 text: 'Todos los campos son obligatorios!',
    //             });
    //             return false;
    //         }
    //         var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    //         var ajaxUrl = base_url + 'Cliente/setCliente';

    //         var formData = new FormData(formCliente);
    //         request.open('POST', ajaxUrl, true);
    //         request.send(formData);
    //         console.log(request);

    //         request.onreadystatechange = function () {

    //             if (request.readyState == 4 && request.status == 200) {
    //                 var objData = JSON.parse(request.responseText);

    //                 if (objData.status) {
    //                     $('#modalCliente').modal('hide');
    //                     formCliente.reset();
    //                     console.log(objData.msg);
    //                     if (objData.msg == '1') {
                            
    //                         Swal.fire(
    //                             'Guardado!',
    //                             'Se guardo exitosamente',
    //                             'success'
    //                         )
    //                     } else {
    //                         Swal.fire(
    //                             'Editado!',
    //                             'Se actualizo exitosamente',
    //                             'success'
    //                         )
    //                     }
    //                     tableCliente.ajax.reload(function () {

    //                     });

    //                 } else {
    //                     Swal.fire(
    //                         'Error!',
    //                         'No se pudo realizar la accion',
    //                         'error'
    //                     )
    //                 }
    //             }
    //             return false;
    //         }
    //     }
    // }



});

