<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Codigo de Barras</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
    	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   
   
  

</head>
<body>
    <div class="codigo text-center mt-4">
            <input type="text" id="data" placeholder="Ingresa codigo" maxlength="13">          
            <button type="button" id="generar_barcode" class="btn btn-success">Generar código de barras</button>
                <div id="imagen" class="img mt-4 " ></div>

      </div>  
   
         
      
      <script>
    $("#generar_barcode").click(function() {
      alert ('hola');
    var data = $("#data").val();
    $("#imagen").html('<img src="barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');
    $("#data").val('');
    });
  </script>
    
</body>
</html>