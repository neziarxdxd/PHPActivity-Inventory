<?php
    include "config/database.php";
    include "classes/student.php";

    $database_obj = new Database();
    $db = $database_obj->getConnection();

    if($_POST){
        $student_obj = new Student($db);

        $student_obj->StudentIdNumber_cv = $_POST['StudentIdNumber_ml'];
        $student_obj->StudentLastName_cv = $_POST['StudentLastName_ml'];
        $student_obj->CourseId_cv = $_POST['CourseId_ml'];
        $student_obj->StudentPassword_cv = $_POST['StudentPassword_ml'];

        $student_obj->addStudent();

        include "studentData.php";
    }
?>