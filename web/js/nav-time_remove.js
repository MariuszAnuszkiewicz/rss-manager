/**
 * Created by Mariusz on 19.08.2017.
 */


$(document).ready(function(){

   var count = 0;

   $('.section_select_time_remove').hide();
   $('#show_time_remove').hide();

   $('#trigger_btn_zone').on('click', function() {

      count++;

       if(count == 1) {

           $('.down_arrow').removeClass('up_arrow');
           $('.section_select_time_remove').show();
           $('#show_time_remove').show();

       }
       if(count == 2) {

           $('.section_select_time_remove').hide();
           $('#show_time_remove').hide();
           $('.down_arrow').addClass('up_arrow');
           count = 0;

       }

   }); // end event on #trigger_btn_zone


});
