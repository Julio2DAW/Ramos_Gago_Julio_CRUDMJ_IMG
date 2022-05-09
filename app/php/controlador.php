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
            $directorio='../img_icono/'; //Directorio donde se van a subir los ficheros o archivos
            $tmp_name=$_FILES['icono']['tmp_name']; //Nombre y ruta temporal del fichero
            $name = basename($_FILES['icono']['name']);
            $tipo=$_FILES['icono']['type']; //Tipo del archivo subido
            $tamaño=$_FILES['icono']['size']; //Tamaño del archivo subido

            if($tipo=="image/png"||$tipo=="image/jpg"||$tipo=="application/pdf") {

                if($tamaño > 20971520) {

                    echo "El tamaño del archivo es muy grande, elija otro archivo más pequeño";
                }else {

                    $dir_subida=$directorio.$name; //Directorio + nombre del fichero
                    move_uploaded_file($tmp_name, $dir_subida); //Muevo el fichero o archivo de la ruta temporal a el directorio de subida
                    echo 'Archivo subido correctamente';
                }
            }else {
                
                echo 'El archivo no se ha subido correctamente, utilice una extensión .png .jpg o .pdf';
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
            $this->modelo->altaMinijuegos($nombre, $_POST['icono'], $ruta);

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