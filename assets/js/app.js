/*for FAX allow only Number and '-"*/
$(document).on('keypress','#office,#fax',function (e) { 

if (e.which != 8 && e.which != 0 && (e.which < 45 || e.which > 57)) {
        //display error message
         e.preventDefault();
               return false;
}});
