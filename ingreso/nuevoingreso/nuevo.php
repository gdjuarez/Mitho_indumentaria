<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];	
}else{
	echo 'No te has logeado, inicia sesion.';	
	header("Location: ../index.php"); /* Redirección del navegador */

}
?>
<?php

//-----
include("../../conex/conexion.php");

//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Argentina/Buenos_Aires');
		

?>
<!doctype html>
<html lang="en">
  <head>
  <title>nuevo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
    <!--  CSS personalizado -->
  	<link rel="stylesheet" href="../../stylefondoMadera.css">
	 <!-- jquery -->
    <script src="lib/jquery.js"></script>  
   	<!-- js personalizado -->
	<script src="scriptIngreso.js"></script> 
	 
	<script>
      $(function(){
      
      $('#form_buscar').submit(function(e){
        e.preventDefault();
      })

      $('#buscar').keyup(function(){
      
        var buscar = $('#buscar').val();
       
        $.ajax({
          type: 'POST',
          url: 'buscadorprovee.php',
          data: {buscar},
          success: function(resp){
            if(resp!=""){
              $('#resultados').html(resp);
                    
            }
          }
        })
        
      })
      //****************************************
			$('#form_buscarArt').submit(function(e){
				e.preventDefault();
			})

			$('#buscarArt').keyup(function(){

				var buscarArt = $('#buscarArt').val();
				$("#resultadosArt").show();				
				$('#resultadosArt').html('<p><img src="../../img/loading.gif" width="20" alt="" /> Cargando</p>');

				$.ajax({
					type: 'POST',
					url: 'buscadorart.php',
					data: {buscarArt},
					success: function(resp){
						if(resp!=""){
							$('#resultadosArt').html(resp);
							      
						}
					}
				})
				
			})


    })
     </script>


</head>

<body >
	<header class="sticky-top">
		<div class='container bg-primary rounded'>	
			<nav class="navbar navbar-light bg-primary">
	<!-- Navbar content -->
				<form action="../../menu/menu.php" method="POST">
					<input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
				</form> 
				<a href="#" class="navbar-brand"><h2>Ingreso</h2></a>
				<form action= "../destruir.php" method="POST"  class="form-inline">
			<button class="btn btn-dark sm" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
				</form>
			</nav>
		</div>		
	</header>
		
	<div class="container bg-light p-2">
		<div class="row">		
			<div class="col-md-1"> 	</div> 			  
		
			<div class="col-md-10 ">
		<div id="divbuscar">	

		        <!-- ************************* M O D A L ***************************     -->
		         <!-- Trigger the modal with a button    -->
		        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal" id="btnbuscar">Buscar Proveedor</button>

		        <!-- Modal -->
		        <div class="modal fade" id="myModal" role="dialog">
		          <div class="modal-dialog modal-lg">
		          
		            <!-- Modal content-->
		            <div class="modal-content">
		              <div class="modal-header">	                 
		                
		                 <form action="" method="post" name="form_buscar" id="form_buscar">
		                         <div id='buscador'>
		                            <div class="input-group" >
		                              <span class="input-group-addon">Buscar:</span>
		                              <input type="text" class="form-control input-lg" id='buscar' >                
		                            </div>
		                         </div>        
		                   </form> 
						   <button type="button" class="close" id="cerrarproveedor" data-dismiss="modal">&times;</button>
		              </div>
		              <div class="modal-body">
		               
		                <div id="resultados">      </div>
		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		              </div>
		            </div>
		            
		          </div>
		        </div>    
				<!-- ********************************************************************************     -->	
					<input type="button" value="Proveedor_Nuevo" class="btn btn-secondary" 
					 onclick="window.open('../../proveedores/proveedores.php', this.target, 'width=800px,height=700px'); return false;">

		</div>

			</form>
 				<br>
			<form id="pedido-data">
	       			<div class="form-row">
						<div class="col">
							<div class="form-group">                              
                                <p><input type="date" id='fechap'  value="<?php echo date('Y-m-d'); ?>"  class="form-control" /> </p>
                            </div>   
						</div>
						<div class="col">
							<div class="input-group">
							  	<span class="form-control input-sm">Suc</span>
							  	<input type="text" class="form-control input-sm" maxlength="4" value="0001" name="p-serie" readonly>
							</div>	
						</div>
						<div class="col">
							<div class="input-group">
							  	<span class="form-control input-sm">Numero</span>
							  	<input type="text" class="form-control input-sm" maxlength="8" value="<?php echo ($numero+1);?>" name="sale-number" readonly>
							</div>
						</div>	
						<div class="col">
							
						</div>								
					</div>

					<div class="form-row">
						<div class="col">
							<div class="input-group">
							  	<span class="form-control input-sm">CUIL/CUIT</span>
							  	<input type="text" class="form-control input-sm" id="entity-id" name="entity-id" readonly >
							</div>  
						</div>
						<div class="col">
							<div class="input-group">
							  	<span class="form-control input-sm">Razon social</span>
							  	<input type="text" class="form-control input-sm" id="entity-social" name="entity-social" readonly>
							</div>
						</div>
						<div class="col">					
							<div class="input-group">
							  	<span class="form-control input-sm">Direccion</span>
							  	<input type="text" class="form-control input-lg" id="entity-domicilio" name="entity-domicilio" readonly>
							</div>
						</div>					
					</div>
				</form>

							<hr>
						
