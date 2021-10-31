<?php
    include "config/database.php";
    include "classes/item.php";

    $database_obj = new Database();
    $db_lv = $database_obj->getConnection();

    $item_obj = new Item($db_lv);


    if($_POST){
        $item_obj->itemId_fld = $_POST['itemId_fld'];
        $item_obj->ItemName_fld = $_POST['ItemName_fld'];
        $item_obj->CategoryId_fld = $_POST['CategoryId_fld'];
        $item_obj->ItemQuantity_fld = $_POST['ItemQuantity_fld'];

        $stmt = $item_obj->updateItem();
        

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

        include "itemData.php";
    }
?>
