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


    /**
     * Gestion des ajax-del
     *
     * Si l'attribut data-msg est renseigné, on affiche un message de confirmation avant traitement
     */
    $('.ajax-del').click(function(){

        var msgConfirm = $(this).data('msg') != '' ? $(this).data('msg') : undefined;
        if (msgConfirm != undefined) {
            if (!confirm(msgConfirm)) return false;
        }
        
        var link = $(this).data('link');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: link,
            data: {}
        })
        .done(function( data ) {
            data = $.parseJSON(data);
            if (data.deleted == '1') {
                $('#'+data.id).remove();
            }
            else {
                alert(data.error_msg);
            }
        });

    });


    /**
     * Gestion de la duplication de Campaignchannel
     *
     * Si l'attribut data-msg est renseigné, on affiche un message de confirmation avant traitement
     */
    $('.ajax-duplicate-campaignchannel').click(function(){

        var msgConfirm = $(this).data('msg') != '' ? $(this).data('msg') : undefined;
        if (msgConfirm != undefined) {
            if (!confirm(msgConfirm)) return false;
        }

        var link = $(this).data('link');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: link,
            data: {}
        })
        .done(function( data ) {
            data = $.parseJSON(data);
            if (data.duplicate == '1') {
                alert('coucou');
            }
            else {
                alert(data.error_msg);
            }
        });

    });



});