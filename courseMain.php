<?php
    include "header.php";
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";
   

    $database_obj = new Database(); 
    $db_lv = $database_obj->getConnection(); 
    
    $course_object = new Course($db_lv);

    $stmt = $course_object->viewAllCourse();

  
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
  Add Course 
</button>

<div id="courseData_div">
    <?php include "courseData.php"; ?>
</div>



<!--Add Modal -->
<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" id="addCourseForm">
      <div class="modal-body">
     

      <label class="form-label">Course Code</label>
      <input type="text" class="form-control" name="CourseCode_fld">

      <label class="form-label">Course Description</label>
      <input type="text" class="form-control" name="CourseDescription_fld">
         
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

<script src="scripts/course_script.js"></script>

<?php
    include "footer.php";
?>
