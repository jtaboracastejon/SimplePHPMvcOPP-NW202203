<?php 
namespace Dao\Mnt;
use Dao\Table;

class Musictracks extends Table{
    public static function insertMusictrack(
        $mst_name,
        $mst_album,
        $mst_type,
        $mst_author,
        $mst_status
    ){
        $sqlStr="INSERT INTO musictracks (mst_name, mst_album, mst_type, mst_author, mst_status) VALUES (:mst_name, :mst_album, :mst_type, :mst_author, :mst_status)";
        $params = array(
            "mst_name" => $mst_name,
            "mst_album" => $mst_album,
            "mst_type" => $mst_type,
            "mst_author" => $mst_author,
            "mst_status" => $mst_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getMusictracks(){
        $sqlStr="SELECT * FROM musictracks";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getMusictrackById($mst_id){
        $strSql = "SELECT * FROM musictracks WHERE mst_id=:mst_id;";
        return self::obtenerUnRegistro($strSql, array(
            "mst_id" => $mst_id
        ));
    }
}
?>