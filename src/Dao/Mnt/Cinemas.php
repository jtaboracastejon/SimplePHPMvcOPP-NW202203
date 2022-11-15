<?php 
namespace Dao\Mnt;
use Dao\Table;

class Cinemas extends Table{
    public static function insertCinema(
        $cinema_name,
        $cinema_brand,
        $cinema_seats,
        $cinema_type,
        $cinema_status
    ){
        $sqlStr="INSERT INTO cinemas (cinema_name, cinema_brand, cinema_seats, cinema_type, cinema_status) VALUES (:cinema_name, :cinema_brand, :cinema_seats, :cinema_type, :cinema_status)";
        $params = array(
            "cinema_name" => $cinema_name,
            "cinema_brand" => $cinema_brand,
            "cinema_seats" => $cinema_seats,
            "cinema_type" => $cinema_type,
            "cinema_status" => $cinema_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getCinemas(){
        $sqlStr="SELECT * FROM cinemas";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getCinemaById($cinema_id){
        $strSql = "SELECT * FROM cinemas WHERE cinema_id=:cinema_id;";
        return self::obtenerUnRegistro($strSql, array(
            "cinema_id" => $cinema_id
        ));
    }
}
?>