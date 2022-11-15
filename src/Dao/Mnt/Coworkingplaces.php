<?php 
namespace Dao\Mnt;
use Dao\Table;

class Coworkingplaces extends Table{
    public static function insertCoworkingplace(
        $cwp_name,
        $cwp_email,
        $cwp_phone,
        $cwp_type,
        $cwp_status
    ){
        $sqlStr="INSERT INTO coworkingplaces (cwp_name, cwp_email, cwp_phone, cwp_type, cwp_status) VALUES (:cwp_name, :cwp_email, :cwp_phone, :cwp_type, :cwp_status)";
        $params = array(
            "cwp_name" => $cwp_name,
            "cwp_email" => $cwp_email,
            "cwp_phone" => $cwp_phone,
            "cwp_type" => $cwp_type,
            "cwp_status" => $cwp_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getcoworkingplaces(){
        $sqlStr="SELECT * FROM coworkingplaces";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getCoworkingplaceById($cwp_id){
        $strSql = "SELECT * FROM coworkingplaces WHERE cwp_id=:cwp_id;";
        return self::obtenerUnRegistro($strSql, array(
            "cwp_id" => $cwp_id
        ));
    }
}
?>