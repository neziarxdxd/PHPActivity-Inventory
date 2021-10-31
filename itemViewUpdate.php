<?php
    include "config/database.php";
    include "classes/item.php";
    include "classes/category.php";


$database_obj = new Database();
$db_lv = $database_obj->getConnection();

$item_obj = new Item($db_lv);

if($_POST){
    $item_obj->itemId_fld = $_POST['ItemId_ajax'];
    $item_obj->viewOneItem();

echo '
    <form method="POST" id="updateItem_form">
    <div class= "modal-body">
        <input type="hidden" class="form-control" name="itemId_fld" value="' . $item_obj->itemId_fld . '">' . '
        <label>ID Number</label>
        <input type="text" class="form-control" name="itemId_fld" value="'. $item_obj->itemId_fld . '">' . '
        <label>Last Name</label>
        <input type="text" class="form-control" name="ItemName_fld" value="'. $item_obj->ItemName_fld . '">' . '
        <label>Quantity</label>
        <input type="text" class="form-control" name="ItemQuantity_fld" value="'. $item_obj->ItemQuantity_fld . '">' . '
        
        <label>Course</label>
        <select class="form-control" name="CategoryId_fld">';
            $category_obj = new Category($db_lv);
            $stmt = $category_obj->viewAllCategory();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                if($item_obj->CategoryId_fld == $row['CategoryId_fld']){
                    echo "<option value={$CategoryId_fld} selected> {$CategoryName_fld}</option>";
                }
                else{
                    echo "<option value={$CategoryId_fld}>{$CategoryName_fld}</option>";
                }
            }
    echo '</select>  
    
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
    </form>';
}
?>

<script src = "scripts/item_script.js"></script>