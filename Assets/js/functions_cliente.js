var tableHabitacion;

document.addEventListener('DOMContentLoaded', function () {


    tableCliente = $('#datatableCliente').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Cliente/getCliente",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idcliente"
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellido"
            },
            {
                "data": "direccion"
            },
            {
                "data": "edad"
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
                "className": "btn btn-dark"
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
        "responsive": "true",
        "Destroy": "true",

    });

    if (document.querySelector("#formCliente")) {
        var formCliente = document.querySelector("#formCliente");
        formCliente.onsubmit = function (e) {
            e.preventDefault();

            var strIdHabitacion = document.querySelector('#idCliente').value;
            var strNombreCliente = document.querySelector('#inputNombreCliente').value;
            var strApellidoCliente = document.querySelector('#inputApellidoCliente').value;
            var strDireccion = document.querySelector('#inputDireccionCliente').value;
            var intEdad = document.querySelector('#inputEdadCliente').value;
            

            if (strIdHabitacion == '',strNombreCliente == '',strApellidoCliente == '',strDireccion == '',intEdad=='') {

                Swal.fire({
                    icon: 'error',
                    title: 'ATENCION',
                    text: 'Todos los campos son obligatorios!',
                });
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Cliente/setCliente';

            var formData = new FormData(formCliente);
            request.open('POST', ajaxUrl, true);
            request.send(formData);
            console.log(request);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        $('#modalCliente').modal('hide');
                        formCliente.reset();
                        console.log(objData.msg);
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
                        tableCliente.ajax.reload(function () {

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

// window.addEventListener('load',function(){
//     fntTipoHabitacion();
// },false);

// function fntTipoHabitacion() {
//     var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
//     var ajaxUrl = base_url + 'tipoHabitacion/getSelectTipoHabitacion';
//     request.open('GET', ajaxUrl, true);
//     request.send();

//     request.onreadystatechange = function(){
//         if (request.readyState == 4 && request.status == 200)  {

//             document.querySelector('#selectTipoHabitacion').innerHTML = request.responseText;
//             document.querySelector('#selectTipoHabitacion').value = 1;
//             $('#selectTipoHabitacion').selectpicker('render');
//         }
//     }
    
// }

function openModal() {
    document.querySelector('#idcliente').value = "";
    document.querySelector('#titleModal').innerHTML = "Nuevo";
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector("#formCliente").reset();
    $('#modalCliente').modal('show');
}


function fntEditCliente(button) {

    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idCliente = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + '/Cliente/getIdCliente/' + idCliente;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            console.log(objData);
            if (objData.status) {
                document.querySelector("#idCliente").value = objData.data.idcliente;
                document.querySelector("#inputNombreCliente").value = objData.data.nombre;
                document.querySelector("#inputApellidoCliente").value = objData.data.apellido;
                document.querySelector("#inputDireccionCliente").value = objData.data.direccion;
                document.querySelector("#inputEdadCliente").value = objData.data.edad;
                // document.querySelector("#inputCaracteristicaHabitacion").value = objData.data.caracteristica;
                // $('#selectTipoHabitacion').selectpicker('render');
                
            } else {
                Swal("Error", objData.msg, "error");
            }
        }
    }
    $('#modalCliente').modal('show');
}

function fntDelCliente(button) {

    var idCliente = button.getAttribute("rl");
    Swal.fire({
        title: 'Estas seguro?',
        text: "Se eliminara el dato!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url+'/Cliente/delCliente/';
            var strData = "idCliente="+idCliente;

            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    // console.log(request.responseText);
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        Swal.fire(
                            'Eliminado!',
                            'Tu registro fue eliminado.',
                            'success'
                          );
                          tableCliente.ajax.reload(function () {});
                    } else {
                        Swal("Error", objData.msg, "error");
                    }
                }
            }
         
        }
      })
   
    }