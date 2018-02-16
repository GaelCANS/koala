$(document).ready(function(){

    $('.date-not-null').each(function(){
        if ($(this).val() == '0000-00-00')
            $(this).val('');
    });

});