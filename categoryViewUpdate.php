<?php
    include "config/database.php";
    include "classes/student.php";
    include "classes/course.php";


$database_obj = new Database();
$db_lv = $database_obj->getConnection();

$student_obj = new Student($db_lv);

if($_POST){
    $student_obj->StudentId_cv = $_POST['StudentId_ajax'];
    $student_obj->viewOneStudent();

echo '
    <form method="POST" id="updateStudent_form">
    <div class= "modal-body">
        <input type="hidden" class="form-control" name="StudentId_ml" value="' . $student_obj->StudentId_cv . '">' . '
        <label>ID Number</label>
        <input type="text" class="form-control" name="StudentIdNumber_ml" value="'. $student_obj->StudentIdNumber_cv . '">' . '
        <label>Last Name</label>
        <input type="text" class="form-control" name="StudentLastName_ml" value="'. $student_obj->StudentLastName_cv . '">' . '
        <label>Course</label>
        <select class="form-control" name="CourseId_ml">';
            $course_obj = new Course($db_lv);
            $stmt = $course_obj->viewAllCourse();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                if($student_obj->CourseId_cv == $row['CourseId_fld']){
                    echo "<option value={$CourseId_fld} selected> {$CourseCode_fld}-{$CourseDescription_fld}</option>";
                }
                else{
                    echo "<option value={$CourseId_fld}>{$CourseCode_fld}-{$CourseDescription_fld}</option>";
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

<script src = "scripts/student_script.js"></script>