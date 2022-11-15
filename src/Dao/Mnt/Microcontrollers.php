<?php 
namespace Dao\Mnt;
use Dao\Table;

class Microcontrollers extends Table{
    public static function insertMicrocontroller(
        $mc_name,
        $mc_hertz,
        $mc_ports,
        $mc_brand,
        $mc_status,
        $mc_type,
    ){
        $sqlStr="INSERT INTO microcontrollers (mc_name, mc_hertz, mc_ports,mc_brand,mc_status,mc_type) VALUES (:mc_name,:mc_hertz,:mc_ports, :mc_brand, :mc_status,:mc_type)";
        $params = array(
            "mc_name" => $mc_name,
            "mc_hertz" => $mc_hertz,
            "mc_ports" => $mc_ports,
            "mc_brand" => $mc_brand,
            "mc_status" => $mc_status,
            "mc_type" => $mc_type,
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getMicrocontrollers(){
        $sqlStr="SELECT * FROM microcontrollers";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getMicrocontrollerById($mc_id){
        $strSql = "SELECT * FROM microcontrollers WHERE mc_id=:mc_id;";
        return self::obtenerUnRegistro($strSql, array(
            "mc_id"=>$mc_id
        ));
    }
}
?>