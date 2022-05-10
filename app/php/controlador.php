<?php
    /**
     * @file controlador.php
     * Archivo para crear el controlador de la app.
     * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
     * @license GPLv3 2022.
     */

     /**
      * @class Controlador{}
      * Clase Controlador, se encarga de gestionar las instrucciones que se reciben, atenderlas
      * y procesarlas.
      */
    class Controlador{

        //Atributo público para utilizar los métodos de la clase modelo en el controlador.
        public $modelo;

        /**
         * @function __construct()
         * Constructor de la clase.
         */
        function __construct() {
            
            //Requiere de la clase Modelo del archivo modelo.php.
            require_once 'modelo.php';
            $this->modelo = new Modelo();
        }

        function comprobarAlta() {

            /**
             * Compruebo que el elemento input text de nombre del formulario no esté en blanco.
             * Si lo está retorno un mensaje de advertencia.
             */
            if(empty($_POST['nombre'])) {

                return "Debes de poner un nombre al minijuego";
            }else {

                $nombre="'".$_POST['nombre']."'";
            }

            /**
             * Compruebo que el elemento input file de icono del formulario esté en blanco.
             * Si lo está guardo en la base de datos 'NULL'.
             */
            if(isset($_FILES['icono'])) {
                
                if (isset($_FILES['icono']['name']) && $_FILES['icono']['name'] != "") {

                     //Datos necesarios del archivo
                     $icono="'".basename($_FILES['icono']['name'])."'";
                     $tipo = $_FILES['icono']['type'];
                     $tamano = $_FILES['icono']['size'];
                     $temp = $_FILES['icono']['tmp_name'];

                     //Comprobar tamaño y extensión del archivo
                    if (!((strpos($tipo, "png") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "gif")) && ($tamano < 20000000))) {

                        //Si las características no son correctas mostrará este mensaje
                        echo    '<div>
                                    <p>Algo no es compatible, comprueba si las características concuerdan con las siguientes</p>
                                    <p>Tamaño: 2mb</p>
                                    <p>Extensiones: png - jpeg - jpg - gif</p>
                                </div>';
                    } else {
                        
                        //Si las características son correctas se sube al servidor
                        if (move_uploaded_file($temp, '../icons/' . basename($_FILES['icono']['name']))) {
                            
                            //MUestro un mensaje para mostrar que se ha subido.
                            echo '<div>La imagen se ha subido</div>';
                        }
                    }
                }
            }else {

                $icono='NULL';
            }
            /**
             * Compruebo que el elemento input text de ruta del formulario no esté en blanco.
             * Si lo está retorno un mensaje de advertencia.
             */
            if (empty($_POST['ruta'])) {
                
                return "Debes de indicar la ruta del minijuego";
            }else {

                $ruta="'".$_POST['ruta']."'";
            }

            /*Llamo a la función altaMinijuegos de la clase modelo para ejecutar la consulta y le paso los atributos*/
            $this->modelo->altaMinijuegos($nombre, $icono, $ruta);

            /*Compruebo el número de filas afectadas*/
            if($this->modelo->conexion->affected_rows>0){

                //return $this->modelo->conexion->affected_rows." fila afectada.";
                return "El minijuego se agregó correctamente.";
            }else{

                /**
                 * Compruebo que los nombres no se repitan.
                 * En caso de repetirse mando un mensaje.
                 */
                if($this->modelo->conexion->errno==1062){

                    return "El nombre ya existe";
                }
            }
        }
    }