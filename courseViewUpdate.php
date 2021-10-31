<?php
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";


$database_obj = new Database();
$db_lv = $database_obj->getConnection();

$course_obj = new Course($db_lv);

if($_POST){
    $course_obj->CourseId_fld = $_POST['CourseId_ajax'];
    $course_obj->viewOneCourse();

echo '
    <form method="POST" id="updateCourse_form">
    <div class= "modal-body">
        <input type="hidden" class="form-control" name="CourseId_fld" value="' . $course_obj->CourseId_fld. '">' . '
        <label>Course Code</label>
        <input type="text" class="form-control" name="CourseCode_fld" value="'. $course_obj->CourseCode_fld . '">' . '
        <label>Description</label>
        <input type="text" class="form-control" name="CourseDescription_fld" value="'. $course_obj->CourseDescription_fld . '">' . '
        
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
    </form>';
}
?>

<script src = "scripts/course_script.js"></script>