$(document).ready(function(){
     
$("#btnPrueba").click(function(){
    //alert("soy el boton 1");
    anchoPedido = $.trim($("#cotizacion_ancho_pedido").val());
    largoPedido = $.trim($("#cotizacion_largo_pedido").val());
    cm2Pedido=anchoPedido*largoPedido;
    alert("Cm2 del pedido: "+cm2Pedido);
});    


var precio=0;
$("#material_elegido").on('change', function() {
    alert( this.value );
   // para elegir solo el texto
    var selected = this.options[this.selectedIndex].text;
    alert(selected);

    var separa = selected.split(",");
    var material = separa[0];
    var gramaje = separa[1];
    var medida = separa[2];
    var marca = separa[3];
    precio = separa[4];
    var paquete = separa[5];

    alert(material);
    alert(gramaje);
    alert(medida);
    alert(marca);
    alert(precio);
    alert(paquete);

    var calCm2=medida.split("X");
    var cm2MaterialAncho=calCm2[0];
    var cm2MaterialLargo=calCm2[1];
    var cm2Material=cm2MaterialAncho*cm2MaterialLargo;
    alert(cm2Material);
  });

//   $( "#cantidadPedido" ).keyup(function() {
//     var cantidad=this.value;
//     millaresI(cantidad);
//   });
  $( "#cantidadPedido" ).on("keyup change", function(e) {
    var cantidad=this.value;
    if(cantidad>0)
    {
        millaresI(cantidad);
        $("#armado").val(0);
        $("#demasiaCantImpr").val(0);
        $("#cantImpr").val(0);
    }
    else
    {
        $("#cantidadPedido").val(0);
        millaresI(0);
    }
  });
  function millaresI (cantidad)
  {
    var cantMillar=0;
    //alert(cantidad);
    if (cantidad == "" || cantidad ==0)
    {
        cantMillar=0;
        //alert(cantidad);
    }
    else if (cantidad>0 &&cantidad <=1000)
    {
        //alert("Es 1 millar");
        cantMillar=1;
    }
    else if(cantidad >1000 && cantidad<=1500)
    {
        // alert("Son 1.8 millares");
        cantMillar=1.8;
    }
    else if(cantidad >1500 && cantidad<=2000)
    {
        // alert("Son 2 millares");
        cantMillar=2;
    }
    else if(cantidad >2000 && cantidad<=2500)
    {
        // alert("Son 3 millares");
        cantMillar=2.8;
    }
    else if(cantidad >2500 && cantidad<=3000)
    {
        // alert("Son 1.8 millares");
        cantMillar=3;
    }
    else if(cantidad >3000 && cantidad<=4000)
    {
        // alert("Son 4 millares");
        cantMillar=4;
    }
    else if(cantidad >4000 && cantidad<=5000)
    {
        // alert("Son 5 millares");
        cantMillar=5;
    }
    else if(cantidad >5000 && cantidad<=6000)
    {
        // alert("Son 6 millares");
        cantMillar=6;
    }
    else if(cantidad >6000 && cantidad<=7000)
    {
        // alert("Son 7 millares");
        cantMillar=7;
    }
    else if(cantidad >7000 && cantidad<=8000)
    {
        // alert("Son 8 millares");
        cantMillar=8;
    }
    else if(cantidad >8000 && cantidad<=9000)
    {
        // alert("Son 9 millares");
        cantMillar=9;
    }
    else if(cantidad >9000 && cantidad<=10000)
    {
        // alert("Son 10 millares");
        cantMillar=10;
    }
    $("#millarImpr").val(cantMillar);
  }

//Esto es para realizar 2 eventos a la vez
$( "#armado" ).on("change keyup", function(e) {
    armado=this.value;
    //alert(armado);
    cantidad2 =$("#cantidadPedido").val();
    var cantimpr=0;
    if(cantidad2 != "" && armado != "" && cantidad2 != "0" && armado != "0"  )
    {
        cantimpr=cantidad2/armado
        //alert(cantimpr);
        if (cantimpr<1)
        {
            Swal.fire({
                type: 'error',
                title: 'El armado es incorrecto',
                confirmButtonColor: '#4369D7',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.value) {
                    this.value=0;
                    $("#cantImpr").val(0);
                    $("#demasiaCantImpr").val(0);
                }
            })
        }
    }
    else 
    {
        cantimpr=0;
        $("#armado").val(0);
    }
    $("#cantImpr").val(cantimpr);
    //Mando la cantidad de impresion a la funcion demasia
    demasia(cantimpr);
})

//EstA FUNCION es para demasia
function demasia(cantParaDemasia){
    var demasia=0;
    if(cantParaDemasia<=0){
     demasia=0;
    }
    else if(cantParaDemasia >0 && cantParaDemasia<=500){
        demasia=10;
    }
    else if(cantParaDemasia>500 && cantParaDemasia<=700)
    {
     demasia=11;
    }
    else if(cantParaDemasia>700 && cantParaDemasia<=1000)
    {
     demasia=12;
    }
    else if(cantParaDemasia>1000 && cantParaDemasia<=1500)
    {
     demasia=13;
    }
    else if(cantParaDemasia>1500 && cantParaDemasia<=2000)
    {
     demasia=14;
    }
    else if(cantParaDemasia>2000 && cantParaDemasia<=2500)
    {
     demasia=15;
    }
    else if(cantParaDemasia>2500 && cantParaDemasia<=3000)
    {
     demasia=16;
    }
    else if(cantParaDemasia>3000 && cantParaDemasia<=4000)
    {
     demasia=18;
    }
    else if(cantParaDemasia>4000 && cantParaDemasia<=5000)
    {
     demasia=20;
    }
    else if(cantParaDemasia>5000 && cantParaDemasia<=6000)
    {
     demasia=22;
    }
    else if(cantParaDemasia>6000 && cantParaDemasia<=7000)
    {
     demasia=24;
    }
    else if(cantParaDemasia>7000 && cantParaDemasia<=8000)
    {
     demasia=26;
    }
    else if(cantParaDemasia>8000 && cantParaDemasia<=9000)
    {
     demasia=28;
    }
    else if(cantParaDemasia>9000 && cantParaDemasia<=10000)
    {
     demasia=30;
    }
    else if(cantParaDemasia>10000 && cantParaDemasia<=15000)
    {
     demasia=34;
    }
    else if(cantParaDemasia>15000 && cantParaDemasia<=20000)
    {
     demasia=38;
    }
    else if(cantParaDemasia>20000 && cantParaDemasia<=25000)
    {
     demasia=42;
    }
    else if(cantParaDemasia>25000 && cantParaDemasia<=30000)
    {
     demasia=46;
    }
    else if(cantParaDemasia>30000 && cantParaDemasia<=40000)
    {
     demasia=50;
    }
    else if(cantParaDemasia>40000 && cantParaDemasia<=50000)
    {
     demasia=54;
    }
    else if(cantParaDemasia>50000 && cantParaDemasia<=60000)
    {
     demasia=58;
    }
    else if(cantParaDemasia>60000 && cantParaDemasia<=70000)
    {
     demasia=60;
    }
    else if(cantParaDemasia>70000 && cantParaDemasia<=80000)
    {
     demasia=66;
    }
    else if(cantParaDemasia>80000 && cantParaDemasia<=90000)
    {
     demasia=70;
    }
    else if(cantParaDemasia>90000 && cantParaDemasia<=100000)
    {
     demasia=74;
    }
    else if(cantParaDemasia>100000 && cantParaDemasia<=110000)
    {
     demasia=78;
    }
    else if(cantParaDemasia>110000 && cantParaDemasia<=120000)
    {
     demasia=82;
    }
    else if(cantParaDemasia>120000 && cantParaDemasia<=130000)
    {
     demasia=86;
    }
    else if(cantParaDemasia>130000 && cantParaDemasia<=140000)
    {
     demasia=90;
    }
    else if(cantParaDemasia>140000 && cantParaDemasia<=150000)
    {
     demasia=94;
    }
    else if(cantParaDemasia>150000 && cantParaDemasia<=160000)
    {
     demasia=98;
    }
    else if(cantParaDemasia>160000 && cantParaDemasia<=170000)
    {
     demasia=102;
    }
    else if(cantParaDemasia>170000 && cantParaDemasia<=180000)
    {
     demasia=106;
    }
    else if(cantParaDemasia>180000 && cantParaDemasia<=190000)
    {
     demasia=110;
    }
    else if(cantParaDemasia>190000 && cantParaDemasia<=200000)
    {
     demasia=114;
    }
    else if(cantParaDemasia>200000 && cantParaDemasia<=250000)
    {
     demasia=134;
    }
    else if(cantParaDemasia>250000 && cantParaDemasia<=300000)
    {
     demasia=154;
    }
    else if(cantParaDemasia>300000 && cantParaDemasia<=350000)
    {
     demasia=174;
    }
    else if(cantParaDemasia>350000 && cantParaDemasia<=400000)
    {
     demasia=194;
    }
    else if(cantParaDemasia>400000 && cantParaDemasia<=450000)
    {
     demasia=214;
    }
    else if(cantParaDemasia>450000 && cantParaDemasia<=500000)
    {
     demasia=234;
    }
    else if(cantParaDemasia>500000 && cantParaDemasia<=550000)
    {
     demasia=254;
    }
    else if(cantParaDemasia>600000 && cantParaDemasia<=650000)
    {
     demasia=274;
    }
    else if(cantParaDemasia>650000 && cantParaDemasia<=700000)
    {
     demasia=294;
    }
    else if(cantParaDemasia>700000 && cantParaDemasia<=750000)
    {
     demasia=314;
    }
    else if(cantParaDemasia>750000 && cantParaDemasia<=800000)
    {
     demasia=354;
    }
    else if(cantParaDemasia>800000 && cantParaDemasia<=850000)
    {
     demasia=374;
    }
    else if(cantParaDemasia>850000 && cantParaDemasia<=900000)
    {
     demasia=394;
    }
    else if(cantParaDemasia>900000 && cantParaDemasia<=950000)
    {
     demasia=414;
    }
    else if(cantParaDemasia>950000 && cantParaDemasia<=1000000)
    {
     demasia=424;
    }
    //alert(demasia);
    $("#demasiaCantImpr").val(demasia);
  }
  


//Para colores
$( "#colorAnv" ).on("keyup change", function(e) {
    var colorAnversoProcess=parseInt(this.value);
    //alert(colorAnversoProcess);
    if(colorAnversoProcess>4 || colorAnversoProcess<1 ||  $("#demasiaCantImpr").val()<=0)
    {
        $("#colorAnv").val(0);
        $("#colorRev").val(0);
        $("#colorEspAnv").val(0);
        $("#colorEspRev").val(0);


        coloresCantTotal();
    }
    else
    {
        coloresCantTotal();
    }
});
$( "#colorRev" ).on("keyup change", function(e) {
    var colorReversoProcess=parseInt(this.value);
    //alert(colorAnversoProcess);
    if(colorReversoProcess>4 || colorReversoProcess<1 || $("#colorAnv").val()==0 )
    {
        $("#colorRev").val(0);
        $("#colorEspRev").val(0);
        coloresCantTotal();
    }
    else
    {
        coloresCantTotal();
    }
});
$( "#colorEspAnv" ).on("keyup change", function(e) {
    var colorEspecialAnv=parseInt(this.value);
    //alert(colorAnversoProcess);
    if(colorEspecialAnv>4 || colorEspecialAnv<1 || $("#colorAnv").val()==0 )
    {
        $("#colorEspAnv").val(0);
        coloresCantTotal();
    }
    else
    {
        coloresCantTotal();
    }
});
$( "#colorEspRev" ).on("keyup change", function(e) {
    var colorEspecialRev=parseInt(this.value);
    //alert(colorAnversoProcess);
    if(colorEspecialRev>4 || colorEspecialRev<1 || $("#colorRev").val()==0 )
    {
        $("#colorEspRev").val(0);
        coloresCantTotal();
    }
    else
    {
        coloresCantTotal();
    }
});


// ESTA FUNCION ES PARA LA CANTIDAD DE COLORES Y LA DEMASIA EN BASE A LOS MISMOS
function coloresCantTotal()
{
    var colorReversoProcess=parseInt($("#colorRev").val());
    var colorAnversoProcess=parseInt($("#colorAnv").val());
    var colorAnversoEspec=parseInt($("#colorEspAnv").val());
    var colorReversoEspec=parseInt($("#colorEspRev").val());
    var coloresTotal=colorAnversoProcess+colorReversoProcess+colorAnversoEspec+colorReversoEspec;
    $("#coloresTotal").val(coloresTotal);

    // ESTO ES PARA LA DEMASIA EN FUNCION AL COLOR   
    var demasia=$("#demasiaCantImpr").val();
    //ACA SOLO TOMO EN CUENTA LOS ANVERSOS
    var demasiaColor=demasia*(colorAnversoProcess+colorAnversoEspec);
    $("#demasiaCol").val(demasiaColor);
    var demasiaPorcent=demasiaColor*0.25;
    $("#demaporcent").val(demasiaPorcent);
    var totalPliegoImpr=demasiaColor*1.25;
    $("#totalPliImp").val(totalPliegoImpr);

    var cantidadImprimir=parseInt($("#cantImpr").val());
    //alert($("#cantImpr").val());
    var totalImpreDema=totalPliegoImpr+cantidadImprimir;
    $("#totalImpDem").val(totalImpreDema);

    var totalHojasImpr=cantidadImprimir+demasiaPorcent;
    $("#totalHojImp").val(totalHojasImpr);



}


// ESTO ES PARA VALIDAR LA CANTIDAD DE HOJAS QUE SALEN 
$( "#hojaSale" ).on("keyup change", function(e) {
    var hojaSal=parseInt(this.value);
    //alert(colorAnversoProcess);
    if( hojaSal<1 || $("#cantImpr").val()==0 || $("#totalImpDem").val()==0)
    {
        $("#hojaSale").val(0); 
    }
    else
    {
        // var totalHojasCortar=hojaSal/parceInt($("#totalImpDem").val());
        // $("#totalHojCor").val(totalHojasCortar);
        // alert(totalHojasCortar);
        var totalimpredem=$("#totalImpDem").val();
        var totalHojasCortar=totalimpredem/hojaSal;
        $("#totalHojCor").val(totalHojasCortar);
        //alert(totalimpredem);
        //alert(precio);
        var totMat=parseFloat(precio)*totalHojasCortar;
        //alert(totMat);
        $("#precio").val(totMat);


    }
});



  






//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    pais = fila.find('td:eq(2)').text();
    edad = parseInt(fila.find('td:eq(3)').text());
    
    $("#nombre").val(nombre);
    $("#pais").val(pais);
    $("#edad").val(edad);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPersonas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    pais = $.trim($("#pais").val());
    edad = $.trim($("#edad").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, pais:pais, edad:edad, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            pais = data[0].pais;
            edad = data[0].edad;
            if(opcion == 1){tablaPersonas.row.add([id,nombre,pais,edad]).draw();}
            else{tablaPersonas.row(fila).data([id,nombre,pais,edad]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});