$(document).ready(function(){

    /**
     * Commun
     *
     */
    initDatepicker();


    /**
     * Gestion des dates pour éviter qu'elles apparaissent à 0000-00-00 dans les champs input
     */
    $('.date-not-null').each(function(){
        if ($(this).val() == '0000-00-00')
            $(this).val('');
    });



    /**
     * Commun
     *
     * Initialisation du select2
     */
    $('select[multiple]').select2();
    $('select.select2').select2();


    /**
     * Commun
     *
     * Initialsation data-href
     */
    $('.ajax-action').on('click', '[data-href]' , function () {
        var msg = $(this).data('msg');
        if (msg != '' && msg != undefined) {
            if (confirm(msg))
                window.location.href = $(this).data('href');
        }
        else {
            window.location.href = $(this).data('href');
        }
    });


    /**
     * Campaign
     */
    $('#channels-table').on('change' , '.datepicker' , function(){
        updateDateCampaign();
    });


    /**
     * Planning
     */
    $('.icheck-line input').on('ifToggled', function(event){
        $('#calendar').fullCalendar( 'refetchEvents' );
    });

    /**
     * Campaign
     */
    if ($('#show-campaign').length > 0) {
        updateDateCampaign();
    }


    /**
     * Campaign
     */
    $('select[name="status"]').on('change' , function () {
        addClassOnPublished();
    });
    addClassOnPublished();


    /**
     * Campaign
     */
    $('.force-placeholder').each(function () {
        $(this).parent().find('.select2-search__field[tabindex="0"]').attr('placeholder' , '+ Ajouter');
    });


    /**
     * Campaign
     */
    $('#form-campaign').on('submit',function(){
        checkDate();
    });


    /**
     * CMM
     */
    $('.auto-save').on('change', function () {
        autoSave();
    });


    /**
     * CMM
     */
    $('#cloture-cmm').on('click', function () {
        closeCmm();
    });


    /**
     * CMM
     */
    $('.btn-chck').on('change' , function(){
        addCampaignCmm( $(this).attr('camp') , $(this).val() );
    });


    /**
     * CMM
     */
    $('.previous-cmm').on('change' , function () {
        loadPreviousCampaignCmm($(this).val());
    });

    /**
     * CMM
     */
    if($(".summernote").length) {

        $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                 // set focus to editable area after initializing summernote
            toolbar: [
                ['font', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol' , 'paragraph']],
            ]
        });
    }

    /**
     * CMM
     */
    $('#send-mail').on('click' , function () {
        $('#loading-mail').show();
        $('#send-mail').hide();
        sendMail();
    });


    /**
     * Campaign index
     */
    $('.toggle-tous').on('select2:select' , function(e){
        // Si "tous" est sélectionné et qu'un autre item est sélectionné, on retire tous
            var tousIndex = _.indexOf($(this).val(), "0");
        if (tousIndex == "0" && $(this).val().length > 1) {
            $(this).parent().find('.select2-selection__choice[title="Tous"]').find('.select2-selection__choice__remove').trigger('click');
            $(this).select2('close');
        }
        $(this).parent().find('[tabindex="0"]').attr('placeholder','+ Ajouter');
    });

    /**
     * Campaign index
     */
    $('.toggle-tous').on('select2:unselect' , function(e){
        // Si rien n'est sélectionné alors on resélectionne "tous" en valeur défaut
        if ($(this).val().length == 0) {
            $(this).select2('val' , "0");
        }
    });

    /**
     * Campaign
     *
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
                // Relance le calcul des périodes de campagnes
                updateDateCampaign();
            }
            else {
                alert(data.error_msg);
            }
        });

    });


    /**
     * Campaign
     *
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
                //$('.to-focus').last().focus();

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

                // Re init datepicker
                $( ".datepicker" ).datepicker({
                    language: 'fr',
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
                // Auto open begin datepicker & on select date begin auto open end datepicker and set the min day selectable
                $('#channel-'+data.newItem+' .to-focus').datepicker('show').on('changeDate', function(e) {
                    var end = $(this).closest('.from-ajax').find('[data-name="end"]');
                    end.datepicker('setStartDate' , $(this).val());
                    end.datepicker('setStartView' , $(this).val());
                    end.datepicker('show');
                });

            }
        });

    });


    /**
     * Campaign
     *
     * Permet l'ajout d'un nouveau canal
     *
     */
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
                    //$('.to-focus').last().focus();

                    $( ".datepicker" ).datepicker({
                        language: 'fr',
                        format: 'dd/mm/yyyy',
                        autoclose: true
                    });

                    // Auto open begin datepicker & on select date begin auto open end datepicker and set the min day selectable
                    $('#channel-'+data.new+' .to-focus').datepicker('show').on('changeDate', function(e) {
                        var end = $(this).closest('.from-ajax').find('[data-name="end"]');
                        end.datepicker('setStartDate' , $(this).val());
                        end.datepicker('setStartView' , $(this).val());
                        end.datepicker('show');
                    });

                }
            });
        }

        $(this).val(0).trigger('change.select2');
    });


    /**
     * Dashboard
     */
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

/**
 * Campaign
 */
