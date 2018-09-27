(function($) {
    'use strict';


    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        defaultDate: $('#container-calendar').data('day'),
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: $('#container-calendar').data('link'),
                data: {
                    // our hypothetical feed requires UNIX timestamps
                    start: start._d.getFullYear()+'-'+((start._d.getMonth()+1) < 10 ? '0'+parseInt(start._d.getMonth()+1) : start._d.getMonth()+1)+'-'+(start._d.getDate() < 10 ? '0'+start._d.getDate() : start._d.getDate()),
                    end: end._d.getFullYear()+'-'+((end._d.getMonth()+1) < 10 ? '0'+parseInt(end._d.getMonth()+1) : end._d.getMonth()+1)+'-'+(end._d.getDate() < 10 ? '0'+end._d.getDate() : end._d.getDate()),
                    channels: getChannels()
                },
                success: function(doc) {
                    callback(doc);
                }
            });
        },
        eventAfterRender: function( event, element, view ) {
            //console.log(event);
        },
        eventDrop: function(event, delta, revertFunc) {
            changeEvent(event);
        },
        eventResize: function(event, delta, revertFunc) {
            changeEvent(event);
        }
    });

})(jQuery);


function changeEvent(event) {
    var debut = event.start.format();
    if (event.end != null) {
        var fin = event.end.format();
        var splitFin = fin.split('-');
        var tmpFin = new Date(splitFin[0],splitFin[1],splitFin[2]);
        tmpFin.setDate(tmpFin.getDate()-1);
        var tmpMonth = tmpFin.getMonth() < 10 ? '0'+tmpFin.getMonth() : tmpFin.getMonth();
        var tmpDay = tmpFin.getDate() < 10 ? '0'+tmpFin.getDate() : tmpFin.getDate();
        fin = tmpFin.getFullYear()+'-'+tmpMonth+'-'+tmpDay;
    }
    else {
        var fin = debut;
    }
    var id = event.id;

    var link = $('#calendar').data('link');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            method: "POST",
            url: link,
            data: {
                begin: debut,
                end: fin,
                id: id
            }
        })
        .done(function( data ) {

        });
}
