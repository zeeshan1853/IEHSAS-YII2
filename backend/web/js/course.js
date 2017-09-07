$(document).ready(function () {


});

function deleteCourse(course_id, element) {
     if (! confirm("Are you sure, you want to delete this course?")) {
        return false;
    }
    $.ajax({
        url: baseUrl + 'course/delete',
        type: 'post',
        data: {id: course_id},
        dataType: "json",
        success: function (r) {
            console.log(r);
            if (r.msgType === 'SUC') {
                toastr.success(r.msg);
                $(element).parent().parent().hide(1000, function () {
                    $(element).parent().parent().remove();
                });
            } else {
                toastr.error(r.msg);
            }
        },
        error: function ()
        {
            toastr.error('Internal server error');
        }
    });
}

