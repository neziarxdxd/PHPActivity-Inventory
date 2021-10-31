$(document).on('click', '.update_btn', function(){
    var StudentId_js = $(this).attr('updateId');
    console.log(StudentId_js);

    $.ajax({
        url:'studentViewUpdate.php',
        method: "POST",
        data:{StudentId_ajax:StudentId_js},

        success:function(data){
            $('#viewUpdateModal_div').html(data);
            $('#update_modal').modal('show');
        }

    })
});




$('#updateStudent_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'studentUpdate.php',
        method: "POST",
        data: $('#updateStudent_form').serialize(), 

        success:function(data){
            $('#updateStudentModal').modal('hide');
            $('#studentData_div').html(data);     
        }
    })
});

$('#updateStudent_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'studentUpdate.php',
        method: "POST",
        data: $('#updateStudent_form').serialize(), 

        success:function(data){
            $('#update_modal').modal('hide');
            $('#studentData_div').html(data);     
        }
    })
});

$('#addStudentForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url:'studentAdd.php',
        method:'POST',
        data:$('#addStudentForm').serialize(),

        success:function(data){
            $('#addModal').modal('hide');
            $('#addStudentForm')[0].reset();
            $('#studentData_div').html(data);
        }
    })
});