<?php

    /**
     * @file modelo.php
     * Archivo para crear el modelo de la app.
     * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
     * @license GPLv3 2022.
     */

    /**
     * @class Modelo{}
     * Clase Modelo, se encarga de realizar las consultas, búsquedas, filtros y actualizaciones.
     */
    class Modelo{

        //Atributo en público para la conexión con la base de datos.
        public $conexion;

        /**
         * @function __construct().
         * Constructor de la clase.
         */
        function __construct(){

            //Requiere del archibo config_db.php.
            require_once 'config_db.php';
            //Uso la clase mysqli para inicializar la conexión.
            $this->conexion = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        }
        
        /**
         * @function altaMinijuegos().
         * Función que realiza una consulta sql (insert), para introducir los datos del formulario a la base de datos.
         * Le paso por párametro el nombre del minijuego ($nombre).
         * Le paso por párametro el icono del minijuego ($icono).
         * Le paso por párametro el ruta del minijuego ($ruta).
         */
        function altaMinijuegos($nombre, $icono, $ruta) {

            //Consulta sql para dar de alta al minijuego.
            $sql = "INSERT INTO minijuego (nombre, icono, ruta) VALUES ($nombre, $icono, $ruta)";
            //Ejecuto la consulta.
            $this->conexion->query($sql);
        }
    }