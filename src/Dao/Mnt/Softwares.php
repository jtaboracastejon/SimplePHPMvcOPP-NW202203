<?php 
namespace Dao\Mnt;
use Dao\Table;

class Softwares extends Table{
    public static function insertSoftware(
        $sw_name,
        $sw_os,
        $sw_type,
        $sw_brand,
        $sw_version,
        $sw_status,
    ){
        $sqlStr="INSERT INTO softwares (sw_name, sw_os, sw_type, sw_brand, sw_version,sw_status) VALUES (:sw_name, :sw_os, :sw_type, :sw_brand, :sw_version,:sw_status)";
        $params = array(
            "sw_name" => $sw_name,
            "sw_os" => $sw_os,
            "sw_type" => $sw_type,
            "sw_brand" => $sw_brand,
            "sw_version" => $sw_version,
            "sw_status" => $sw_status,
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getSoftwares(){
        $sqlStr="SELECT * FROM softwares";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getSoftwareById($sw_id){
        $strSql = "SELECT * FROM softwares WHERE sw_id=:sw_id;";
        return self::obtenerUnRegistro($strSql, array(
            "sw_id" => $sw_id
        ));
    }
}
?>