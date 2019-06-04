if ($('#gantt-camp').length > 0) {


    //google.charts.load('current', {'packages':['gantt']});
    google.charts.load('current', {'packages':['timeline'], 'language': 'fr'});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var container = document.getElementById('gantt-camp');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Canal' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });

        var rows = [];
        $('.timeline-channel').each(function () {
            var begin = $(this).data('begin').split('-');
            var end = $(this).data('end').split('-');
            rows.push([$(this).data('channel') , new Date(begin[0], begin[1], begin[2]), new Date(end[0], end[1] , end[2])]);
        });

        var beginTimeline = $('#gantt-camp').data('min') != '' ? $('#gantt-camp').data('min').split('-') : null;
        var endTimeline = $('#gantt-camp').data('max') != '' ? $('#gantt-camp').data('max').split('-') : null;



        var hAxis = {
            format: 'M/d/yy',
            gridlines: {count: 15},
            minValue: new Date(beginTimeline[0], beginTimeline[1], beginTimeline[2]),
            maxValue: new Date(endTimeline[0], endTimeline[1], endTimeline[2]),
            format: 'dd/MM/yyyy'
        };

        var options = {
            height: rows.length*45,
            hAxis: hAxis
        };

        dataTable.addRows(rows);
        chart.draw(dataTable,options);
    }


}