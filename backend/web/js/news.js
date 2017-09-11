$(document).ready(function () {


});

function deleteNews(news_id, element) {
     if (! confirm("Are you sure, you want to delete this news?")) {
        return false;
    }
    $.ajax({
        url: baseUrl + 'news/delete',
        type: 'post',
        data: {id: news_id},
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

