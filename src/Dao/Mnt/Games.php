<?php 
namespace Dao\Mnt;
use Dao\Table;

class Games extends Table{
    public static function insertGame(
        $game_name,
        $game_type,
        $game_brand,
        $game_console,
        $game_status
    ){
        $sqlStr="INSERT INTO games (game_name, game_type, game_brand, game_console, game_status) VALUES (:game_name, :game_type, :game_brand, :game_console, :game_status)";
        $params = array(
            "game_name" => $game_name,
            "game_type" => $game_type,
            "game_brand" => $game_brand,
            "game_console" => $game_console,
            "game_status" => $game_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getGames(){
        $sqlStr="SELECT * FROM games";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getGameById($game_id){
        $strSql = "SELECT * FROM games WHERE game_id=:game_id;";
        return self::obtenerUnRegistro($strSql, array(
            "game_id" => $game_id
        ));
    }
}
?>