<?php
class Course{

    public $CourseCode_fld;
    public $CourseId_fld;
    public $CourseDescription_fld;
  


    public function __construct($db_lv){
        $this->conn_cv = $db_lv;
    }

    public function viewAllCourse(){
        $sql = "SELECT  * FROM course_tbl";
        $stmt = $this->conn_cv->prepare($sql);
        $stmt->execute();
        
        return $stmt;
    }

    public function viewOneCourse(){
        $sql = "SELECT * FROM course_tbl WHERE CourseId_fld=?";

        $stmt = $this->conn_cv->prepare($sql);
        $stmt->bindparam(1,$this->CourseId_fld);
        $stmt->execute();
        
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $this->CourseId_fld = $row['CourseId_fld'];
        $this->CourseCode_fld = $row['CourseCode_fld'];
        $this->CourseDescription_fld = $row['CourseDescription_fld'];
        }

    public function addCourse(){
            $sql = "INSERT INTO course_tbl SET CourseId_fld=?, CourseCode_fld=?, CourseDescription_fld=?";

            $stmt = $this->conn_cv->prepare($sql);

            $stmt->bindparam(1,$this->CourseId_fld);
            $stmt->bindparam(2,$this->CourseCode_fld);
            $stmt->bindparam(3,$this->CourseDescription_fld);
            
           

            $stmt->execute();
        }

    public function updateCourse(){
            $sql = "UPDATE course_tbl SET CourseCode_fld=?, CourseDescription_fld=? WHERE CourseId_fld=?";
    
            $stmt = $this->conn_cv->prepare($sql);
            
            $stmt->bindparam(1,$this->CourseCode_fld);
            $stmt->bindparam(3,$this->CourseId_fld);
            $stmt->bindparam(2,$this->CourseDescription_fld);

            $stmt->execute();
            return $stmt;
        }
}

?>