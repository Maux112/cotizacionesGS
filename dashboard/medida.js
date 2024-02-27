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
    tablaMedida = $("#tablaMedida").DataTable({
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
                filename: "Medidas registradas " + fechaYHora, //nombre archivo
                title: "Medidas registradas " + fechaYHora
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
                filename: "Medidas registradas " + fechaYHora,
                title: "Medidas registradas " + fechaYHora
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
                filename: "Medidas registradas " + fechaActual,
                title: "Medidas registradas " + fechaActual
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
                filename: "Medidas registradas " + fechaYHora,
                title: "Medidas registradas " + fechaYHora
            }, //quite el selector de busqueda porq no haria falta en este caso por la cantidad de filas
        ],
    });

    // Ver eta parte es solo para admitir puntos o comas
//$("#desGramaje").mask('ZZ',{translation:  {'Z': {pattern: /[^.,]/, recursive: true}}});
    
$("#btnNuevaMedida").click(function(){
    $("#formMedida").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Medida");            
    $("#modalMedida").modal("show");        
    id=null;
   // alert("sdasd");
    opcion = 1; //alta
});    
$("#formMedida").submit(function(e){
    e.preventDefault();    
    //alert("asdsad");
    ancho = $.trim($("#ancho").val()); 
    largo = $.trim($("#largo").val()); 
    desMedida = ancho+" X "+largo;

    //alert(desMedida);
    $.ajax({
        url: "bd/crudMedida.php",
        type: "POST",
        dataType: "json",
        data: {desMedida:desMedida, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].idMedida;            
            Medida = data[0].desmedida;
            if(opcion == 1){tablaMedida.row.add([id,Medida]).draw();}        
        }        
    });
    $("#modalMedida").modal("hide");    
    
});    






//esto es para validar el nombre de usuario Henry Colque
    $('#ancho').on('blur', function() {
        $('#result-desMedida').html('<img src="img/loader.gif" />').fadeOut(1000);
        ancho = $(this).val();
        largo = $.trim($("#largo").val()); 
        desMedida = ancho+" X "+largo;
        tipoNombre=2;
        //alert (tipoNombre)
        $.ajax({
            type: "POST",
            url: "bd/verificarNombre.php",
            data: {desMedida,tipoNombre},
            success: function(data) {
                $('#result-desMedida').fadeIn(1000).html(data);
            }
        });
    });

    $('#largo').on('blur', function() {
        $('#result-desMedida').html('<img src="img/loader.gif" />').fadeOut(1000);
        largo = $(this).val();
        ancho = $.trim($("#ancho").val()); 
        desMedida = ancho+" X "+largo;
        tipoNombre=3;
        //alert (tipoNombre)
        $.ajax({
            type: "POST",
            url: "bd/verificarNombre.php",
            data: {desMedida,tipoNombre},
            success: function(data) {
                $('#result-desMedida').fadeIn(1000).html(data);
            }
        });
    });

    
});