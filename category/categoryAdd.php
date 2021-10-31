<?php
    include "config/database.php";
    include "classes/category.php";

    $database_obj = new Database();
    $db = $database_obj->getConnection();

    if($_POST){
        $category_object = new Category($db);

        $category_object->CategoryId_fld = $_POST['CategoryId_fld'];
        $category_object->CategoryName_fld = $_POST['CategoryName_fld'];

     

        $category_object->addCategory();

        include "categoryData.php";
    }
?>