$(document).ready(function(){

    /**
     * Gestion des dates pour éviter qu'elles apparaissent à 0000-00-00 dans les champs input
     */
    $('.date-not-null').each(function(){
        if ($(this).val() == '0000-00-00')
            $(this).val('');
    });



    /**
     * Initialisation du select2
     */
    $('select[multiple]').select2();
    $('select.select2').select2();

    

});