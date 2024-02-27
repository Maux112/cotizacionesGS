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
$(document).ready(function(){
    tablaPrecios = $("#tablaPrecios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarPrecio'>Editar</button><button class='btn btn-danger btnBorrarPrecio'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        },        //para usar los botones export  mau 06/10/2020
        responsive: "true",
        dom: 'Bfrtilp',
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel" ></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8,9] //exportar solo la primera y segunda columna
                },
                filename: "Precios de Material " + fechaYHora, //nombre archivo
                title: "Precios de Material " + fechaYHora
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8,9]
                },
                filename: "Precios de Material " + fechaYHora,
                title: "Precios de Material " + fechaYHora
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i></i> ',
                titleAttr: 'Copiar',
                className: 'btn btn-warning',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8,9]
                },
                filename: "Usuarios " + fechaActual,
                title: "Usuarios " + fechaActual
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8,9]
                },
                filename: "Precios de Material " + fechaYHora,
                title: "Precios de Material " + fechaYHora
            }, //quite el selector de busqueda porq no haria falta en este caso por la cantidad de filas
        ],
    });
    
$("#btnPrecio").click(function(){
    $("#formPrecio").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Registro");            
    $("#modalPrecioCRUD").modal("show");        
    idPrecio=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditarPrecio", function(){
    fila = $(this).closest("tr");
    idPrecio = parseInt(fila.find('td:eq(0)').text());
    //alert(idPrecio);
    nombreProducto = fila.find('td:eq(1)').text();
    gramaje = fila.find('td:eq(2)').text();
    medida = fila.find('td:eq(3)').text();
    cantPaq = fila.find('td:eq(4)').text();
    precio = fila.find('td:eq(5)').text();
    // dasdasda= fila.find('td:eq(6)').text();
    marca = fila.find('td:eq(7)').text();
    proveedor = fila.find('td:eq(8)').text();

 
    $("#nombreProducto").val(nombreProducto);
    $("#gramaje").val(gramaje);
    $("#medida").val(medida);
    $("#cantPaq").val(cantPaq);
    $("#precio").val(precio);
    $("#marca").val(marca);
    $("#proveedor").val(proveedor);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Registro");            
    $("#modalPrecioCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrarPrecio", function(){    
    fila = $(this);
    idPrecio = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = bootbox.confirm({
        message: "¿ Desea borrar el Registro ?",
        buttons: {
            confirm: {
                label: 'Sí',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(respuesta) {
            // console.log('This was logged in the callback: ' + respuesta);
            if (respuesta) {
                //alert("Entre");
                $.ajax({
                    url: "bd/crudPrecioMaterial.php",
                    type: "POST",
                    dataType: "json",
                    data: { opcion:opcion, idPrecio:idPrecio }     
                });
                    Swal.fire({
                        type: 'error',
                        title: 'El registro fue eliminado',
                        confirmButtonColor: '#4369D7',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                           // Para recargar la page
                            document.location.reload();
                        }
                    })
                
            }
        }
    });
});
    
$("#formPrecio").submit(function(e){
    e.preventDefault();    
    //alert("asdad");
    nombreProducto = $.trim($("#nombreProducto").val());
    gramaje = $.trim($("#gramaje").val());
    medida = $.trim($("#medida").val());
    cantPaq = $.trim($("#cantPaq").val());
    precio = $.trim($("#precio").val());
    marca = $.trim($("#marca").val());  
    proveedor = $.trim($("#proveedor").val());
    // alert(nombreProducto);
    // alert(gramaje);
    // alert(medida);
    // alert(cantPaq);
    // alert(precio);
    // alert(marca);
    // alert(proveedor);
    // alert(idPrecio);
    if( nombreProducto==""  || gramaje==""  || medida==""  || cantPaq==""  || marca==""  || proveedor=="" || precio==""  )
    {
       // alert("fALASD");
        Swal.fire({
            type: 'error',
            title: 'Llenar todos los campos',
            confirmButtonColor: '#4369D7',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.value) {
               // Para recargar la page
              // $("#modalPrecioCRUD").modal("hide");  
            }
        })
    }
    else{

        $.ajax({
            url: "bd/crudPrecioMaterial.php",
            type: "POST",
            dataType: "json",
            data: {nombreProducto:nombreProducto, gramaje:gramaje, medida:medida,cantPaq:cantPaq,precio:precio,marca:marca,proveedor:proveedor,idPrecio:idPrecio, opcion:opcion},
            success: function(data){  
                console.log(data);
                //alert("nombreProducto");
                // if(opcion == 1){tablaPrecios.row.add([id,nombre,pais,edad]).draw();}
                // else{tablaPrecios.row(fila).data([id,nombre,pais,edad]).draw();}            
            }        
        });
        $("#modalPrecioCRUD").modal("hide");  
    }
           
    
});    

    
});
$('#modalPrecioCRUD').on('hidden.bs.modal', function(e) {
    document.location.reload();
})