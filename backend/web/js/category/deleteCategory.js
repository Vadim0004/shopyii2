$(document).ready(function () {
    $(".btn").click(function () {
        var params = $("input[name='category_id[]']:checked");
        $.post("category/delete-ajax", params, function(data) {
            $("table").html(data);
        });
    });
});