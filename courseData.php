<table class="table">
    <thead>
          
            <th scope="col">Course Code</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
    </thead>
        <tbody>
        <?php
            $stmt = $course_object->viewAllCourse();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
        echo "<tr>
                <td> {$CourseCode_fld} </td>
                
                <td> {$CourseDescription_fld} </td>
                <td> <input type = 'button' class = 'btn btn-outline-success update_btn' updateId='{$CourseId_fld}' value='Update'>
                     <input type = 'button' class = 'btn btn-outline-danger' value='Delete'>
                </td>
              </tr>";
                 }
            ?> 
            
        </tbody>
</table>