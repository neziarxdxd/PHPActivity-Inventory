<?php
    include "header.php";
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";
    include "classes/category.php";

    $database_obj = new Database(); 
    $db_lv = $database_obj->getConnection(); 
    
    $category_object = new Category($db_lv);

    $stmt = $category_object->viewAllCategory();

  
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
  Add Category 
</button>

<div id="categoryData_div">
    <?php include "categoryData.php"; ?>
</div>



<!--Add Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" id="addCategoryForm">
      <div class="modal-body">
      <label class="form-label">Category ID</label>
      <input type="text" class="form-control" name="CategoryId_fld">

      <label class="form-label">Category Name</label>
      <input type="text" class="form-control" name="CategoryName_fld">


         
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
        <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
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
                <h5 class="modal-title" id="modalTitle">Update Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div id="viewUpdateModal_div">
                </div>
        </div>
    </div>
</div> -->

<script src="scripts/category_script.js"></script>

<?php
    include "footer.php";
?>
