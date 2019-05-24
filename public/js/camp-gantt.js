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

        var options = {
            height: rows.length*45,
            // hAxis: {
            //    format: 'dd.MM.yyyy HH:MM'
            // },
            hAxis: {
                format: 'M/d/yy',
                gridlines: {count: 15}
            }

        };

        dataTable.addRows(rows);
        chart.draw(dataTable);
    }

}