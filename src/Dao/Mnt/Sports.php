<?php 
namespace Dao\Mnt;
use Dao\Table;

class Sports extends Table{
    public static function insertSport(
        $sport_name,
        $sport_type,
        $sport_ranking,
        $sport_commet,
        $sport_status
    ){
        $sqlStr="INSERT INTO sports (sport_name, sport_type, sport_ranking, sport_commet, sport_status) VALUES (:sport_name, :sport_type, :sport_ranking, :sport_commet, :sport_status)";
        $params = array(
            "sport_name" => $sport_name,
            "sport_type" => $sport_type,
            "sport_ranking" => $sport_ranking,
            "sport_commet" => $sport_commet,
            "sport_status" => $sport_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getSports(){
        $sqlStr="SELECT * FROM sports";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getSportById($sport_id){
        $strSql = "SELECT * FROM sports WHERE sport_id=:sport_id;";
        return self::obtenerUnRegistro($strSql, array(
            "sport_id" => $sport_id
        ));
    }
}
?>