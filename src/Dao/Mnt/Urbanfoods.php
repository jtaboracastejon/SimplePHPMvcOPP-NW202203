<?php 
namespace Dao\Mnt;
use Dao\Table;

class Urbanfoods extends Table{
    public static function insertUrbanfood(
        $urbfood_name,
        $urbfood_type,
        $urbfood_brand,
        $urbfood_url,
        $urbfood_status
    ){
        $sqlStr="INSERT INTO urbanfoods (urbfood_name, urbfood_type, urbfood_brand, urbfood_url, urbfood_status) VALUES (:urbfood_name, :urbfood_type, :urbfood_brand, :urbfood_url, :urbfood_status)";
        $params = array(
            "urbfood_name" => $urbfood_name,
            "urbfood_type" => $urbfood_type,
            "urbfood_brand" => $urbfood_brand,
            "urbfood_url" => $urbfood_url,
            "urbfood_status" => $urbfood_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getUrbanfoods(){
        $sqlStr="SELECT * FROM urbanfoods";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getUrbanfoodById($urbfood_id){
        $strSql = "SELECT * FROM urbanfoods WHERE urbfood_id=:urbfood_id;";
        return self::obtenerUnRegistro($strSql, array(
            "urbfood_id" => $urbfood_id
        ));
    }
}
?>