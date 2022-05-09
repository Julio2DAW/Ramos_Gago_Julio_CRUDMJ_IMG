/**
 * @file create_user_permissions.sql
 * Archivo para crear la base de datos Minijuegos.
 * @author Julio Antonio Ramos Gago (jramosgago.guadalupe@alumnado.fundacionloyola.net)
 * @license GPLv3 2022.
 */

/*Creo el usuario julio_minijuegos*/
CREATE USER 'julio_minijuegos'@'localhost' IDENTIFIED BY '1234';

/*
    Le doy permisos al usuario julio_minijuegos en la base de datos Minijuegos.
    Permisos:
        - Seleccionar
        - Insertar
        - Modificar
        - Borrar
*/
GRANT SELECT, INSERT, UPDATE, DELETE ON `minijuegos`.* TO 'julio_minijuegos'@'localhost';