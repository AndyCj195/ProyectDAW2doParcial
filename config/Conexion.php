<?php
    class Conexion{
        public static function getConexion(){
            $dsn = "mysql:host=localhost; dbname=". DB_NAME;
            $conexion = null;
            if(!isset($conexion)){
                try{
                    $conexion = new PDO($dsn, DB_USER, DB_PASS);
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    return $conexion;
                }catch(Exception $e){
                    die("El error de Conexión es: ". $e->getMessage());
                }
            }
        }

        public static function closeConexion(){
            $conexion = null;
        }
    }
?>