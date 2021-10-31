<?php
    include "header.php";
    include "config/database.php";
    include "classes/item.php";
    include "classes/category.php";

    $database_obj = new Database(); 
    $db_lv = $database_obj->getConnection(); 
    
    $item_obj = new Item($db_lv);

    $stmt = $item_obj->viewAllItem();

    $CourseArray = ['BSIT','BSCS','BSCPE'];
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
  Add Item
</button>

<div id="itemData_div">
    <?php include "itemData.php"; ?>
</div>



<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" id="addItemForm">
      <div class="modal-body">
    

      <label class="form-label">Item Name</label>
      <input type="text" class="form-control" name="ItemName_fld">

      <label class="form-label">Category</label>

    <select class="form-control" name="CategoryId_fld">
        <?php
        $category_obj = new Category($db_lv);
        $stmt = $category_obj->viewAllCategory();
        echo "<option selected>Select Category</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<option value='{$CategoryId_fld}'>{$CategoryName_fld}</option>";
            
        }
        ?>
    </select>

    <label class="form-label">Quantity</label>
      <input type="text" class="form-control" name="ItemQuantity_fld"> 
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Update Modal -->

<div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
    <div id = "viewUpdateModal_div"></div>


    </div>
  </div>
</div>



<!--<div class="modal fade" id="update_modal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Update Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div id="viewUpdateModal_div">
                </div>
        </div>
    </div>
</div> -->

<script src="scripts/item_script.js"></script>

<?php
    include "footer.php";
?>
