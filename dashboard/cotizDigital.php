<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div style="background-color: #e9eaed;">
<div class="container" align=center  >
    <h1>Cotización: Impresión Dígital</h1>
</div>
<div class="modal-body">
        
<div align="center" class="alert alert-danger"><b>NOTA: </b>Los precios incluyen material en caso de <b>Couché, Bond, Papel adhesivo brillo y Papel fotográfico (A3, A4, y A5).</b><br>
En otros materiales el cliente debera traer su material, el costo es el mismo, dependiendo el tamaño.
</div>

<div class="form-group"  >
    <label for="cantidad" class="col-form-label">CANTIDAD DE HOJAS:</label>
    <input type="number" class="form-control" id="cantidad" min="1" value="0" >
</div>

<div class="form-group">
<form name="f1"> 
<label for="tamaño" class="col-form-label">FORMATO Y TAMAÑO:</label>
    <select class="form-control" id="tamaño" name="tamaño" onchange="formato_margen()">
        <option hidden selected value=0>SELECCIONE UN TAMAÑO</option>
        <option value=1>A = 109.5 X 33.0</option>
        <option value=2>B = 54.6 X 33.0</option>
        <option value=3>C1 = 43.2 X 33.0</option>
        <option value=4>C2 = 43.2 X 28.0</option>
        <option value=5>D1 = 33.0 X 21.6 (Oficio)</option>
        <option value=6>D2 = 28.7 X 22.0</option>
        <option value=7>E = 21.6 X 16.5</option>
        <option value=8>A3 = 42.0 X 29.7</option>
        <option value=9>A4 = 29.7 X 21.0</option>
        <option value=10>A5 = 21.0 X 14.8</option>
        <option value=11>F1 = 50.0 X 33.0</option>
        <option value=12>F2 = 25.0 X 33.0</option>
    </select>
</form>
</div>  

<div class="form-group">
    <label for="margen" class="col-form-label">MARGEN:</label>
    <input type="text" class="form-control" id="margen" disabled >
</div>

<div class="form-group" id="adhesivo" hidden= "true">
  <label for="margen" class="col-form-label">Adhesivo:</label><br>
  <label for="si">SÍ</label>
  <input type="radio" id="siAd" name="drone" value="siAd" onclick="validacionAdhesivo()" >
  <label for="no">NO</label>
  <input type="radio" id="noAd" name="drone" value="noAd" onclick="validacionAdhesivoNo()" checked >
</div>

<div class="form-group" id="anvRev" hidden= "true">
  <label for="margen" class="col-form-label">Anverso y reverso:</label><br>
  <label for="si">SÍ</label>
  <input type="radio" id="siAR" name="drone2" value="siAR" >
  <label for="no">NO</label>
  <input type="radio" id="noAR" name="drone2" value="noAR" checked>
</div>
<button type="button" id="btnCalcular" class="btn btn-dark" onClick="resultado()">Calcular</button>

<div align="center" >
<H1 id="resTotal"></H1>
</div><br><br>


</div>
<hr class="sidebar-divider">
</div>




<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->

<h1 style="background-color: #e9eaed ;" align="center">Calculadora de Pliegos</h1> <br>  
<div class="container-fluid calcu" style="background-color: #e9eaed ;"  align="center">
    <div id="formulario">
        <div class="row row-centered flex-row row">
          <div class="col-sm-4 ext">
