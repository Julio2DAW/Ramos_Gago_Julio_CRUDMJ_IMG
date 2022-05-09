/**
 * @file script_db_minijuegos.sql
 * Archivo para crear la base de datos Minijuegos.
 * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
 * @license GPLv3 2022.
 */

/*Creo la base de datos Minijuegos*/
CREATE DATABASE Minijuegos;

/*Uso la base de datos Minijuegos*/
USE Minijuegos;

/*Creo la tabla minijuego*/
CREATE TABLE minijuego(
	id tinyint unsigned AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(50) NOT NULL UNIQUE,
    icono varchar(40) NULL,
    ruta varchar(255) NOT NULL
)