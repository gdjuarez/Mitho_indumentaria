$(document).on("ready",function(){
	
	var codCliente='';
	var RazonSocial='';
	var Fecha='';
	var Total='';	
	var presuVacio='';
	var estado='';
	//***************************************************
	$('#Aceptar').on('click',function(){
			// verifico si se cargo algun item total del pedido no vacio
		 presuVacio=$('#totalp').text(); 
		// alert ("pedido:"+pedidoVacio);

		 if(presuVacio =="") {
		 	
		 	  alert ("Presupuesto Vacio !!!:"+"\n Ingrese items al Presupuesto");


		 }else{

			 //deshabilito los botones
			$(this).attr("disabled", true);
			$('#btnbuscar').attr("disabled", true);
			$('#cliente_nuevo').attr("disabled", true);
			$('#btnbuscarArt').attr("disabled", true);
			$('#agregar').attr("disabled", true);

		 	// alert ("Hay Venta:"+pedidoVacio);
		 	
			codCliente= $('#entity-id').val(); 
			RazonSocial= $('#entity-social').val(); 
			Fecha= $('#fechap').val(); 
			Total= $('#totalp').text();
			estado= $('#estado').val();
			
				//alert("Registrando..."+codCliente+"-"+estado);
			//***CONSTRUIR LA CABECERA= [codCliente, RazonSocial, Fecha, Total,estado]; *****

			//*********** */RECORRO DETALLE **********************************
			valores=new Array();		
			$('.detalle tbody tr').each(function(){

				var Cantidad = $(this).find("td").eq(0).html();
				var Producto = $(this).find("td").eq(1).html();
				//var Descripcion = $(this).find("td").eq(2).html();
				var PrecioUnitario = $(this).find("td").eq(3).html();			
				var Importe = $(this).find("td").eq(4).html();

				//------ Cargo el arreglo VALORES
				valor=new Array(Producto,PrecioUnitario,Cantidad,Importe);
	            valores.push(valor);
							
			})	
			
			//alert("Registrando...");
			//alert("Detalle: ( "+valores+" )");

			//--------- ENVIO LOS DATOS Y EL ARRAY valores POR $_POST[''] ----A J A X -------
			$.ajax({
					  type: 'POST',
					  url: 'grabarp.php',
						data: {codCliente: codCliente, RazonSocial: RazonSocial, Fecha: Fecha, Total: Total, estado: estado, valores: valores}, //asi paso el array a php
						  	success: function(data){ 
								$('#respuesta-detalle').empty();
								$('#respuesta-detalle').append(data);                                                             
								}
								
					});

			//**********************************************
			//aca se imprime con window.print();
			//window.print();	
				alert ("Presupuesto Procesado. . .\n click para continuar")
			//	location.reload();
		 }
	})
	
	//---- Coordino los select  cliente y domicilio -----
	$('#cantidad').on('click',function(){		   			
		// obtengo el index	
	    var precio = parseFloat(document.getElementById("Precio").value);	 
	    var cantidad = parseFloat(document.getElementById("cantidad").value);
			//--multiplico precio X cantidad para el importe	
		
		var importe = precio * cantidad;
			//---seteo el id importe con el resultado	
			$('#Importe').text(importe.toFixed(2));
				
	})
	//---- Coordino los select  cliente y domicilio -----
	$('#cantidad').keyup(function(){	   			
		// obtengo el index	
	    var precio = parseFloat(document.getElementById("Precio").value);	 
	    var cantidad =parseFloat(document.getElementById("cantidad").value);
			//--multiplico precio X cantidad para el importe	
		
		var importe = precio * cantidad;
			//---seteo el id importe con el resultado	
			$('#Importe').text(importe.toFixed(2));
				
	})
	
	
	//***************************************************
	//--- BOTON AGREGAR ---------------------------------        					        	
	$('#agregar').on('click',function(){

	//alert('funca boton agregar');
		var Producto =document.getElementById("IdProducto").value;	

		if (Producto != '') {

			//-- cantidad ---
			var cantidad = parseFloat(document.getElementById("cantidad").value);
			$('#cantidad1').text(cantidad);

			//---- cod producto --
			var Producto = document.getElementById("IdProducto").value;
			$('#codigo1').text(Producto);

			//--Descripcion--		
			var Descripcion = document.getElementById("Productos").value;
			$('#producto1').text(Descripcion);


			//--PrecioUnitario- --
			var precio = parseFloat(document.getElementById("Precio").value);
			$('#preciounitario1').text(precio.toFixed(2));


			//-- Importe --
			var importe = precio * cantidad;
			$('#importe1').text(importe.toFixed(2));

			//duplico el elemento
			var clon = $('#tbodydetalle').clone();
			$('#titulodetalle').after(clon);

			// limpio las casillas a duplicar		
			$('#cantidad1').text('');
			$('#codigo1').text('');
			$('#producto1').text('');
			$('#preciounitario1').text('');
			$('#importe1').text('');

			//--------   sumo columna importe     ----------
			var totalimporte = 0;
			$('.detalle tbody tr').each(function () {

				var subTotal = parseFloat($(this).find("td").eq(4).text());
				//alert(' subTotal: ' + subTotal);					
				totalimporte += parseFloat(subTotal);

			})
			// --seteo el resultado de la suma en la casilla-----
			$('#totalp').text(totalimporte.toFixed(2));

				// limpio las casillas 		
				$('#cantidad').val('1');	
				$('#IdProducto').val('');
				$('#Productos').val('');
				$('#Precio').val('0');
				$('#Importe').text('0,00');

		} else {

			alert('Ingrese un Articulo');

		}

	})
	//***************************************************			
	//------ BOTON SACAR DEL PEDIDO  -----------------				    
	 $("#del").click(function() {
	      // --- Obtenemos el total de filas (tr) del id "tabla"
	      var trs = $(".detalle tr").length;
	      			//alert(trs);
	      if (trs > 1) {
	         // Eliminamos la ultima fila
	         $(".detalle tr:last").remove();
	      }

	      //---- sumo columna importe  ya que saque una fila----
		var total=0;
		$('.detalle tbody tr').each(function () {
									
			var subTotal = parseFloat($(this).find("td").eq(4).text());
			  //alert(' subTotal: ' + subTotal);					
			total +=  parseFloat(subTotal);
							
		})
			// --seteo el resultado de la suma en la casilla---
			$('#totalp').text(total.toFixed(2));

	 });


	 //**************borrar filas del detalle****
	$(document).on('click', '.borrartr', function (event) {
			event.preventDefault();
			$(this).closest('tr').remove();

			//----SUMO columna IMPORTE  ya que saque una fila----
			var total=0;
		$('.detalle tbody tr').each(function () {
								
				var subTotal = parseFloat($(this).find("td").eq(4).text());
				  //alert(' subTotal: ' + subTotal);					
				total +=  parseFloat(subTotal);
														
				})
			// --seteo el resultado de la suma en la casilla---
			$('#totalp').text(total.toFixed(2));
										
		
			 	
	});
	 //***************************************************
		$('#Volver').on('click',function(){
		window.location.href = "../../menu/menu.php";
	})
	 

});

	  