<div class="col-sm-10 col-sm-offset-1 col-centered"  style="background-color: #ffff;">
      <form class="form-horizontal" role="form" id="form_calc" style="background-color: #ffff;" >
              <h4>Tamaño del pliego</h4>
              <div class="form-group" style="background-color: #ffff;">
              <div class="col-sm-12 col-centered">
              <div class="input-group calculadoraizq">
              <input class="form-control" id="papel_ancho" placeholder="Ancho" aria-describedby="basic-addon2" maxlength="5" tabindex="1" required>
              
              </div>
              </div>
              </div><!-- /.form-group -->

              <div class="form-group" style="background-color: #ffff;">
              <div class="col-sm-12 col-centered">
              <div class="input-group calculadoraizq">
              <input class="form-control" id="papel_largo" placeholder="Largo" aria-describedby="basic-addon2" maxlength="5" tabindex="2" required>
              
              </div>
              </div>        
              </div><!-- /.form-group -->

        <h4>Tamaño de corte</h4>
           <div class="form-group" style="background-color: #ffff;">
              <div class="col-sm-12 col-centered">
                <div class="input-group calculadoraizq">
                <input class="form-control" id="corte_ancho" placeholder="Ancho" aria-describedby="basic-addon2" maxlength="5" tabindex="3" required>
                
                </div>
              </div>
          </div><!-- /.form-group -->

          <div class="form-group" style="background-color: #ffff;">
            <div class="col-sm-12 col-centered">
              <div class="input-group calculadoraizq">
              <input class="form-control" id="corte_largo" placeholder="Largo" aria-describedby="basic-addon2" maxlength="5" tabindex="4" required>
              
              </div>
            </div> 
          </div><!-- /.form-group -->

        <h4>Num. Unidades</h4>
          <div class="form-group" style="background-color: #ffff;">
              <div class="col-sm-12 col-centered">
                <div class="input-group calculadoraizq">
              <input class="form-control" id="cortes_deseados" placeholder="Número" tabindex="5">
              
              </div>
            </div>
          </div><!-- /.form-group -->
        </form>
                <table class="table">
                   <tr>
                     <td class="text-center"><button type="submit"  tabindex="6" class="btn btn-warning btn-circle" id="maximo"><i class="fa fa-th"></i></button><br>Máximo</td>
                     <td class="text-center"><button type="button" tabindex="7" class="btn btn-primary btn-circle" id="orientacion_h"><i class="fas fa-grip-horizontal"></i></button><br>Horizontal</td>
                  </tr>
                   <tr>
                     <td class="text-center"><button type="button" tabindex="8" class="btn btn-primary btn-circle" id="orientacion_v"><i class="fas fa-grip-vertical"></i></button><br>Vertical</td>
                     <td class="text-center"><button type="submit" tabindex="9" class="btn btn-dark btn-circle" id="reset"><i class="fas fa-sync-alt"></i></button><br>Reiniciar</td>
                  </tr>
                </table>
            </div><!-- /col-sm-10 col-sm-offset-1 col-centered -->
          </div><!-- /col-sm-4 -->

          <div class="col-sm-4 medio">
              <div class="col-sm-12col-centered">
              <h1>Pliego</h2 >
              <div id="dibujo">
              <canvas id="micanvas">
            
              </canvas>
              </div><!-- /dibujo -->
              </div><!-- /col-sm-10 col-sm-offset-1 col-centered -->
          </div><!-- /col-sm-4 -->

          <div class="col-sm-4 ext" style="background-color: #ffff;">
              <div class="col-sm-10 col-sm-offset-1 col-centered">
              <h2>Resultado </h2>
              <table class="table table-bordered">
              <tr>
              <td><label class="control-label" for="papel_ancho">Ejemplares por pliego</label></td>
              <td><span class="label-result" id="cortes_pliego">0</span></td>
              </tr>
              <tr>
              <td><label class="control-label" for="numero_cortes_horizontal">Horizontales</label></td>
              <td><span class="label-result" id="numero_cortes_horizontal">0</span></td>
              </tr>
              <tr>
              <td><label class="control-label" for="numero_cortes_vertical">Verticales</label></td>
              <td><span class="label-result" id="numero_cortes_vertical">0</span></td>
              </tr>
              <tr>
              <td><label class="control-label" for="pliegos">Total pliegos</label></td>
              <td><span class="label-result" id="pliegos">0</span></td>
              </tr>
              <tr>
              <td><label class="control-label" for="numero_cortes">Estimado unidades</label></td>
              <td><span class="label-result" id="numero_cortes">0</span></td>
              </tr>
              </table>
              <table class="table table-bordered">
              <tr>
              <td class="success"><span class="utilizada">% Utilizado</span></td>
              <td class="warning"><span class="inutilizada">% Sin utilizar</span></td>
              </tr>
              <tr>
              <td class="success"><span id="area_utilizada">0</span></td>
              <td class="warning"> <span id="area_inutilizada">0</span></td>
              </tr>
              </table>
        </div><!-- /col-sm-10 col-sm-offset-1 col-centered -->
        </div><!-- /col-sm-4 -->
      </div><!-- /row row-centered -->
  </div><!-- /.formulario -->
</div><!-- /.container -->

   
          










