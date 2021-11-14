var tableHabitacion;

document.addEventListener('DOMContentLoaded', function () {


    tableHabitacion = $('#datatableHabitacion').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Habitacion/getHabitacion",
            "dataSrc": ""
        },
        "columns": [{
                "data": "no_habitacion"
            },
            {
                "data": "Concepto"
            },
            {
                "data": "precio"
            },
            {
                "data": "no_piso"
            },
            {
                "data": "no_personas"
            },
            {
                "data": "caracteristica"
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
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive": "true",
        "Destroy": "true",

    });

    if (document.querySelector("#formHabitacion")) {
        var formHabitacion = document.querySelector("#formHabitacion");
        formHabitacion.onsubmit = function (e) {
            e.preventDefault();

            var intIdHabitacion = document.querySelector('#idHabitacion').value;
            var strTipoHabitacion = document.querySelector('#selectTipoHabitacion').value;
            var strPrecioHabitacion = document.querySelector('#inputPrecioHabitacion').value;
            var strNumeroPiso = document.querySelector('#inputNumeroPiso').value;
            var strNumeroPersonas = document.querySelector('#inputNumeroPersonas').value;
            var strCaracteristicaHabitacion = document.querySelector('#inputCaracteristicaHabitacion').value;

            if (intIdHabitacion == '',strTipoHabitacion == '',strPrecioHabitacion == '',strNumeroPiso == '',strCaracteristicaHabitacion=='',strNumeroPersonas == '') {

                Swal.fire({
                    icon: 'error',
                    title: 'ATENCION',
                    text: 'Todos los campos son obligatorios!',
                });
                return false;
            }
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
            var ajaxUrl = base_url + 'Habitacion/setHabitacion';

            var formData = new FormData(formHabitacion);
            request.open('POST', ajaxUrl, true);
            request.send(formData);
            console.log(request);

            request.onreadystatechange = function () {

                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        $('#modalHabitacion').modal('hide');
                        formHabitacion.reset();
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
                        tableHabitacion.ajax.reload(function () {

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

window.addEventListener('load',function(){
    fntTipoHabitacion();
},false);

function fntTipoHabitacion() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + 'tipoHabitacion/getSelectTipoHabitacion';
    request.open('GET', ajaxUrl, true);
    request.send();

    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200)  {

            document.querySelector('#selectTipoHabitacion').innerHTML = request.responseText;
            document.querySelector('#selectTipoHabitacion').value = 1;
            $('#selectTipoHabitacion').selectpicker('render');
        }
    }
    
}

function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('#titleModal').innerHTML = "Nuevo";
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector("#formHabitacion").reset();
    $('#modalHabitacion').modal('show');
}


function fntEditHabitacion(button) {

    document.querySelector('#titleModal').innerHTML = "Actualizar";
    document.querySelector('#btnText').innerHTML = "Actualizar";

    var idHabitacion = button.getAttribute("rl");

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
    var ajaxUrl = base_url + '/Habitacion/getIdHabitacion/' + idHabitacion;
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            // console.log(request.responseText);
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector("#id").value = objData.data.no_habitacion;
                document.querySelector("#idHabitacion").value = objData.data.no_habitacion;
                document.querySelector("#selectTipoHabitacion").value = objData.data.tipo;
                document.querySelector("#inputPrecioHabitacion").value = objData.data.precio;
                document.querySelector("#inputNumeroPiso").value = objData.data.no_piso;
                document.querySelector("#inputNumeroPersonas").value = objData.data.no_personas;
                document.querySelector("#inputCaracteristicaHabitacion").value = objData.data.caracteristica;
                $('#selectTipoHabitacion').selectpicker('render');
                
            } else {
                Swal("Error", objData.msg, "error");
            }
        }
    }
    $('#modalHabitacion').modal('show');
}

function fntDelHabitacion(button) {

    var idHabitacion = button.getAttribute("rl");
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
            var ajaxUrl = base_url+'/Habitacion/delHabitacion/';
            var strData = "idHabitacion="+idHabitacion;

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
                          tableHabitacion.ajax.reload(function () {});
                    } else {
                        Swal("Error", objData.msg, "error");
                    }
                }
            }
         
        }
      })
   
    }