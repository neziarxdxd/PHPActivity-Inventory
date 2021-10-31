<?php
    include "config/database.php";
    include "classes/course.php";

    $database_obj = new Database();
    $db = $database_obj->getConnection();

    if($_POST){
        $course_object = new Course($db);

        $course_object->CourseId_fld = $_POST['CourseId_fld'];
        $course_object->CourseCode_fld = $_POST['CourseCode_fld'];
        $course_object->CourseDescription_fld = $_POST['CourseDescription_fld'];
     

        $course_object->addCourse();

        include "courseData.php";
    }
?>