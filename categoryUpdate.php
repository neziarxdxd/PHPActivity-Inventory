<?php
    include "config/database.php";
    include "classes/student.php";
    include "classes/category.php";
    $database_obj = new Database();
    $db_lv = $database_obj->getConnection();

    $category_object = new Category($db_lv);


    if($_POST){
        $category_object->CategoryId_fld = $_POST['CategoryId_fld'];
        $category_object->CategoryName_fld = $_POST['CategoryName_fld'];
   

        $stmt = $category_object->updateCategory();
        

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

        include "categoryData.php";
    }
?>
