var courses = ['5','10', '15', '20'];

$('#select_cat').one('change', function() {
    $('#update_cat').prop('disabled', false);
});