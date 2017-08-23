/**
 * Created by Mariusz on 09.08.2017.
 */

$(document).ready(function(){

    var count = 0;

       $('#executeShow').on('click', function(event) {

        event.preventDefault();


        if (count % 2 == 1) {

            value_btn = "Wyświetl kanały RSS";
            $('#executeShow').attr('value', value_btn);

        } else {

            value_btn = "Schowaj kanały RSS";
            $('#executeShow').attr('value', value_btn);


        }

        $('#response').toggle();

        count++;

       $('#response').load("views/canals_list.php");


    }); // end executeShow on click


});