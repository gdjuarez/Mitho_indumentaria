<?php
session_start();
if($_SESSION['logged'] == 'yes' )
{
	//echo 'Usuario: '.$_SESSION['user'];	
	 //echo "Usuario: ". $_SESSION['user']."</div>";
}else{
	
    echo '<script language=javascript>
    alert("No te has logeado, inicia sesion")
    self.location = "../index.php."</script>';
}
?>

<?php
include("../conex/conexion.php");

//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

//Recibir

$usuario = strip_tags($_POST['user']);
$pass = strip_tags(sha1($_POST['pass']));


if(isset($_POST["submit"])){
	$boton=$_POST["submit"];
	if($boton=="Registrar"){
		
	//verifico que no este VACIO el campo usuario
		if(isset($_POST['user']) && empty($_POST['user'])){
	
			echo '<script language=javascript>
		  		alert("Usuario y/o clave, son obligatorios")
		  		self.location = "registroUsuarios.php"</script>';
	
 		}else{

			$query = mysqli_query($miConexion,'SELECT * FROM usuarios WHERE user="'.mysqli_real_escape_string($miConexion,$usuario).'"');
			if($existe = mysqli_fetch_object($query))
		{
			//echo 'El usuario '.$user.' ya existe.';
			echo '<script language=javascript>
		  		alert("Usuario ya existe") </script>';			
			
		}else{
			$grabar = mysqli_query($miConexion,'INSERT INTO usuarios (user, pass) values ("'.($usuario).'", "'.($pass).'")');
		
		if($grabar)
		{
			echo '<script language=javascript>
			  	alert("Usuario registrado con exito")
			  	self.location = "registroUsuarios.php"</script>';
			  	
		}else{
		
			echo '<script language=javascript>
		  		alert("Hubo un error en el registro")
		  		self.location = "registroUsuarios.php"</script>';	
		}
 	  }
	}
  }
  if($boton=="Eliminar"){
	  
	//verifico que no este VACIO el campo usuario
if(isset($_POST['id']) && empty($_POST['id'])){
	
	echo '<script language=javascript>
		  alert("Ingrese Usuario a eliminar")
		  self.location = "registroUsuarios.php"</script>';
		  	
 }else{
        $identificador=$_POST['id'];

		$query = mysqli_query($miConexion,'SELECT id,user FROM usuarios WHERE id="'.mysqli_real_escape_string($miConexion,$identificador).'"');
		if($existe =!mysqli_fetch_object($query))
		{
			//echo 'Usuario: '.$user.' encontrado para eliminar.';
			echo '<script language=javascript>
				  alert("No existe Usuario ")
				  self.location = "registroUsuarios.php"</script>';	
				
		}else{
			$borrar = mysqli_query($miConexion,'DELETE FROM usuarios WHERE id="'.mysqli_real_escape_string($miConexion,$identificador).'"');
			
			if($borrar)
			{
				echo '<script language=javascript>
				  alert("Usuario eliminado con exito")
				  self.location = "registroUsuarios.php"</script>';				 
							
			}else{
				
				echo '<script language=javascript>
				  alert("no se elimino!!")
				  self.location = "registroUsuarios.php"</script>';	
			}
   }
  }
 }
}


?>
<?php 
//Recibo desde la grid
if (isset($_POST['id'])) {
       $id_eliminar= $_POST['id'];
      
       $fakepass='****';	
	  // echo ($usuario_eliminar);

      $consulto = mysqli_query($miConexion,'SELECT user FROM usuarios WHERE id="'.mysqli_real_escape_string($miConexion,$id_eliminar).'"');

      foreach ($consulto as $row): 
        $usuario_eliminar= $row['user'];       
       endforeach;
    

	} else {
   //echo "nada";
}

?>
<!doctype html>
<html lang="en">
  <head>
  <title>Registro Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
	   <!-- fontawesome css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--  CSS personalizado -->
  	<link rel="stylesheet" href="../stylefondoMadera.css">




<script>
$(function() {
    $('#search').focus();
    $('#search_form').submit(function(e) {
        e.preventDefault();
    })

    $('#search').keyup(function() {

        var envio = $('#search').val();

        $('#resultados').html('<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');

        $.ajax({
            type: 'POST',
            url: 'buscadorUsuarios.php',
            data: ('search=' + envio),
            success: function(resp) {
                if (resp != "") {
                    $('#resultados').html(resp);
                }
            }
        })
    })
})
</script>

</head>

<body>
    <header>
    <div class="container bg-primary rounded"><!--Navegador!-->
	    <nav class="navbar navbar-light">
	      	<form action="../menu/menu.php" method="POST">
				<input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
			</form>
		    <a class="navbar-brand" href="#">Gestion de Usuarios</a>
		    <form action= "../destruir.php" method="POST"  class="form-inline">
		    	<button class="btn btn-dark" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
		  	</form>
    	</nav>
	</div>
    </header>

    <div class='container bg-light rounded'>
        <div class="row p-4">
            <div class="col-md-4"> </div>

            <div class="col-md-4 border">
                <h3>Usuario</h3>
                <form action="registroUsuarios.php" method="POST">  
                    <p><input type="text" name="id" class="form-control" value="<?php echo $id_eliminar?>" placeholder="id" hidden ></p>
                    <p><input type="text" name="user" class="form-control" value="<?php echo $usuario_eliminar ?>" placeholder="Usuario" required></p>
                    <p><input type="password" name="pass" class="form-control" value="<?php echo $fakepass ?>" placeholder="clave" required>
                    </p>
                    <input type="submit" name="submit" value="Registrar" class="btn btn-primary mb-2" />
                    <input type="submit" name="submit" value="Eliminar" class="btn btn-danger mb-2" />
                </form>

                <div id="lista" align="center" style="padding:10px">
                    <form action="gridusuarios.php" method="POST">
                        <input name="Enviar" type="submit" value="Listar usuarios"
                            class="btn btn-outline-primary btn-block" />
                    </form>
                </div>
 
            </div>
           

            <div class="col-md-4"> </div>

            
            <footer>            
                <small>&copy; Copyright 2021</small>
            </footer>
            
        </div>

</body>

</html>