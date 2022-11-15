<?php 
namespace Dao\Mnt;
use Dao\Table;

class Books extends Table{
    public static function insertBook(
        $book_name,
        $book_date,
        $book_author,
        $book_type,
        $book_barcode,
        $book_status,
    ){
        $sqlStr="INSERT INTO books (book_name, book_date, book_author,book_type,book_barcode,book_status) VALUES (:book_name,:book_date,:book_author, :book_type, :book_barcode,:book_status)";
        $params = array(
            "book_name" => $book_name,
            "book_date" => $book_date,
            "book_author" => $book_author,
            "book_type" => $book_type,
            "book_barcode" => $book_barcode,
            "book_status" => $book_status,
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getBooks(){
        $sqlStr="SELECT * FROM books";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getBookById($book_id){
        $strSql = "SELECT * FROM books WHERE book_id=:book_id;";
        return self::obtenerUnRegistro($strSql, array(
            "book_id"=>$book_id
        ));
    }
}
?>