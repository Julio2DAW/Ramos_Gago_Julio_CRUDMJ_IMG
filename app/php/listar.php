<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Julio Antonio Ramos Gago ()jramosgago.guadalupe@alumnado.fundacionloyola.net" />
        <title>Listado Minijuegos</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <h1>Listado de Minijuegos</h1>
        <?php

            require_once 'controlador.php';

            $controlador = new Controlador();
            /**
             * Llamo a la función mostrarMinijuegos() de la clase Controlador.
             * Muestro dinámicamente los minijuegos con sus datos y los botones de borrar y modificar con un while.
             */
            $resultado = $controlador->mostrarMinijuegos();

            while ($registro=$resultado->fetch_array()) {
                
                echo    "<div>"
                            .$registro['nombre']."
                                <div class=imgs>
                                    <img src='".'../icons/'.$registro['icono']."'/>
                                </div>"
                            .$registro['ruta'].
                            "[ <a href='borrar.php?id=".$registro['id']."'>Borrar</a> ||
                             <a href='modificar.php?id=".$registro['id']."'>Modificar</a> ]
                        </div>";
            }
        ?>
        <p><a href="../index.html">Volver</a></p>
    </body>
</html>