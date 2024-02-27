hoy = new Date();
    fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' +hoy.getDate();
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
    fechaActual =fecha + ' ' + hora;

$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Hab/Des</button></div></div>"  
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
                   columns: [ 1, 2, 3,4,5,6,7,8] //exportar solo la primera y segunda columna
                },
                filename: "Usuarios " + fechaActual, //nombre archivo
                title: "Usuarios " + fechaActual
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8]
                },
                filename: "Usuarios " + fechaActual,
                title: "Usuarios " + fechaActual
            },
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i></i> ',
                titleAttr: 'Copiar',
                className: 'btn btn-warning',
                orientation: 'portrait',
                exportOptions: {
                   columns: [ 1, 2, 3,4,5,6,7,8]
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
                   columns: [ 1, 2, 3,4,5,6,7,8]
                },
                filename: "Usuarios " + fechaActual,
                title: "Usuarios " + fechaActual
            }, //quite el selector de busqueda porq no haria falta en este caso por la cantidad de filas
        ],
    });
$("#btnNuevo").click(function(){
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Persona");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellidos = fila.find('td:eq(2)').text();
    cel = fila.find('td:eq(3)').text();
    user = fila.find('td:eq(4)').text();
    clave = fila.find('td:eq(5)').text();
    rol = fila.find('td:eq(6)').text();
    estado = fila.find('td:eq(7)').text();
    fecha = $.trim(fila.find('td:eq(8)').text());

    //alert(apellidos);
    //alert(rol);
    //alert(fecha);
    $("#nombre").val(nombre);
    $("#apellidos").val(apellidos);
    $("#cel").val(cel);
    $("#user").val(user);
    $("#clave").val(clave);
    $("#rol").val(rol);
    $("#estado").val(estado);
    //$("#fecha").val(fecha);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

// //botón BORRAR
// $(document).on("click", ".btnBorrar", function(){    
//     fila = $(this);
//     id = parseInt($(this).closest("tr").find('td:eq(0)').text());
//     opcion = 3 //borrar
//     var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
//     if(respuesta){
//         $.ajax({
//             url: "bd/crud.php",
//             type: "POST",
//             dataType: "json",
//             data: {opcion:opcion, id:id},
//             success: function(){
//                 tablaPersonas.row(fila.parents('tr')).remove().draw();
//             }
//         });
//     }   
// });




 //botón BORRAR
 $(document).on("click", ".btnBorrar", function() {
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    nombre = $(this).closest("tr").find('td:eq(1)').text();
    apellidos = $(this).closest("tr").find('td:eq(2)').text();
    cel = $(this).closest("tr").find('td:eq(3)').text();
    user = $(this).closest("tr").find('td:eq(4)').text();
    clave = $(this).closest("tr").find('td:eq(5)').text();
    rol = $(this).closest("tr").find('td:eq(6)').text();
    estado = $(this).closest("tr").find('td:eq(7)').text();
    fecha = $(this).closest("tr").find('td:eq(8)').text();
    //alert (id);
    //alert(estado);
    if(estado == "Deshabilitado")
    {
        estad2="Habilitar";
    }
    else
    {
        estad2="Deshabilitar"
    }
    opcion = 3 //borrar
    var respuesta = bootbox.confirm({
        message: "¿ Desea "+estad2+ " al "+rol+" : " + nombre + " " + apellidos + " ?",
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
                    url: "bd/crudUser.php",
                    type: "POST",
                    dataType: "json",
                    data: { opcion:opcion, id:id, estado:estado }
                    
                   // success: function(){ 
                        //tablaPersonas.row(fila).data([id,nombre,apellidos,cel,user,clave,rol,"sad",fecha]).draw();
                        //alert("estado"); 
                        //console.log(data);
                        //alert("estado");
                        // if(estado == "Deshabilitado")
                        // {
                        //     estado="Habilitado";
                        //     //alert("nop");
                        // }
                        // else
                        // {
                        //     estado="Deshabilitado";
                        // } 
                       //tablaPersonas.row(fila).data([id,nombre,apellidos,cel,user,clave,rol,"sad",fecha]).draw();          
                   // }        
                });
                //alert("ssdadadsass");
                if(estado == "Deshabilitado")
                {
                    Swal.fire({
                        type: 'success',
                        title: 'El usuario '+nombre+' '+ apellidos+ ' fue Habilitado',
                        confirmButtonColor: '#4369D7',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.value) {
                           // Para recargar la page
                            document.location.reload();
                        }
                    })
                } 
                else
                {
                    Swal.fire({
                        type: 'error',
                        title: 'El usuario '+nombre+' '+ apellidos+ ' fue Deshabilitado',
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
        }
    });
});




    
$("#formPersonas").submit(function(e){
    e.preventDefault();    

    nombre = $.trim($("#nombre").val());
    apellidos =$.trim($("#apellidos").val());
    cel =$.trim($("#cel").val());
    user =$.trim($("#user").val());
    clave =$.trim($("#clave").val());
    rol =$.trim($("#rol").val());
    estado =$.trim($("#estado").val());

    if(opcion==1)
    {
        fecha=fechaActual;
    }

    // alert(nombre);
    // alert(apellidos);
    // alert(cel);
    // alert(user);
    // alert(clave);
    // alert(rol);
    // alert(estado);
    // alert(fecha);

    $.ajax({
        url: "bd/crudUser.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre,apellidos:apellidos,cel:cel,user:user,clave:clave,rol:rol,estado:estado,fecha:fecha,id:id,opcion:opcion},
        success: function(data){  
            console.log(data);
            //Esto impedia que colocara los datos en la lista pero lo arregle colocando los mismos nombres que en la consulta de SQL de PHP
            Id_Usuario = data[0].Id_Usuario;            
            Nombre = data[0].Nombre;
            Apellidos = data[0].Apellidos;
            Celular = data[0].Celular;
            Usuario = data[0].usuario;
            Clave = data[0].Clave;
            Rol = data[0].Rol;
            Estado_Login = data[0].Estado_Login;

            if(Estado_Login== 0)
            {
                Estado_Login="Deshabilitado";
            }
            else
            {
                Estado_Login="Habilitado";
            }
            Fecha_Registro = data[0].Fecha_Registro;
            // alert(Id_Usuario);
            // alert(Nombre);
            // alert(Apellidos);
            // alert(Celular);
            // alert(Usuario);
            // alert(Clave);
            // alert(Rol);
            // alert(Estado_Login);
            // alert(Fecha_Registro);

            if(opcion == 1){tablaPersonas.row.add([Id_Usuario,Nombre,Apellidos,Celular,Usuario,Clave,Rol,Estado_Login,Fecha_Registro]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,apellidos,cel,user,clave,rol,estado,fecha]).draw();}           
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    






    //esto es para validar el nombre de usuario Henry Colque
    $(document).ready(function() {
        $('#user').on('blur', function() {
            $('#result-user').html('<img src="img/loader.gif" />').fadeOut(1000);
            var user = $(this).val();
            
            tipoNombre=0;
            $.ajax({
                type: "POST",
                url: "bd/verificarNombre.php",
                data: {user,tipoNombre},
                success: function(data) {
                    $('#result-user').fadeIn(1000).html(data);
                }
            });
        });
    });

    
});