<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Julio Antonio Ramos Gago ()jramosgago.guadalupe@alumnado.fundacionloyola.net" />
        <title>Modificar Minijuego</title>
        <link rel="stylesheet" href="../css/estilos.css" />
    </head>
    <body>
        <h1>Modificar Minijuego</h1>

        <form action="#" enctype="multipart/form-data" method="POST">
            <?php
                require_once 'controlador.php';

                $controlador = new Controlador();
                /**
                 * Llamo a la función verMinijuego() de la clase Controlador.
                 * Creo un formulario de modificación y añado a los campos input los datos del minijuego.
                 */
                $resultado = $controlador->verMinijuego();

                while ($registro=$resultado->fetch_array()) {
                    
                    $nombre = $registro['nombre'];
                    $icono = $registro['icono'];
                    $ruta = $registro['ruta'];
                    $id = $registro['id'];
                }

                echo "
                            <label>Minijuego: </label>
                            <input type='text' value=$nombre name='nombre'><br />
                            <label>Icono: </label>
                            <img src='".'../icons/'.$icono."'/>
                            <input type='file' value=$icono name='icono'><br />
                            <label>Ruta: </label>
                            <input type='text' value=$ruta name='ruta'><br />
                        ";
            ?>

            <p>¿Estás seguro de que deseas modificar este miniuego?</p>

            <input type="submit" value="Modificar" name="modificar" />
            <input type="submit" value="Cancelar" name="cancelar" />
        </form>
    </body>
</html>
<?php

    if(isset($_POST['modificar'])) {
        
        /**
         * Llamo a la función actualizarMinijuegos($id) de la clase Controlador.
         * Muestro el resultado con un 'echo.
         */
        $resultado = $controlador->actualizarMinijuegos($id, $icono);
        echo $resultado;
        //Redireccionar a la vista listar.php a los dos segundos, para que al usuario le de tiempo
        //a poder ver que le ha saltado por pantalla el mensaje de confirmación de que ese minijuego ha sido borrado.
        header("refresh:2; url=listar.php");
        
    }else {

        if (isset($_POST['cancelar'])) {

            //Redireccionar a la vista listar.php a los 0,5 segundos, ya que el usuario no ha querido eliminar el minijuego.
            header ("refresh:0.5; url=listar.php");
        }
    }