var tableReportes;

document.addEventListener('DOMContentLoaded', function () {

    tableReportes = $('#datatableReportes').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/es_es.json"
        },
        "ajax": {
            "url": " " + base_url + "Reportes/getReportes",
            "dataSrc": ""
        },
        "columns": [{
                "data": "idpago"
            },
            {
                "data": "concepto"
            },
            {
                "data": "dias"
            },
            {
                "data": "fecha_salida"
            },
            {
                "data": "total"
            },
            {
                "data": "idcliente"
            },
            {
                "data": "no_habitacion"
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


});