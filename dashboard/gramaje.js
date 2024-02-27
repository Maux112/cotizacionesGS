$(document).ready(function() {
    //Codigo para obtener fecha jms

    hoy = new Date();
    fecha = hoy.getDate() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getFullYear();
    horas = hoy.getHours();
    minutos = hoy.getMinutes();
    segundos = hoy.getSeconds();


    if (horas < 10) {
        hrs = '0' + hoy.getHours();
    } else {
        hrs = hoy.getHours();
    }


    if (minutos < 10) {
        min = '0' + hoy.getMinutes();
    } else {
        min = hoy.getMinutes();
    }

    if (segundos < 10) {
        seg = '0' + hoy.getSeconds();
    } else {
        seg = hoy.getSeconds();
    }
    hora = hrs + ':' + min + ':' + seg;

    fechaYHora = fecha + ' ' + hora;
    tablaGramaje = $("#tablaGramaje").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },
        //para usar los botones export  mau 06/10/2020
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel" ></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [0, 1] //exportar solo la primera y segunda columna
                },
                filename: "Gramajes registrados " + fechaYHora, //nombre archivo
                title: "Gramajes registrados " + fechaYHora
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                orientation: 'portrait',
                exportOptions: {
                    columns: [0, 1]
                },
                filename: "Gramajes registrados " + fechaYHora,
                title: "Gramajes registrados " + fechaYHora
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i></i> ',
                titleAttr: 'Copiar',
                className: 'btn btn-warning',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 0,1 ]
                },
                filename: "Gramajes registrados " + fechaActual,
                title: "Gramajes registrados " + fechaActual
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info',
                orientation: 'portrait',
                exportOptions: {
                    columns: [0, 1]
                },
                filename: "Gramajes registrados " + fechaYHora,
                title: "Gramajes registrados " + fechaYHora
            }, //quite el selector de busqueda porq no haria falta en este caso por la cantidad de filas
        ],
    });

    // Ver eta parte es solo para admitir puntos o comas
//$("#desGramaje").mask('ZZ',{translation:  {'Z': {pattern: /[^.,]/, recursive: true}}});
    
$("#btnNuevoGramaje").click(function(){
    $("#formGramaje").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Gramaje");            
    $("#modalGramaje").modal("show");        
    id=null;
   // alert("sdasd");
    opcion = 1; //alta
});    
$("#formGramaje").submit(function(e){
    e.preventDefault();    
    //alert("asdsad");
    desGramaje = $.trim($("#desGramaje").val());  
    //alert(desGramaje);
    $.ajax({
        url: "bd/crudGramaje.php",
        type: "POST",
        dataType: "json",
        data: {desGramaje:desGramaje, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].idGramaje;            
            gramaje = data[0].desGramaje;
            //alert(id);
            //alert(gramaje);
            if(opcion == 1){tablaGramaje.row.add([id,gramaje]).draw();}        
        }        
    });
    $("#modalGramaje").modal("hide");    
    
}); 



 //esto es para validar el nombre de usuario Henry Colque
 $(document).ready(function() {
    $('#desGramaje').on('blur', function() {
        $('#result-desGramaje').html('<img src="img/loader.gif" />').fadeOut(1000);

        var desGramaje = $(this).val();
        tipoNombre=2;
        //alert (tipoNombre)
        $.ajax({
            type: "POST",
            url: "bd/verificarNombre.php",
            data: {desGramaje,tipoNombre},
            success: function(data) {
                $('#result-desGramaje').fadeIn(1000).html(data);
            }
        });
    });
});

    
});