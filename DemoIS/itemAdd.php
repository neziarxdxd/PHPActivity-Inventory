<?php
    include "config/database.php";
    include "classes/item.php";

    $database_obj = new Database();
    $db = $database_obj->getConnection();

    if($_POST){
        $item_obj = new Item($db);

        $item_obj->ItemName_fld = $_POST['ItemName_fld'];
        $item_obj->CategoryId_fld = $_POST['CategoryId_fld'];
        $item_obj->ItemQuantity_fld = $_POST['ItemQuantity_fld'];

        $item_obj->addItem();

        include "itemData.php";
    }
?>