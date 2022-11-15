<?php 
namespace Dao\Mnt;
use Dao\Table;

class Eyeglasses extends Table{
    public static function insertEyeglass(
        $egl_name,
        $egl_type,
        $egl_designer,
        $egl_color,
        $egl_status
    ){
        $sqlStr="INSERT INTO eyeglasses (egl_name, egl_type, egl_designer, egl_color, egl_status) VALUES (:egl_name, :egl_type, :egl_designer, :egl_color, :egl_status)";
        $params = array(
            "egl_name" => $egl_name,
            "egl_type" => $egl_type,
            "egl_designer" => $egl_designer,
            "egl_color" => $egl_color,
            "egl_status" => $egl_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getEyeglasses(){
        $sqlStr="SELECT * FROM eyeglasses";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getEyeglassById($egl_id){
        $strSql = "SELECT * FROM eyeglasses WHERE egl_id=:egl_id;";
        return self::obtenerUnRegistro($strSql, array(
            "egl_id" => $egl_id
        ));
    }
}
?>