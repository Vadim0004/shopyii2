$(document).ready(function() {
    $(function () {
        $('#openPopup').click(function () {
            $('#modal').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
        });
    });
});