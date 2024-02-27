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
    tablaProductos = $("#tablaProductos").DataTable({
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
                filename: "Lista de productos" + fechaYHora, //nombre archivo
                title: "Lista de productos" + fechaYHora
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
                filename: "Lista de productos" + fechaYHora,
                title: "Lista de productos" + fechaYHora
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i></i> ',
                titleAttr: 'Copiar',
                className: 'btn btn-warning',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 0,1]
                },
                filename: "Lista de productos " + fechaActual,
                title: "Lista de productos " + fechaActual
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
                filename: "Lista de productos" + fechaYHora,
                title: "Lista de productos" + fechaYHora
            }, //quite el selector de busqueda porq no haria falta en este caso por la cantidad de filas
        ],
    });
    
$("#btnNuevoProducto").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Producto");            
    $("#modalProductos").modal("show");        
    id=null;
   // alert("sdasd");
    opcion = 1; //alta
});    
 
$("#formProducto").submit(function(e){
    e.preventDefault();    
    //alert("asdsad");
    nombreProducto = $.trim($("#nombreProducto").val());  
    //alert(nombreProducto);
    $.ajax({
        url: "bd/crudProducto.php",
        type: "POST",
        dataType: "json",
        data: {nombreProducto:nombreProducto, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].idProducto;            
            nombreProducto = data[0].desProducto;
            alert(id);
            alert(nombreProducto);
            if(opcion == 1){tablaProductos.row.add([id,nombreProducto]).draw();}        
        }        
    });
    $("#modalProductos").modal("hide");    
    
});    


 //esto es para validar el nombre de usuario Henry Colque
 $(document).ready(function() {
    $('#nombreProducto').on('blur', function() {
        $('#result-nombreProducto').html('<img src="img/loader.gif" />').fadeOut(1000);

        var nombreProducto = $(this).val();
        tipoNombre=1;
        //alert (tipoNombre)
        $.ajax({
            type: "POST",
            url: "bd/verificarNombre.php",
            data: {nombreProducto,tipoNombre},
            success: function(data) {
                $('#result-nombreProducto').fadeIn(1000).html(data);
            }
        });
    });
});





    
});