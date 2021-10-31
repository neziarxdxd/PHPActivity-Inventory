<?php
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";
    include "classes/category.php";


$database_obj = new Database();
$db_lv = $database_obj->getConnection();

$category_obj = new Category($db_lv);

if($_POST){
    $category_obj->CategoryId_fld = $_POST['CategoryId_ajax'];
    $category_obj->viewOneCategory();

echo '
    <form method="POST" id="updateCategory_form">
    <div class= "modal-body">
        <input type="hidden" class="form-control" name="CategoryId_fld" value="' . $category_obj->CategoryId_fld. '">' . '
        <label>Name</label>
        <input type="text" class="form-control" name="CategoryName_fld" value="'. $category_obj->CategoryName_fld . '">' . '
      
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
    </form>';
}
?>

<script src = "scripts/category_script.js"></script>