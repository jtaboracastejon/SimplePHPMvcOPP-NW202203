<?php 
namespace Dao\Mnt;
use Dao\Table;

class Candidatos extends Table{
    public static function agregarCandidato(
        $identidad,
        $nombre,
        $edad
    ){
        $sqlStr="INSERT INTO candidatos (identidad, nombre, edad,created,updated) VALUES (:identidad,:nombre,:edad, now(),now())";
        $params = array(
            "identidad" => $identidad,
            "nombre"    => $nombre,
            "edad"      => $edad
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function obtenerCandidatos(){
        $sqlStr="SELECT * FROM candidatos";
        return self::obtenerRegistros($sqlStr, array());
    }
}
?>