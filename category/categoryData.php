<table class="table">
    <thead>
            <th scope="col">Category ID</th>
            <th scope="col">Category Name</th>
          
            <th scope="col">Actions</th>
    </thead>
        <tbody>
        <?php
            $stmt = $category_object->viewAllCategory();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
        echo "<tr>
             
                <td> {$CategoryId_fld} </td>
                <td> {$CategoryName_fld} </td>  
                <td> <input type = 'button' class = 'btn btn-outline-success update_btn' updateId='{$CategoryId_fld}' value='Update'>
                     <input type = 'button' class = 'btn btn-outline-danger' value='Delete'>
                </td>
              </tr>";
                 }
            ?> 
            
        </tbody>
</table>