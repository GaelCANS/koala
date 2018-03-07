(function($) {
    'use strict';

    /*$('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        defaultDate: $('#container-calendar').data('day'),
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: $('#container-calendar').data('link'),
        eventAfterRender: function( event, element, view ) {
            console.log(event);
        }
    });*/

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
            console.log(event);
        }
    });

})(jQuery);
