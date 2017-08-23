/**
 * Created by Mariusz on 15.08.2017.
 */


$(document).ready(function(){

    function edit_data(id, text){

        $.ajax({
            url: 'includes/edit.php',
            type: 'POST',
            data:{id: id, text: text},

            success: function(data){


            },

            error: function() {
                alert( "Wystąpił błąd w połączniu :(");
            }
        });

    } // end function edit_data


    $(document).on('blur', '.url', function(){

       var id = $(this).data("id").replace(/'/g,"");
       var category = $(this).text();
       edit_data(id, category);

    });

});