function updateDateCampaign() {

    var minDate = [];
    var maxDate = [];
    $('#channels-table .datepicker').each(function(){
        var period = $(this).data('name');
        // Date minimale
        if (period == 'begin') {
            if ($(this).val() != '') {
                minDate.push(getTimestamp($(this).val()));
            }
        }
            // Date maximale
        else {
            if ($(this).val() != '') {
                maxDate.push(getTimestamp($(this).val()));
            }
        }
    });

    if (minDate.length > 0) {
        $('#campaign-begin').val(getDate(_.min(minDate), 'y'));
        $('#text-campaign-begin').text(getDate(_.min(minDate), 'Y'));
    }
    else {
        $('#campaign-begin').val('');
        $('#text-campaign-begin').text('');
    }

    if (maxDate.length > 0) {
        $('#campaign-end').val(getDate(_.max(maxDate), 'y'));
        $('#text-campaign-end').text(getDate(_.max(maxDate), 'Y'));
    }
    else {
        $('#campaign-end').val('');
        $('#text-campaign-end').text('');

    }
}


/**
 * Common
 */
function initDatepicker()
{
    $.fn.datepicker.dates['fr'] = {
        days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
        months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
        monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin", "Juil", "Aoû", "Sep", "Oct", "Nov","Déc"],
    };

    $('.datepicker').datepicker({
        language: 'fr',
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    // Auto open begin datepicker & on select date begin auto open end datepicker and set the min day selectable
    $('[data-name="begin"]').on('changeDate', function(e) {
        var end = $(this).closest('tr').find('[data-name="end"]');
        end.datepicker('setStartView' , $(this).val());
        end.datepicker('setStartDate' , $(this).val());
        end.datepicker('show');
    });
}

/**
 * Common
 * @param date
 */
function getTimestamp(date)
{
    var myDate=date.split("/");
    var newDate=myDate[1]+" "+myDate[0]+" "+myDate[2];
    return new Date(newDate).getTime();
}

/**
 * Common
 *
 * @param timestamp
 * @returns {string}
 */
function getDate(timestamp,format)
{
    var date = new Date(timestamp);
    var textDate = ("0" + (date.getDate())).slice(-2)+'/'+("0" + (date.getMonth() + 1)).slice(-2)+'/';
    if (format == 'Y')
        return textDate+date.getFullYear();
    else {
        var year = date.getFullYear().toString().substr(2,2);
        return textDate+year;
    }
}

/**
 * Campaign
 */
function checkDate()
{
    $('#channels-table .datepicker[data-name="begin"]').each(function(){

        var valueBegin  = $(this).val();
        var valueEnd    = $(this).closest('tr').find('[data-name="end"]').val();
        if (valueBegin != '' && valueEnd == '') {

            $(this).closest('tr').find('[data-name="end"]').val(valueBegin);
        }
        else if (valueBegin == '' && valueEnd != '') {
            $(this).val(valueEnd);
        }
    });
}

/**
 * Planning
 * @returns {number[]}
 */
function getChannels()
{
    var channels = [];
    $('.display-event').each(function(){
        var className = $(this).data('class');
        var id = $(this).data('id');
        var state = $(this).prop('checked');
        if (state) {
            channels.push(id);
        }
    });
    return channels;
}

/**
 * Campaign
 */
function addClassOnPublished()
{
    var valueSelected = $('select[name="status"]').val();
    if (valueSelected == 1) {
        $('#status-select').parent().find('span[role="combobox"]').addClass('published');
    }
    else {
        $('#status-select').parent().find('span[role="combobox"]').removeClass('published');
    }
}


/**
 * CMM
 */
function autoSave()
{
    $.ajax({
        url: $('#next-cmm').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            test: 'test',
            date: $('#input-date').val(),
            time  : $('#input-clock').val(),
            where : $('#input-where').val()
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            
        }
    });

}


/**
 * CMM
 **/
function closeCmm() 
{
    $.ajax({
        url: $('#cloture-cmm').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {},
        type: 'GET',
        datatype: 'JSON',
        success: function (resp) {
            document.location.reload(true);
        }
    });
}

/**
 * CMM
 **/
function addCampaignCmm(campaign , value)
{
    $.ajax({
        url: $('#list-campaigns-waiting').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: campaign,
            state: value
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            if (resp.state == 'remove') {
                // remove line
                $('#camp-'+resp.id).remove();
            }
            else {
                // add line
                $('#list-campaigns-cmm tbody').append(resp.html);
            }
        }
    });
}

/**
 * CMM
 **/
function loadPreviousCampaignCmm(date)
{
    $.ajax({
        url: $('#list-validate-campaigns').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            date: date
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#list-validate-campaigns').html(resp.html);
            $('#last-cmm').text(resp.date);
        }
    });
}


/**
 * CMM
 **/
function sendMail() 
{
    $.ajax({
        url: $('#send-mail').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            recipients: $('#recipients').val(),
            guests: $('#guests').val(),
            subject: $('#subject').val(),
            contents: $('#content').summernote('code')
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#loading-mail').hide();
            $('#send-mail').show();
            $('#day-order').modal('toggle');
        },
        error: function () {
            $('#loading-mail').hide();
            $('#send-mail').show();
            alert("Une erreur est survenue, votre mail n'a pas pu être envoyé. Vérifiez le format des adresses emails de vos destinataires.");
        }
    });
}