<!--   arriba nuevo ---------------------  -->
				
					</table>
					 	</address>

					 	  <!-- ************************* M O D A L ***************************     -->
		         <!-- Trigger the modal with a button    -->
		        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModalArt" id="btnbuscarArt">Buscar Articulos</button>

		        <!-- Modal -->
		        <div class="modal fade" id="myModalArt" role="dialog">
		          <div class="modal-dialog modal-lg">
		          
		            <!-- Modal content-->
		            <div class="modal-content">
		              <div class="modal-header">
		                  
		                    <form action="" method="post" name="form_buscarArt" id="form_buscarArt">
		                         <div id='buscadorArt'>
		                            <div class="input-group" >
		                              <span class="input-group-addon">Buscar Articulo:</span>
		                              <input type="text" class="form-control input-sm" id='buscarArt' >                
		                            </div>
		                         </div>        
		                   </form> 
						   <button type="button" class="close" id="cerrarArticulo" data-dismiss="modal">&times;</button>
		              </div>
		              <div class="modal-body">
		               
		                <div id="resultadosArt">      </div>
		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		              </div>
		            </div>
		            
		          </div>
		        </div>    
				<!-- ********************************************************************************     -->	
					<table class="Mibuscador table">
						<thead>
							<tr>
								<th width="15%">Cantidad</th>
								<th width="25%">Codigo</th>
								<th width="35%">Descripcion</th>
								<th width="15%">P/Unitario</th>						
								<th width="15%">Importe</th>
							</tr>
						</thead>
						<tbody id='tbodyMibuscador'>
							<tr>
								<td >
									<input type="number" id='cantidad' value="1" class="form-control" />									
								</td>
								<td >   
								<input type="text" id='IdProducto' value="" class="form-control" readonly/> 
					  			</td>
								<td>
									<input type="text" id='Productos' value="" class="form-control"readonly/> 
								</td>
								<td >  
									<input type="text" id='Precio' value="1" class="form-control" readonly/>          
								</td>								
								<td>
								<span id='Importe' class="form-control"readonly>0,00</span>
								</td>
							</tr>														
						</tbody>
						<!-- tabla a clonar -->
							<tbody id='tbodydetalle'>
							<tr class="borrartr" title="click para ELIMINAR">
								<td id='cantidad1'> </td>
								<td id='codigo1'></td>
								<td id='producto1'></td>
								<td id='preciounitario1'></td>				
								<td id='importe1'></td>			 							 							
							</tr>
						<!--   .........   -->	
						</tbody>
					</table>
					<button id='agregar' class="btn btn-success btn-sm">Agregar</button>
					   <br>
		         	</table>
					<table class="detalle table table-striped">
						<thead id='titulodetalle'>
							<!-- aca es el destino del clone -->
						</thead>
					</table>					
					<table class="balance table table-striped">
						<tr>												
								<th>Total:</th>
								<th id='totalp'></th>
						</tr>
					</table>
					
				</article>

			<p>no válido como factura </p>
		

			<table class='botones' width="100%">
				<tr>				
					<td><button class="btn btn-primary btn-block" id='Aceptar'>Aceptar</button></td>
				</tr>
			</table>
			
			<div id='respuesta-cabecera'> </div>
			<div id='respuesta-detalle'></div>

			</div> 
			<div class="col-md-1"> 
						<div id='respuesta-cabecera' class="text text-success"></div>
						<div id='respuesta-detalle'></div>

			</div> 	
				
		</div> 
	</div>

	 <!-- Option 1: Bootstrap Bundle (includes Popper) -->  
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>