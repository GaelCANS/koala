$(document).ready(function(){

        /**
         * Component - formbox
         */
        $(".buttom-btn").click(function(){
            $(".top-btn").addClass('top-btn-show');
            $(".contact-form-page").addClass('show-profile');
            $(this).addClass('buttom-btn-hide')
        });

        $(".top-btn").click(function(){
            $(".buttom-btn").removeClass('buttom-btn-hide');
            $(".contact-form-page").removeClass('show-profile');
        });

        $('#help-form').on('submit' , function (event) {

            doCapture(sendRequestFormbox);

            event.preventDefault();
        });
        /*$('#help-form').on('submit' , function (event) {

            $('#send-formbox').hide();
            $('#loading-formbox').show();

            html2canvas(document.body).then(function(canvas) {
                // Export the canvas to its data URI representation
                var base64image = canvas.toDataURL("image/png");
                $('#capture-help').val(base64image);

                // Open the image in a new window
                $('.profile-image').html('<img src="'+base64image+'"/>');

            });

            var link = $('#help-form').data('link');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    method: "POST",
                    url: link,
                    data: {
                        message : $('#message-help').val(),
                        capture : $('#capture-help').val(),
                        url : $('#url-help').val()
                    }
                })
                .done(function( data ) {

                    $('#message-help').val('');
                    //$('#capture-help').val('');
                    $('#send-formbox').show();
                    $('#loading-formbox').hide();
                    $('.contact-form-page .top-btn-show').trigger('click');
                });
            
            event.preventDefault();
        });*/



        /**
         * Component - formbox
         */
        $(document).keyup(function(e) {
            if (e.keyCode == 27) { // esc keycode
                if ($('.contact-form-page.show-profile').length > 0 ) {
                    $('.contact-form-page .top-btn-show').trigger('click');
                }
            }
        });


        /**
         * Component - formbox
         */
        $('#capture').on('click' , function () {
            /*html2canvas(document.body).then(function(canvas) {
                document.body.appendChild(canvas);
            });*/
            html2canvas(document.body).then(function(canvas) {
                // Export the canvas to its data URI representation
                var base64image = canvas.toDataURL("image/png");
                console.log(base64image);

                // Open the image in a new window
                $('.profile-image').html('<img src="'+base64image+'"/>');

            });
        });



    /**
         * Commun
         * Simulation d'un clic sur le dropdown du menu pour éviter de devoir double cliquer (astuce de sioux)
         */
        $('#notificationDropdown').trigger('click');


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
     * Commun
     */
    $('.js-link').on('click',function () {
        window.location.href = $(this).data('href');
    });


    /**
     * Notifications
     */
    $('.todo-notification .detail-notification').on('click', function () {
        doneNotify($(this).parent());
    });


    /**
         * Campaign
         */
        $('#channels-table').on('change' , '.datepicker' , function(){
            updateDateCampaign();
        });


        /**
         * Campaign
         */
        if ($('#name-campaign').length > 0) {
            changeTitleZone();
            $('#name-campaign').on('change' , function () {
                changeTitleZone();
            });
        }

        /**
         * Campaign
         */
        if ( $('.time-limit').length > 0 ) {
            $('.time-limit').each(function () {
                if ($(this).data('delay') > 0 ) {
                    calculateDatelimit($(this));
                }
            });
        }
        //$('.datepicker[data-name="begin"]').on('change',function () {
        $('#channels-table').on('change', '.datepicker[data-name="begin"]' , function () {
           var timeLimit = $(this).parents('tr').find('.time-limit');
            if (timeLimit.data('delay') > 0) {
                calculateDatelimit(timeLimit);
            }
        });

        /**
         * Commun
         *
         * Change zone title
         */
        if ($('.page-title').length > 0 ) {
            $('#zone-title').text($('.page-title').text());
        }

        /**
         * Planning
         */
        $('.icheck-line input').on('ifToggled', function(event){
            $('#calendar').fullCalendar( 'refetchEvents' );
        });


        /**
         * Planning
         */
        if ($('#container-calendar').length > 0) {
            $('.fc-basicWeek-button').trigger('click');
        }

        /**
         * Planning
         */
        $('.service-canaux').on('click', function(event){
            if ($(this).data('service') != 'all') {
                var checkBoxes = $('.' + $(this).data('service')).find('.display-event');
            }
            else {
                var state = $(this).data('show');
                $(this).data('show' , !$(this).data('show'));
                $('.real-service').data('show' , state);
                //var checkBoxes = $('.icheck-line').find('.display-event');
                $('.real-service').trigger('click');
                return ;
            }
            var state = $(this).data('show');
            $(this).data('show' , !$(this).data('show'));
            if (!state) {
                $(this).css('text-decoration','none');
            }
            else {
                $(this).css('text-decoration','line-through');
            }

            checkBoxes.each(function () {
                $(this).attr('checked' , !state);
                var item = $(this).parents('.icheck-line').find('div:first-child');
                if (!state == '1') {
                    item.addClass('checked');
                }
                else {
                    item.removeClass('checked');
                }
            });

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
         * Campaign
         */
        $('.open-modal').on('click',function(){
            var src = $(this).attr('src');
            $('#del-image').data('src' , urlImage(src));
            $('#show-img .modal-body').html("<img src='"+src+"' class='img-fluid' />");
            $('#show-img').modal();
        });


        /**
         * Campaign
         */
        $('.del-image').on('click',function(){
            if (confirm("Voulez-vous supprimer ce visuel ?")) {
                var src = $('#del-image').data('src');
                var id = $('#del-image').data('id');
                var indexToRemove = $('#carousel-image .owl-item:not(.cloned) .item[data-item="'+src+'"]').data('count');
                delImage(src, id);
                $('#carousel-image').trigger('remove.owl.carousel', [indexToRemove]).trigger('refresh.owl.carousel');
                countItemOwl();
                $('#show-img').modal('toggle');
            }
        });


        /**
         * Campaign
         */
        if ($('#carousel-image').length > 0) {
            countItemOwl();
        }

        /**
         * Campaign
         */

        $("#campaign-upload").uploadFile({
            url: "./../campaign-upload",
            fileName: "myfile",
            multiple:true,
            dragDrop:true,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            formData: {campaign:$('#campaign-upload').data('id')}
        });

        /**
        * Lexique - liste déroulante
         */
        // Changement de pays
        $('#lst-lexique').on('change', function(e) {
            //var channel_id = e.target.value;
           // alert("a");
           // alert(e.target.value);
             //alert(e.data-url));
           // alert( $(this).find('option:selected').data('url') );
            detailCanal($(this).find('option:selected').data('url'));
            //cityUpdate(country_id);
        });

        /**
         *  Channel - add indicator
         */
        $('#btn-add-indicator').on('click',function () {
            addIndicator();
        });

        /**
         *  Channel - delete indicator
         */
        $('#liste-indicators').on('click','.indicator-del',function () {
            if (confirm("Voulez-vous supprimer cet indicateur")) {
                if ($(this).data('id')!="") {
                    delIndicator($(this).data('id'), $(this).data('url'));
                }
                else {
                    delNewIndicator($(this));

                    // $(this).parents('.add-indic').remove();



                }
            }
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
         * CMM
         */
        $('#send-annulation').on('click' , function () {
            $('#loading-mail').show();
            $('#send-annulation').hide();
            sendAnnulation();
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
         * Calcule de l'engagement sur les indicateurs de Facebook
         */
        $( '#channels-table').on('change', 'input[data-specific="portee"],input[data-specific="interaction"]' , function () {
            $('input[data-specific="engagement"][data-cci="'+$(this).data('cci')+'"]').val(engagement($(this).data('cci')));
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
                            autoclose: true,
                            weekStart:1,
                            daysOfWeekHighlighted: '0,6'
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
                                autoclose: true,
                                weekStart:1,
                                daysOfWeekHighlighted: '0,6'
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
        autoclose: true,
        weekStart:1,
        daysOfWeekHighlighted: '0,6'
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


/**
 * CMM
 **/
function sendAnnulation()
{
    $.ajax({
        url: $('#send-annulation').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            recipients: $('#recipients-annulation').val(),
            guests: $('#guests-annulation').val(),
            subject: $('#subject-annulation').val(),
            contents: $('#content-annulation').summernote('code')
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
            $('#annulation-loading-mail').hide();
            $('#send-annulation').show();
            $('#annulation-cmm').modal('toggle');
        },
        error: function () {
            $('#annulation-loading-mail').hide();
            $('#send-annulation').show();
            alert("Une erreur est survenue, votre mail n'a pas pu être envoyé. Vérifiez le format des adresses emails de vos destinataires.");
        }
    });
}

/**
 * Campaign
 * @param path
 * @returns {T}
 */
function urlImage(str)
{
    var pieces = _.split(str , '/');
    var maxIndex = _.lastIndexOf(pieces);
    return pieces[maxIndex-2];
}


/**
 * Campaign
 */
function countItemOwl()
{
    var i = 0;
    $('#carousel-image .owl-item:not(.cloned) .item').each(function(){
        //console.log($(this).data('item') , i);
        $(this).data('count',i);
        i++;
    });
}

/**
 * Campaign
 */
function delImage(img , id)
{
    $.ajax({
        url: $('#carousel-image').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            img: img,
            id: id
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (resp) {
        }
    });
}


/**
 * Campaign
 */
function changeTitleZone()
{
    $('#zone-title').text($('#name-campaign').val());
}

/**
 * Channel - addIndicator
 */
function addIndicator()
{
    var _html = $('#template-add-new-indicator').html();
    var _html1 = _html.replace(/REPLACEID/g,Math.floor(Math.random() * 1000) + 1); // mettre un valeur random a la place de 22
    $("#liste-indicators").append(_html1);
}

/**
 * Channel - delNewIndicator
 */
function delNewIndicator(truc){
   truc.parents('.add-indic').fadeOut(500 , function () {
        truc.remove();
    });
}


/**
 * Channel - delIndicator existant
 */
function delIndicator(id,url)
{

    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            id: id
        },
        type: 'DELETE',
        datatype: 'JSON',
        success: function (response) {
            //$('#root-indicator-'+response.id).remove();
            $('#root-indicator-'+response.id).fadeOut(500 , function () {
                $(this).remove();
            });
        },
        error: function () {
            alert("Une erreur est survenue.");
        }
    });
}

/**
 * Lexique - description-lexique
 * donne le détail d'un canal pour le glossaire/lexique
 */
function detailCanal(url)
{
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'GET',
        datatype: 'JSON',
        success: function (response) {
            $('#detail-channel').html(response.html);
            $('#image-channel').attr('src', response.image);
        },
        error: function () {
            alert("Une erreur est survenue.");
        }
    });
}


/**
 * Campaign - calculateDatelimit
 */
function calculateDatelimit(obj)
{
    var delay = obj.data('delay');
    var begin = obj.parents('tr').find('.datepicker[data-name="begin"]').val();
    console.log(begin);
    if (begin == "") return false;
    var splitBegin = begin.split('/');
    var d = new Date(splitBegin[2] , splitBegin[1]-1 , splitBegin[0] , 0 , 0 , 0 , 0);
    d.setDate(d.getDate() - delay);

    var dd = _.padStart(d.getDate(), 2 , '0');
    var mm = _.padStart((d.getMonth()+1), 2 , '0');
    console.log(dd+'/'+mm+'/'+d.getFullYear());
    obj.find('.date-limit').html(dd+'/'+mm+'/'+d.getFullYear());
    obj.show();

}



/**
 * Component - formbox
 */
function doCapture(callback) {

    callback();
    /*
    $('.contact-form-page .top-btn-show').trigger('click');
    html2canvas(document.body).then(function(canvas) {
        var base64image = canvas.toDataURL("image/png");
        $('#capture-help').val(base64image);
        callback();
    });
    */

}

/**
 * Component - formbox
 */
function sendRequestFormbox(){

    $('#send-formbox').hide();
    $('#loading-formbox').show();



    var link = $('#help-form').data('link');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            method: "POST",
            url: link,
            data: {
                message : $('#message-help').val(),
                //capture : $('#capture-help').val(),
                url : $('#url-help').val()
            }
        })
        .done(function( data ) {

            $('#message-help').val('');
            //$('#capture-help').val('');
            $('#send-formbox').show();
            $('#loading-formbox').hide();
            $('.contact-form-page .top-btn-show').trigger('click');
        });
}


/**
 * Campaign - indicator engagement facebook
 */
function engagement(id) {
    if ($('input[data-specific="portee"][data-cci="'+id+'"]').length > 0 && $('input[data-specific="interaction"][data-cci="'+id+'"]').length > 0 && $('input[data-specific="engagement"][data-cci="'+id+'"]').length > 0) {
        var portee = $('input[data-specific="portee"][data-cci="'+id+'"]').val();
        var interaction = $('input[data-specific="interaction"][data-cci="'+id+'"]').val();
        var engagement = "";
        if (portee > 0 && interaction > 0) {
            engagement = (interaction*100)/portee
            engagement = Math.round(engagement*100)/100;
        }
        return engagement;
    }
}


/**
 * Notification
 * @param obj
 */
function doneNotify(obj)
{
    $.ajax({
        url: $('#notifications-list').data('link'),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            notification: obj.data('id')
        },
        type: 'POST',
        datatype: 'JSON',
        success: function (data) {
            data = $.parseJSON(data);
            $('.todo-notification[data-id="'+data.id+'"]').css({'text-decoration':(data.done ? 'line-through' : 'none')});
            $('#count-service').text(data.count_service);
        }
    });
}
