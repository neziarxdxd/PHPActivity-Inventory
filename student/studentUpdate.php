<?php
    include "config/database.php";
    include "classes/student.php";

    $database_obj = new Database();
    $db_lv = $database_obj->getConnection();

    $student_obj = new Student($db_lv);


    if($_POST){
        $student_obj->StudentIdNumber_cv = $_POST['StudentIdNumber_ml'];
        $student_obj->StudentLastName_cv = $_POST['StudentLastName_ml'];
        $student_obj->CourseId_cv = $_POST['CourseId_ml'];
        $student_obj->StudentId_cv = $_POST['StudentId_ml'];

        $stmt = $student_obj->updateStudent();
        

        $rowsAffected = $stmt->rowCount();

        if($rowsAffected > 0){
            echo
                '<div class="alert alert-success alert-dismissable fade show" role="alert">
                Reocrd is successfully updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>';
        }
        else{
            echo
                '<div class="alert alert-danger alert-dismissable fade show" role="alert">
                Record is NOT updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>';
        
        }

        include "studentData.php";
    }
?>
