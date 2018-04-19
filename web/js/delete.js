$(document).ready(function() {
    function delete_data(id, el) {
        $.ajax({
            url: 'includes/remove.php',
            type: 'POST',
            data: {id: id},
            success: function() {
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800, function() {
                    $(this).remove();
                });
            }, 
            error: function() {
                alert( "Wystąpił błąd w połączniu :(");
            }
        });
    } 
    $(document).delegate("span.delete", "click", function() {
        $('.delete').click(function() {
            var el = this;
            var id = this.id;
            var splitid = id.split("_");
            var deleteid = splitid[1];
            delete_data(deleteid, el);
        });
    });
});
