<?php 
namespace Dao\Mnt;
use Dao\Table;

class Cars extends Table{
    public static function insertCar(
        $car_model,
        $car_owner,
        $car_plaque,
        $car_year,
        $car_color,
        $car_motor,
        $car_status,
    ){
        $sqlStr="INSERT INTO cars (car_model, car_owner, car_plaque,car_year,car_color,car_motor,car_status) VALUES (:car_model,:car_owner,:car_plaque, :car_year, :car_color, :car_motor,:car_status)";
        $params = array(
            "car_model" => $car_model,
            "car_owner" => $car_owner,
            "car_plaque" => $car_plaque,
            "car_year" => $car_year,
            "car_color" => $car_color,
            "car_motor" => $car_motor,
            "car_status" => $car_status,
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getCars(){
        $sqlStr="SELECT * FROM cars";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getCarById($cars_id){
        $strSql = "SELECT * FROM cars WHERE cars_id=:cars_id;";
        return self::obtenerUnRegistro($strSql, array(
            "cars_id"=>$cars_id
        ));
    }
}
?>