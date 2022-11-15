<?php 
namespace Dao\Mnt;
use Dao\Table;

class Dresses extends Table{
    public static function insertDress(
        $dress_name,
        $dress_style,
        $dress_pieces,
        $dress_color,
        $dress_status
    ){
        $sqlStr="INSERT INTO dresses (dress_name, dress_style, dress_pieces, dress_color, dress_status) VALUES (:dress_name, :dress_style, :dress_pieces, :dress_color, :dress_status)";
        $params = array(
            "dress_name" => $dress_name,
            "dress_style" => $dress_style,
            "dress_pieces" => $dress_pieces,
            "dress_color" => $dress_color,
            "dress_status" => $dress_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getDresses(){
        $sqlStr="SELECT * FROM dresses";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getDressById($dress_id){
        $strSql = "SELECT * FROM dresses WHERE dress_id=:dress_id;";
        return self::obtenerUnRegistro($strSql, array(
            "dress_id" => $dress_id
        ));
    }
}
?>