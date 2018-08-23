$(document).ready(function () {
    $(".btn").click(function () {
        var params = $("input[name='product_id[]']:checked");
        $.post(url, params, function(data) {
            $("table").html(data);
        });
    });
});
