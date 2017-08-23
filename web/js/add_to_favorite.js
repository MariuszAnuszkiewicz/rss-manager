/**
 * Created by Mariusz on 16.08.2017.
 */


$(document).ready(function(){

    var count = 0;

    $(document).delegate("span.no_add_favorite", "click", function() {

        $('.no_add_favorite').on('click', function(event) {

            event.preventDefault();

            count++;

            if (count % 2 == 1) {

                $(this).removeClass("no_add_favorite");
                $(this).addClass("add_favorite");
                var content_favorite = "yes";

            }

            else{

                $(this).removeClass("add_favorite");
                $(this).addClass("no_add_favorite");
                var content_favorite = "no";
                count = 0;

            }


            var id = $(this).data("id_fav").replace(/'/g,"");

            $.ajax({
                url: 'includes/add_to_favorite.php',
                type: 'POST',
                data:{id: id, content_favorite: content_favorite},

                success: function(){

                },

                error: function() {
                    alert( "Wystąpił błąd w połączniu :(");
                }

            }); // end ajax method

        }); // end click on

    }); // end delegate


});
