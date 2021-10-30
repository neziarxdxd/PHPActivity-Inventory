<?php
class student{
    public $StudentId_cv;
    public $StudentIdNumber_cv;
    public $StudentLastName_cv;
    public $CourseId_cv;
    public $StudentPassword_cv;
    
    private $conn_cv;
    
    
    public function __construct($db_lv){
        $this->conn_cv = $db_lv;
    } 

    public function viewAllStudent(){
        $sql = "SELECT * FROM student_tbl
        INNER JOIN course_tbl ON student_tbl.CourseId_fld = course_tbl.CourseId_fld";
        $stmt = $this->conn_cv->prepare($sql);
        $stmt->execute();

        return $stmt;   
    }

    public function viewOneStudent(){
        $sql = "SELECT * FROM student_tbl WHERE StudentId_fld=?";

        $stmt = $this->conn_cv->prepare($sql);
        $stmt->bindparam(1,$this->StudentId_cv);
        $stmt->execute();
        
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->StudentId_cv = $row['StudentId_fld'];
        $this->StudentIdNumber_cv = $row['StudentIdNumber_fld'];
        $this->StudentLastName_cv = $row['StudentLastName_fld'];
        $this->CourseId_cv = $row['CourseId_fld'];
        }

    public function updateStudent(){
            $sql = "UPDATE student_tbl SET StudentIdNumber_fld=?, StudentLastName_fld=?, CourseId_fld=? WHERE StudentId_fld=?";
    
            $stmt = $this->conn_cv->prepare($sql);
            
            $stmt->bindparam(1,$this->StudentIdNumber_cv);
            $stmt->bindparam(2,$this->StudentLastName_cv);
            $stmt->bindparam(3,$this->CourseId_cv);
            $stmt->bindparam(4,$this->StudentId_cv);

            $stmt->execute();
            return $stmt;
        }

    public function addStudent(){
            $sql = "INSERT INTO student_tbl SET StudentIdNumber_fld=?, StudentLastName_fld=?, CourseId_fld=?, StudentPassword=?";

            $stmt = $this->conn_cv->prepare($sql);

            $stmt->bindparam(1,$this->StudentIdNumber_cv);
            $stmt->bindparam(2,$this->StudentLastName_cv);
            $stmt->bindparam(3,$this->CourseId_cv);
            $stmt->bindparam(4,$this->StudentPassword_cv);

            $stmt->execute();
        }
}
?>