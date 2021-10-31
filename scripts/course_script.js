$(document).on('click', '.update_btn', function(){
    var CourseId_js = $(this).attr('updateId');
    console.log(CourseId_js);

    $.ajax({
        url:'courseViewUpdate.php',
        method: "POST",
        data:{CourseId_ajax:CourseId_js},

        success:function(data){
            $('#viewUpdateModal_div').html(data);
            $('#update_modal').modal('show');
        }

    })
});


// FOR CATEGORY

$('#updateCourse_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'courseUpdate.php',
        method: "POST",
        data: $('#updateCourse_form').serialize(), 

        success:function(data){
            $('#updateCourseModal').modal('hide');
            $('#CourseData_div').html(data);     
        }
    })
});

$('#updateCourse_form').on('submit',function(event){
    event.preventDefault(); 
    $.ajax({
        url: 'courseUpdate.php',
        method: "POST",
        data: $('#updateCourse_form').serialize(), 

        success:function(data){
            $('#update_modal').modal('hide');
            $('#courseData_div').html(data);     
        }
    })
});

$('#addCourseForm').on('submit',function(event){
    event.preventDefault();

    $.ajax({
        url:'courseAdd.php',
        method:'POST',
        data:$('#addCourseForm').serialize(),

        success:function(data){
            $('#addModal').modal('hide');
            $('#addCourseForm')[0].reset();
            $('#courseData_div').html(data);
        }
    })
});