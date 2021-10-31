<table class="table">
    <thead>
            <th scope="col">Item Name</th>
            <th scope="col">Category</th>
            <th scope="col">Quantity</th>
            <th scope="col">Actions</th>
    </thead>
        <tbody>
        <?php
            $stmt = $item_obj->viewAllItem();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
        echo "<tr>
                <td> {$ItemName_fld} </td>
                <td> {$CategoryName_fld} </td>
                <td> {$ItemQuantity_fld} </td>
                <td> <input type = 'button' class = 'btn btn-outline-success update_btn' updateId='{$itemId_fld}' value='Update'>
                     <input type = 'button' class = 'btn btn-outline-danger' value='Delete'>
                </td>
              </tr>";
                 }
            ?> 
            
        </tbody>
</table>