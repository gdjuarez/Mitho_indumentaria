$(document).on("ready", function () {

   // alert('si');

    $(document).on('change', '#check', function() {
        if (this.checked) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
      });
     //--------------------------------------------------------------------- 

    $('#Actualizar').on('click', function () {

       // alert('actualizar');

                //  RECORRO DETALLE
        valores = new Array();
        $('#tablastock tr').each(function () {
        
            var checkeado = $(this).find("#check").val();
            var id_articulo = $(this).find("td").eq(0).html();
            var stock = $(this).find("#cantidad").val();           
            var stockminimo = $(this).find("#minimo").val();
          
            //------ Cargo el arreglo VALORES
            valor = new Array(checkeado, id_articulo, stock, stockminimo);
            valores.push(valor);

        })

          // alert("tabla: ( " + valores + " )");

                 // ENVIO LOS DATOS Y EL ARRAY valores POR $_POST[''] A J A X--
			$.ajax({
                type: 'POST',
                url: 'update_stock.php',
                  data: {valores: valores}, //asi paso el array a php
                        success: function(data){ 
                          $('#respuesta_update').empty();
                          $('#respuesta_update').append(data);                                                             
                          }
                          
              });
       

        alert ("Stock Procesado. . .\n click para continuar")
        location.reload();

    })
     //----------------------------------------------------------------------


});