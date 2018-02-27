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
     * Initialsation data-href
     */
    $('.ajax-action').on('click', '[data-href]' , function () {
        var msg = $(this).data('msg');
        if (msg != '') {
            if (confirm(msg))
                window.location.href = $(this).data('href');
        }
        else {
            window.location.href = $(this).data('href');
        }
    });


    /**
     * Gestion des ajax-del
     *
     * Si l'attribut data-msg est renseigné, on affiche un message de confirmation avant traitement
     */
    $('.ajax-action').on('click' , '.ajax-del' , function(){

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
    $('.ajax-action').on('click', '.ajax-duplicate-campaignchannel' , function(){
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
            if (data.duplicated == '1') {
                $('#channel-'+data.parent).after(data.html);
                $('select.select2').select2();
                $('.to-focus').last().focus();

                if ($('#channel-'+data.parent+'.from-ajax').length > 0) {

                    // Duplication du commentaire
                    var comment = $('#channel-'+data.parent+' [data-name="comment"]').val();
                    $('#channel-'+data.newItem+' [data-name="comment"]').val(comment);

                    // Duplication des valeurs d'indicateurs
                    $('#channel-'+data.parent+' .duplicatable-indicator').each(function(){

                        var indicatorValue  = $(this).val();
                        var indicatorName   = $(this).data('name');
                        var indicatorId     = $(this).data('indicator');
                        $('#channel-'+data.newItem+' [data-name="'+indicatorName+'"][data-indicator="'+indicatorId+'"]').val(indicatorValue);

                    });
                }

                // TODO - reprendre duplication des indicateurs dans le cas d'une duplication d'un élément (qui vient d'être ajouté ou dupliqué)

            }
        });

    });


    

    $('#add-channel').on('select2:select' , '.select2' , function(e){
        var data = e.params.data;
        var selected = data.id;
        if (selected > 0) {
            var link = $(this).parents('#add-channel').data('link').replace('--VALUE--',selected);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: link,
                data: {selected: selected}
            })
            .done(function( data ) {
                if (data.added == '1') {
                    $( "#channels-table tbody" ).append( data.html );
                    $('select.select2').select2();
                    $('.to-focus').last().focus();
                }
            });
        }

        $(this).val(0).trigger('change.select2');
    });


    
    $('#block-campaigns').on('click' , '.btn-period-campaign' , function(e){
        var link = $(this).data('link');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: link,
            data: {}
        })
        .done(function( data ) {

            $('#block-campaigns').html(data.html);
        });
    });



});