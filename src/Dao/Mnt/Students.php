<?php 
namespace Dao\Mnt;
use Dao\Table;

class Students extends Table{
    public static function insertStudent(
        $student_name,
        $student_birthdate,
        $student_gender,
        $student_email,
        $student_phone,
        $student_status,
    ){
        $sqlStr="INSERT INTO students (student_name, student_birthdate, student_gender,student_email,student_phone,student_status) VALUES (:student_name,:student_birthdate,:student_gender, :student_email, :student_phone,:student_status)";
        $params = array(
            "student_name" => $student_name,
            "student_birthdate" => $student_birthdate,
            "student_gender" => $student_gender,
            "student_email" => $student_email,
            "student_phone" => $student_phone,
            "student_status" => $student_status,
        );

        return self::executeNonQuery($sqlStr,$params);
    }

    public static function getStudents(){
        $sqlStr="SELECT * FROM students";
        return self::obtenerRegistros($sqlStr, array());
    }

    public static function getStudentById($student_id){
        $strSql = "SELECT * FROM students WHERE student_id=:student_id;";
        return self::obtenerUnRegistro($strSql, array(
            "student_id"=>$student_id
        ));
    }
}
?>