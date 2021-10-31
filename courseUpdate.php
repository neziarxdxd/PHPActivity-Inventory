<?php
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";
    $database_obj = new Database();
    $db_lv = $database_obj->getConnection();

    $course_object = new Course($db_lv);


    if($_POST){
        $course_object->CourseId_fld = $_POST['CourseId_fld'];
        $course_object->CourseCode_fld = $_POST['CourseCode_fld'];
        $course_object->CourseDescription_fld= $_POST['CourseDescription_fld'];

        $stmt = $course_object->updateCourse();
        

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

        include "courseData.php";
    }
?>
