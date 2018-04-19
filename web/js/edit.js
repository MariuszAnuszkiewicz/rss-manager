$(document).ready(function() {
    function edit_data(id, text) {
        $.ajax({
            url: 'includes/edit.php',
            type: 'POST',
            data:{id: id, text: text},
            success: function(data) {
            },
            error: function() {
                alert( "Wystąpił błąd w połączniu :(");
            }
        });
    } 
    $(document).on('blur', '.url', function() {
       var id = $(this).data("id").replace(/'/g,"");
       var category = $(this).text();
       edit_data(id, category);
    });
});
