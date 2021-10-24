var tableTipoHabitacion;

document.addEventListener('DOMContentLoaded', function () {


    tableTipoHabitacion = $('#datatableTipoHabitacion').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "tipoHabitacion/getTipoHabitacion",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idTipoHabitacion"
            },
            {
                "data": "Concepto"
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

    if (document.querySelector("#formTipoHabitacion")) {
        var formTipoHabitacion = document.querySelector("#formTipoHabitacion");
        formTipoHabitacion.onsubmit = function (e) {
            e.preventDefault();

            var intIdTipoHabitacion = document.querySelector('#idTipoHabitacion').value;
            var strTipoHabitacion = document.querySelector('#inputTipoHabitacion').value;

            if (strTipoHabitacion == '') {

                Swal.fire({
                    icon: 'error',
                    title: 'ATENCION',
                    text: 'Todos los campos son obligatorios!',
                });
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'tipoHabitacion/setTipoHabitacion';

            var formData = new FormData(formTipoHabitacion);
            request.open('POST', ajaxUrl, true);
            request.send(formData);
            console.log(request);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        $('#modalTipoHabitacion').modal('hide');
                        formTipoHabitacion.reset();

                        if (objData.msg == 'Datos guardados correctamente.') {
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
                        tableTipoHabitacion.ajax.reload(function () {

                        });

                    } else {
                        Swal('Error', objData.msg, 'error!');
                    }
                }
                return false;
            }
        }
    }



});

function openModal() {
    document.querySelector('#idTipoHabitacion').value = "";
    document.querySelector('#titleModal').innerHTML = "Nuevo";
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector("#formTipoHabitacion").reset();
    $('#modalTipoHabitacion').modal('show');
}


function fntEditTipoHabitacion(button) {

    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idTipoHabitacion = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + '/tipoHabitacion/getIdTipoHabitacion/' + idTipoHabitacion;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#idTipoHabitacion").value = objData.data.idTipoHabitacion;
                document.querySelector("#inputTipoHabitacion").value = objData.data.Concepto;
            } else {
                Swal("Error", objData.msg, "error");
            }
        }
    }
    $('#modalTipoHabitacion').modal('show');
}

function fntDelTipoHabitacion(button) {

    var idTipoHabitacion = button.getAttribute("rl");
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
            var ajaxUrl = base_url+'/tipoHabitacion/delTipoHabitacion/';
            var strData = "idTipoHabitacion="+idTipoHabitacion;

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
                          tableTipoHabitacion.ajax.reload(function () {});
                    } else {
                        Swal("Error", objData.msg, "error");
                    }
                }
            }
         
        }
      })
   
    }