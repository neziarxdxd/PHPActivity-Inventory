<?php
    include "header.php";
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";

    $database_obj = new Database(); 
    $db_lv = $database_obj->getConnection(); 
    
    $student_obj = new Student($db_lv);

    $stmt = $student_obj->viewAllStudent();

    $CourseArray = ['BSIT','BSCS','BSCPE'];
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
  Add Student
</button>

<div id="studentData_div">
    <?php include "studentData.php"; ?>
</div>



<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="POST" id="addStudentForm">
      <div class="modal-body">
      <label class="form-label">Student ID Number</label>
      <input type="text" class="form-control" name="StudentIdNumber_ml">

      <label class="form-label">Student Last Name</label>
      <input type="text" class="form-control" name="StudentLastName_ml">

      <label class="form-label">Course</label>

    <select class="form-control" name="CourseId_ml">
        <?php
        $course_obj = new Course($db_lv);
        $stmt = $course_obj->viewAllCourse();
        echo "<option selected>Select Course</option>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<option value='{$CourseId_fld}'>{$CourseCode_fld}-{$CourseDescription_fld}</option>";
            
        }
        ?>
    </select>

    <label class="form-label">Password</label>
      <input type="password" class="form-control" name="StudentPassword_ml"> 
         
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

<script src="scripts/student_script.js"></script>

<?php
    include "footer.php";
?>
