$(document).on("ready", function () {

	$('#guardar').attr("disabled", true);

	//alert("ready")

	$('#obtenercodigo').on('click', function () {

		//alert('prefijo');
		var rubro = $('#Rubro').val();

		var res = rubro.split("", 3);

		var prefijo = res[0] + res[1] + res[2];

		//$('#idArticulo').val(prefijo);

		//--------- ENVIO LOS DATOS Y EL ARRAY valores POR $_POST[''] ----A J A X -------
		$.ajax({
			type: 'POST',
			url: 'buscarcodigo.php',
			data: { prefijo: prefijo }, //asi paso el array a php
			success: function (data) {
				$('#respuesta').empty();
				$('#respuesta').append(data);

			}

		});
		alert("buscando. . .\n click para continuar");
		$('#guardar').attr("disabled", false);

		//	location.reload();		
	})



	//Si cargo valor sin iva
	$("#PrecioVenta").keyup(function () {
		// obtengo el valores
		var Piva = document.getElementById("Piva").value;
		var PrecioVenta = parseFloat(document.getElementById("PrecioVenta").value);

		//Calculo los valores
		var Viva = PrecioVenta * (Piva / 100);
		var PrecioVentaCiva = PrecioVenta + Viva;

		/*alert("Precio de venta sin IVA: "+ PrecioVenta);
		alert ("Porcentaje del IVA: " + Piva);
		alert("Precio venta con Iva: " + PrecioVentaCIva );
		alert("Monto del IVA: "+  Viva);*/

		//---seteo el id importe con el resultado
		$('#PrecioVenta').val(PrecioVenta.toFixed(2));
		$('#PrecioVentaCiva').val(PrecioVentaCiva.toFixed(2));
		$('#Viva').val(Viva.toFixed(2));

	})

	//Si cargo valor con iva
	$("#PrecioVentaCiva").keyup(function () {

		// obtengo el valores
		var Piva = document.getElementById("Piva").value;
		var PrecioVentaCiva = parseFloat(document.getElementById("PrecioVentaCiva").value);

		//Calculo los valores
		var PrecioVenta = ((PrecioVentaCiva * 100) / (parseFloat(Piva) + 100));
		var Viva = PrecioVentaCiva - PrecioVenta;

		/*alert("Precio de venta sin IVA: "+ PrecioVenta);
		alert ("Porcentaje del IVA: " + Piva);
		alert("Precio venta con Iva: " + PrecioVentaCiva);
		alert("Monto del IVA: "+ Viva);*/

		//---seteo el id importe con el resultado
		$('#PrecioVenta').val(PrecioVenta.toFixed(2));
		$('#PrecioVentaCiva').val(PrecioVentaCiva.toFixed(2));
		$('#Viva').val(Viva.toFixed(2));

	})

});