<?php

class BaseDeDatos{
    const server="localhost";
    const user="root";
    const pass="";
    const nombrebd="MVC";

    public static function Conectar(){
        try{
            $conexion= new PDO
            ("mysql:host=".self::server.";dbname=".self::nombrebd.";charset=utf8",self::user,
            self::pass);

            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }
        catch(PDOException $e){
            return "Fallo" .$e->getMessage();
        }

    }
}


?>