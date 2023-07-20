<?php

class Database{
    public static function conectar(){
        $bd=new mysqli('localhost','root','','tienda');
        $bd->query("SET NAMES 'utf8'");
        return $bd;
    }
}

?>