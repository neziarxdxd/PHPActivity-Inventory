<?php
    include "config/database.php";
    include "classes/category.php";

    $database_obj = new Database();
    $db = $database_obj->getConnection();

    if($_POST){
        $category_obj = new Category($db);

        $category_obj->StudentIdNumber_cv = $_POST['StudentIdNumber_ml'];
        $category_obj->StudentLastName_cv = $_POST['StudentLastName_ml'];
        $category_obj->CourseId_cv = $_POST['CourseId_ml'];

        $category_obj->addCategory();

        include "categoryData.php";
    }
?>