<script>
var valor;
// function cantidad()
// {
//    // alert("asdsa");
//     document.getElementById("cortes_deseados").value=document.getElementById("cantidad").value;
// }
function formato_margen()
{
    var combo = document.getElementById("tamaño");
    var tamañoa = combo.options[combo.selectedIndex].text;
    var indice = tamañoa.split(" ");
    var altura= parseFloat(indice[2]);
    var base =parseFloat(indice[4]);
    // alert("altura ="+altura);
    // alert("base ="+base);
    document.getElementById("papel_ancho").value=altura;
    document.getElementById("papel_largo").value= base;




    var tamaño = document.getElementById("tamaño").value;
    //alert(tamaño);
    switch (tamaño)
    {
        case "1":
            //alert("Soy el numero 1");
            document.getElementById("margen").value="108.7 X 32.2";
            document.getElementById("anvRev").hidden=false;
            document.getElementById("adhesivo").hidden=true;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;

            //Para vaciar el total 
            document.getElementById("resTotal").innerHTML ="";

            break;
        case "2":
            //alert("Soy el numero 2");
            document.getElementById("margen").value="53.8 X 32.2";
            document.getElementById("anvRev").hidden=false;
            document.getElementById("adhesivo").hidden=true;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "3":
            //alert("Soy el numero 3");
            document.getElementById("margen").value="42.4 X 32.2";
            document.getElementById("anvRev").hidden=false;
            document.getElementById("adhesivo").hidden=false;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "4":
            //alert("Soy el numero 4");
            document.getElementById("margen").value="42.4 X 27.2";
            document.getElementById("anvRev").hidden=false;
            document.getElementById("adhesivo").hidden=false;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "5":
            //alert("Soy el numero 5");
            document.getElementById("margen").value="32.2 X 20.8";
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("anvRev").hidden=false;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "6":
            //alert("Soy el numero 6");
            document.getElementById("margen").value="27.9 X 21.2";
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("anvRev").hidden=false;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "7":
            //alert("Soy el numero 7");
            document.getElementById("margen").value="20.8 X 15.7";
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("anvRev").hidden=false;
            //para selecionar los radioButton
            document.getElementById("noAR").checked=true;
            document.getElementById("noAd").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "8":
            //alert("Soy el numero 8");
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("margen").value="41.2 X 28.9";
            document.getElementById("anvRev").hidden=true;

            document.getElementById("noAd").checked=true;
            document.getElementById("siAR").checked=false;
            document.getElementById("noAR").checked=true;
            //Para vaciar el total 
            document.getElementById("resTotal").innerHTML ="";

            break;
        case "9":
            //alert("Soy el numero 9");
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("margen").value="28.9 X 20.2";
            document.getElementById("anvRev").hidden=true;

            document.getElementById("noAd").checked=true;
            document.getElementById("siAR").checked=false;
            document.getElementById("noAR").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "10":
            //alert("Soy el numero 10");
            document.getElementById("adhesivo").hidden=false;
            document.getElementById("margen").value="20.2 X 14.0";
            document.getElementById("anvRev").hidden=true;

            document.getElementById("noAd").checked=true;
            document.getElementById("siAR").checked=false;
            document.getElementById("noAR").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "11":
            //alert("Soy el numero 11");
            document.getElementById("margen").value="49.2 X 32.2";
            document.getElementById("adhesivo").hidden=true;

            document.getElementById("anvRev").hidden=true;

            document.getElementById("siAd").checked=false;
            document.getElementById("siAR").checked=false;
            document.getElementById("noAd").checked=true;
            document.getElementById("noAR").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
        case "12":
            //alert("Soy el numero 12");
            document.getElementById("margen").value="24.2 X 32.2";
            document.getElementById("adhesivo").hidden=true;

            document.getElementById("anvRev").hidden=true;

            document.getElementById("siAd").checked=false;
            document.getElementById("siAR").checked=false;
            document.getElementById("noAd").checked=true;
            document.getElementById("noAR").checked=true;
             //Para vaciar el total 
             document.getElementById("resTotal").innerHTML ="";
            break;
    }       
}

