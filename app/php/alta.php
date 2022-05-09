<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Julio Antonio Ramos Gago ()jramosgago.guadalupe@alumnado.fundacionloyola.net" />
        <title>Alta Minijuegos</title>
    </head>
    <body>
        <h1>Alta de Minijuegos</h1>
        <!--Formulario-->
        <form action="#" enctype="multipart/form-data" method="POST">
            <div>
                <label>Minijuego</label>
                <input type="text" name="nombre" />
            </div>
            <div>
                <label>Icono</label>
                <input type="file" name="icono" />
            </div>
            <div>
                <label>Ruta</label>
                <input type="text" name="ruta" />
            </div>
            <div>
                <input type="submit" value="Enviar" name="enviar"><br/>
            </div>
        </form>

        <p><a href="../index.html">Volver</a></p>
    </body>
</html>
<?php

    if(isset($_POST['enviar'])) {

        require_once "controlador.php";

        $controlador = new Controlador();
        /**
         * Llamo a la función comprobarAlta() de la clase Controlador.
         * Muestro el resultado con un 'echo'.
         */
        $resultado = $controlador->comprobarAlta();
        echo $resultado;
    }