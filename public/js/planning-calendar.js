(function($) {
    'use strict';
     /*$(function() {
        if ($('#calendar').length) {
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
                //events: {}
                events: {
                    url: $('#container-calendar').data('link'),
                    success: function(data){

                        callback(data);
                        alert("data = "+JSON.stringify(data));
                        var title = 'Availability';
                        var eventData;

                        for(var j=0;j<data.length;j++)
                        {
                            // $('#calendar').fullCalendar( 'removeEvent', data[j]._id);
                            var startDate = data[j].date;
                            if (title) {
                                eventData = {

                                    title: title,
                                    start: startDate

                                };
                                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                            }
                            $('#calendar').fullCalendar('unselect');
                        }
                        var events = [];
                        $(doc).find('event').each(function() {
                            events.push({
                                title: $(this).attr('title'),
                                start: $(this).attr('start') // will be parsed
                            });
                        });
                        callback(events);
                    }
                }

            })
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
        events: $('#container-calendar').data('link'),
        eventAfterRender: function( event, element, view ) {
            console.log(event);
        }
        /*events: [{
            title: 'Long Event',
            start: '2018-03-02',
            end: '2018-03-04'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2018-03-09T16:00:00'
        },
        {
            title: 'Conference',
            start: '2018-03-11',
            end: '2018-03-13'
        }]*/
    });

})(jQuery);
