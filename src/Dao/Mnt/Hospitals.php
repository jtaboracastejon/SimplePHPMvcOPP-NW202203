<?php 
namespace Dao\Mnt;
use Dao\Table;

class Hospitals extends Table{
    public static function insertHospital(
        $hsp_name,
        $hsp_type,
        $hsp_brand,
        $hsp_url,
        $hsp_status
    ){
        $sqlStr="INSERT INTO hospitals (hsp_name, hsp_type, hsp_brand, hsp_url, hsp_status) VALUES (:hsp_name, :hsp_type, :hsp_brand, :hsp_url, :hsp_status)";
        $params = array(
            "hsp_name" => $hsp_name,
            "hsp_type" => $hsp_type,
            "hsp_brand" => $hsp_brand,
            "hsp_url" => $hsp_url,
            "hsp_status" => $hsp_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getHospitals(){
        $sqlStr="SELECT * FROM hospitals";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getHospitalById($hsp_id){
        $strSql = "SELECT * FROM hospitals WHERE hsp_id=:hsp_id;";
        return self::obtenerUnRegistro($strSql, array(
            "hsp_id" => $hsp_id
        ));
    }
}
?>