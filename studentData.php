<table class="table">
    <thead>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Course</th>
            <th scope="col">Actions</th>
    </thead>
        <tbody>
        <?php
            $stmt = $student_obj->viewAllStudent();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
        echo "<tr>
                <td> {$StudentIdNumber_fld} </td>
                <td> {$StudentLastName_fld} </td>
                <td> {$CourseCode_fld} </td>
                <td> <input type = 'button' class = 'btn btn-outline-success update_btn' updateId='{$StudentId_fld}' value='Update'>
                     <input type = 'button' class = 'btn btn-outline-danger' value='Delete'>
                </td>
              </tr>";
                 }
            ?> 
            
        </tbody>
</table>