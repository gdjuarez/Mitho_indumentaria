<?php // ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylefondo.css">
        <title>Inicio</title>
    </head>

    <body>
        <p>
        <div class="container bg-light border">              
            <div class="row bg-dark rounded"> 
                <div class="col-12  "><h2 class="text-center text-white">Sistema online</h2></div>           
            </div>  
            <div class="row m-5 "> 
            <div class="col-md-2">   
                         
                </div>
                <div class="col-md-4">   
                    <img class=" img-fluid center-block" src="img/mitho_logo.jpeg" >          
                </div>
                <div class="col-md-4 border rounded border-dark text-center">
                    <form class="form-inline" action="conex/login.php" method="post">
                        <div class="form-group">
                            <p>
                            <br>
                            <label>Usuario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user" id="inputuser" placeholder="Usuario" maxlength="20" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>
                            <br>
                            <label>Contraseña:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="pass" id="inputPass" placeholder="Clave" maxlength="20" required>
                            </div>
                        </div>
                        <div class="form-group p-2">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mb-2">Ingresar</button>
                            </div>
                        </div>
                    </form>                                   
                </div>                
                <div class="col-md-2">
                   
                </div>
                
            </div>
            <HR>
            <footer>
                <small>&copy; Copyright GDJuarez 2022</small>
            </footer>
        </div>
    </body>
</html>