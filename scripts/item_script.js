$(document).on('click', '.update_btn', function(){
    var ItemId_js = $(this).attr('updateId');
    console.log(ItemId_js);

    $.ajax({
        url:'itemViewUpdate.php',
        method: "POST",
        data:{ItemId_ajax:ItemId_js},

        success:function(data){
            $('#viewUpdateModal_div').html(data);
            $('#update_modal').modal('show');
        }

    })
});




$('#updateItem_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'itemUpdate.php',
        method: "POST",
        data: $('#updateItem_form').serialize(), 

        success:function(data){
            $('#updateItemModal').modal('hide');
            $('#itemData_div').html(data);     
        }
    })
});

$('#updateItem_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'itemUpdate.php',
        method: "POST",
        data: $('#updateItem_form').serialize(), 

        success:function(data){
            $('#update_modal').modal('hide');
            $('#itemData_div').html(data);     
        }
    })
});

$('#addItemForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url:'itemAdd.php',
        method:'POST',
        data:$('#addItemForm').serialize(),

        success:function(data){
            $('#addModal').modal('hide');
            $('#addItemForm')[0].reset();
            $('#itemData_div').html(data);
        }
    })
});