$(document).on("ready", function () {



	//alert("ready")


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