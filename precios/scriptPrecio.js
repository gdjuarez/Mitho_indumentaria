$(document).on("ready", function () {

  // alert('si');

 $(document).on('change', '#check', function () {
    if (this.checked) {
      $(this).val('1');
    } else {
      $(this).val('0');
    }
  });
  //--------------------------------------------------------------------- 

  $("#selectall").on("click", function() {
    $(".case").prop("checked", this.checked);
    $(".case").val('1');
  });
  
 //--------------------------------------------------------------------- 
  $('#Actualizar').on('click', function () {

    // alert('actualizar');

    var porcentaje = document.getElementById("porcentaje").value;

    //alert(porcentaje);

    if (porcentaje == "0") {

      //alert("porcentaje cero");      

      //  RECORRO DETALLE
      valores = new Array();
      $('#tablastock tr').each(function () {

        var checkeado = $(this).find("#check").val();
        var id_articulo = $(this).find("td").eq(0).html();
        var PrecioCompra = $(this).find("#PrecioCompra").val();
        var PrecioVenta = $(this).find("#PrecioVenta").val();

        //------ Cargo el arreglo VALORES
        valor = new Array(checkeado, id_articulo, PrecioCompra, PrecioVenta);
        valores.push(valor);

      })

    } else {
      //porcentaje distinto de cero
      //  RECORRO DETALLE
      valores = new Array();
      $('#tablastock tr').each(function () {

        var checkeado = $(this).find("#check").val();
        var id_articulo = $(this).find("td").eq(0).html();
        var PrecioCompra = $(this).find("#PrecioCompra").val();
        var PrecioVenta = parseFloat($(this).find("#PrecioVenta").val());

        PrecioVenta = (PrecioVenta + ((PrecioVenta * porcentaje) / 100));
        // alert(PrecioVenta);

        //------ Cargo el arreglo VALORES
        valor = new Array(checkeado, id_articulo, PrecioCompra, PrecioVenta);
        valores.push(valor);

       // alert(valores);

      })


    }


    // ENVIO LOS DATOS Y EL ARRAY valores POR $_POST[''] A J A X--
    $.ajax({
      type: 'POST',
      url: 'update_precio.php',
      data: {
        valores: valores
      }, //asi paso el array a php
      success: function (data) {
        $('#respuesta_update').empty();
        $('#respuesta_update').append(data);
      }

    });


    alert("Precio Procesado. . .\n click para continuar")
    location.reload();



  })
  //----------------------------------------------------------------------


});