<?php 
namespace Dao\Mnt;
use Dao\Table;

class Movies extends Table{
    public static function insertMovie(
        $movie_name,
        $movie_type,
        $movie_mainlead,
        $movie_producer,
        $movie_status
    ){
        $sqlStr="INSERT INTO movies (movie_name, movie_type, movie_mainlead, movie_producer, movie_status) VALUES (:movie_name, :movie_type, :movie_mainlead, :movie_producer, :movie_status)";
        $params = array(
            "movie_name" => $movie_name,
            "movie_type" => $movie_type,
            "movie_mainlead" => $movie_mainlead,
            "movie_producer" => $movie_producer,
            "movie_status" => $movie_status
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getMovies(){
        $sqlStr="SELECT * FROM movies";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getMovieById($movie_id){
        $strSql = "SELECT * FROM movies WHERE movie_id=:movie_id;";
        return self::obtenerUnRegistro($strSql, array(
            "movie_id" => $movie_id
        ));
    }
}
?>