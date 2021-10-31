$(document).on('click', '.update_btn', function(){
    var CategoryId_js = $(this).attr('updateId');
    console.log(CategoryId_js);

    $.ajax({
        url:'categoryViewUpdate.php',
        method: "POST",
        data:{CategoryId_ajax:CategoryId_js},

        success:function(data){
            $('#viewUpdateModal_div').html(data);
            $('#update_modal').modal('show');
        }

    })
});


// FOR CATEGORY

$('#updateCategory_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'categoryUpdate.php',
        method: "POST",
        data: $('#updateCategory_form').serialize(), 

        success:function(data){
            $('#updateCategoryModal').modal('hide');
            $('#CategoryData_div').html(data);     
        }
    })
});

$('#updateCategory_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'categoryUpdate.php',
        method: "POST",
        data: $('#updateCategory_form').serialize(), 

        success:function(data){
            $('#update_modal').modal('hide');
            $('#categoryData_div').html(data);     
        }
    })
});

$('#addCategoryForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url:'categoryAdd.php',
        method:'POST',
        data:$('#addCategoryForm').serialize(),

        success:function(data){
            $('#addModal').modal('hide');
            $('#addCategoryForm')[0].reset();
            $('#categoryData_div').html(data);
        }
    })
});