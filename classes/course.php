<?php
class Course{

    public function __construct($db_lv){
        $this->conn_cv = $db_lv;
    }

    public function viewAllCourse(){
        $sql = "SELECT  * FROM course_tbl";
        $stmt = $this->conn_cv->prepare($sql);
        $stmt->execute();
        
        return $stmt;
    }
}

?>