function resultado()
{
    var cant=document.getElementById("cantidad").value;
    var tamaño = document.getElementById("tamaño").value;
    if(document.getElementById("siAR").checked)
    {
        switch (tamaño)
        {
            case "1":
                if(cant<=20)
                {
                    calculo(90);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(86);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(82);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(78);
                }
                else if(cant>100)
                {
                    calculo(74);
                }
                break;
            case "2":
                if(cant<=20)
                {
                    calculo(38);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(36);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(34);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(32);
                }
                else if(cant>100)
                {
                    calculo(30);
                }
                
                break;
            case "3":
                if(cant<=20)
                {
                    calculo(28);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(27);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(26);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(25);
                }
                else if(cant>100)
                {
                    calculo(24);
                }
                break;
            case "4":
                if(cant<=20)
                {
                    calculo(24);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(23);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(22);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(21);
                }
                else if(cant>100)
                {
                    calculo(20);
                }
                break;
            case "5":
                if(cant<=20)
                {
                    calculo(13);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(12);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(11);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(10);
                }
                else if(cant>100)
                {
                    calculo(9);
                }
                break;
            case "6":
                if(cant<=20)
                {
                    calculo(11);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(10);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(9);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(8);
                }
                else if(cant>100)
                {
                    calculo(7);
                }
                break;
            case "7":
                if(cant<=20)
                {
                    calculo(9);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(8);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(7);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(6);
                }
                else if(cant>100)
                {
                    calculo(5);
                }
                break;
            }
    }
    else
    {
        switch (tamaño)
        {
            case "1":
                if(cant<=20)
                {
                    calculo(50);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(48);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(46);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(44);
                }
                else if(cant>100)
                {
                    calculo(42);
                }
                break;
            case "2":
                if(cant<=20)
                {
                    calculo(20);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(19);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(18);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(17);
                }
                else if(cant>100)
                {
                    calculo(16);
                }
                
                break;
            case "3":
                if(cant<=20)
                {
                    calculo(15);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(14.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(14);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(13.5);
                }
                else if(cant>100)
                {
                    calculo(13);
                }
                break;
            case "4":
                if(cant<=20)
                {
                    calculo(13);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(12.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(12);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(11.5);
                }
                else if(cant>100)
                {
                    calculo(11);
                }
                break;
            case "5":
                if(cant<=20)
                {
                    calculo(7);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(6.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(6);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(5.5);
                }
                else if(cant>100)
                {
                    calculo(5);
                }
                break;
            case "6":
                if(cant<=20)
                {
                    calculo(6);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(5.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(5);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(4.5);
                }
                else if(cant>100)
                {
                    calculo(4);
                }
                break;
            case "7":
                if(cant<=20)
                {
                    calculo(5);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(4.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(4);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(3.5);
                }
                else if(cant>100)
                {
                    calculo(3);
                }
                break;
            case "8":
                if(cant<=20)
                {
                    calculo(25);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(24);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(23);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(22);
                }
                else if(cant>100)
                {
                    calculo(21);
                }
                break;
            case "9":
                if(cant<=20)
                {
                    calculo(13);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(12.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(12);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(11.5);
                }
                else if(cant>100)
                {
                    calculo(11);
                }
                break;
            case "10":
                if(cant<=20)
                {
                    calculo(6);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(5.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(5);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(4.5);
                }
                else if(cant>100)
                {
                    calculo(4);
                }
                break;
            case "11":
                if(cant<=20)
                {
                    calculo(23);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(22);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(21);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(20);
                }
                else if(cant>100)
                {
                    calculo(18);
                }
                break;
            case "12":
                if(cant<=20)
                {
                    calculo(12);
                }
                else if(cant>20 && cant<=40)
                {
                    calculo(11.5);
                }
                else if(cant>40 && cant<=70)
                {
                    calculo(11);
                }
                else if(cant>70 && cant<=100)
                {
                    calculo(10.5);
                }
                else if(cant>100)
                {
                    calculo(10);
                }
                break;
        }       
    }
        
}


function calculo(valor) 
{   
    var result;
    var cant=document.getElementById("cantidad").value;
    if(document.getElementById("siAd").checked)
    {
        result=(valor+2)*cant;
    } 
    else
    {
       result=valor*cant; 
    }
    document.getElementById("resTotal").innerHTML ="Son " + result.toString()+" Bs.";
    
    //alert(result + " bs")


}
function validacionAdhesivo()
{
    document.getElementById("noAR").checked=true;
    document.getElementById("anvRev").hidden=true;
    
}
function validacionAdhesivoNo()
{
    var tamaño = document.getElementById("tamaño").value;
    if(tamaño != "12" && tamaño != "11" && tamaño != "10" && tamaño != "9" && tamaño != "8" )
    {
        document.getElementById("anvRev").hidden=false;
    }

}



</script>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>