<!-- Load JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Load Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Select 2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js" integrity="sha256-FcVIknBiVRk5KLQeIBb9VQdtFRMqwffXyZ+D8q0gQro=" crossorigin="anonymous"></script>
<!-- Lodash -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.core.min.js" integrity="sha256-/WikzFcmjMZS+es0fni22evPN2lgZh8Dk2XXI/ZFtxM=" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.5/lodash.min.js" ></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.min.js"></script>-->

<script src="{{ url('/theme_modules/summernote/dist/summernote-bs4.min.js') }}"></script>


<!-- Chargement des JS -->
<script src="{{ url('/js/backoff-app.js?v='.time() ) }}"></script>
<script src="{{ url('/js/laravel.js?v=1' ) }}"></script>



<!-- plugins:js -->
<!--<script src="{{ url('/theme_modules/jquery/dist/jquery.min.js') }}"></script>-->
<script src="{{ url('/theme_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ url('/theme_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/theme_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- endinject -->

<!-- Calendar -->
<script src="{{ url('/theme_modules/moment/moment.js') }}"></script>
<script src="{{ url('/theme_modules/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ url('/theme_modules/fullcalendar/dist/fr.js') }}"></script>
<script src="{{ url('/js/planning-calendar.js?v=9') }}"></script>
<!-- End Calendar -->

<!-- Plugin js for this page-->
<script src="{{ url('/theme_modules/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ url('/theme_modules/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ url('/theme_modules/raphael/raphael.min.js') }}"></script>
<script src="{{ url('/theme_modules/morris.js/morris.min.js') }}"></script>
<script src="{{ url('/theme_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('/theme_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/theme_modules/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
<script src="{{ url('/theme_modules/icheck/icheck.min.js') }}"></script>
<script src="{{ url('/theme_modules/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!--<script src="{{ url('/theme_modules/jquery-file-upload/js/jquery.uploadfile.min.js?v='.time() ) }}"></script>-->
<script src="{{ url('/theme_modules/jquery-file-upload/js/file-upload.js?v='.time() ) }}"></script>


<script src="{{ url('/js/html2canvas.js') }}"></script>


<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ url('/js/off-canvas.js') }}"></script>
<script src="{{ url('/js/hoverable-collapse.js') }}"></script>
<script src="{{ url('/js/misc.js') }}"></script>
<script src="{{ url('/js/settings.js') }}"></script>
<script src="{{ url('/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('/js/dashboard.js') }}"></script>
<script src="{{ url('/js/iCheck.js') }}?v={{ time() }}"></script>
<script src="{{ url('/js/tooltips.js') }}"></script>
<script src="{{ url('js/owl-carousel.js') }}"></script>


<script src="{{ url('/js/raphael-2.1.4.min.js') }}"></script>
<script src="{{ url('/js/justgage.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',

        data: {
            labels: [
                '2018-09',
                '2018-10',
                '2018-11',
                '2018-12',
                '2019-01',
                '2019-02',
                '2019-03',
                '2019-04'
            ],

            datasets: [{

                label: 'Ouvreurs',
                fill: false,
                data: [32, 38, 29, 35, 38, 39, 27, 43],
                backgroundColor: 'rgb(255, 105, 180)',
                borderColor: 'rgb(255, 105, 180)'
            }, {

                label: 'Cliqueurs',
                fill: false,
                data: [32, 18, 19, 15, 18, 39, 17, 13],
                backgroundColor: '#8b476a',
                borderColor: '#8b476a'

            }, {
                label: 'Désabonnés',
                fill: false,
                data: [0, 1, 2, 1, 3,4, 6, 1],
                backgroundColor: 'rgb(171, 140, 228)',
                borderColor: 'rgb(171, 140, 228)'
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:true,
            aspectRatio:2,
            legend: {
                position:'top',
                labels: {
                    fontSize: 12,
                    padding:30
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false

            },
            scales: {
                xAxes: [{
                    display: true

                }],
                yAxes: [{
                    display: true

                }]
            }
        }
    });


    var ctx = document.getElementById('myChart1').getContext('2d');

    var myChart1 = new Chart(ctx, {
        type: 'line',

        data: {
            labels: [
                '2018-09',
                '2018-10',
                '2018-11',
                '2018-12',
                '2019-01',
                '2019-02',
                '2019-03',
                '2019-04'
            ],

            datasets: [{

                label: 'Clics',
                fill: false,
                data: [132, 338, 229, 135, 338, 239, 427, 143],
                backgroundColor: '#fb9678',
                borderColor: '#fb9678'
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:true,
            aspectRatio:2,
            legend: {
                position:'top',
                labels: {
                    fontSize: 12,
                    padding:30
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false

            },
            scales: {
                xAxes: [{
                    display: true

                }],
                yAxes: [{
                    display: true

                }]
            }
        }
    });



    var ctx = document.getElementById('myChart2').getContext('2d');

    var myChart2 = new Chart(ctx, {
        type: 'line',

        data: {
            labels: [
                '2018-09',
                '2018-10',
                '2018-11',
                '2018-12',
                '2019-01',
                '2019-02',
                '2019-03',
                '2019-04'
            ],

            datasets: [{

                label: 'Engagements',
                fill: false,
                data: [12, 38, 29, 35, 38, 39, 27, 43],
                backgroundColor: '#f75757',
                borderColor: '#f75757'
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:true,
            aspectRatio:2,
            legend: {
                position:'top',
                labels: {
                    fontSize: 12,
                    padding:30
                }
            },
            tooltips: {
                mode: 'index',
                intersect: false,

            },
            scales: {
                xAxes: [{
                    display: true,

                }],
                yAxes: [{
                    display: true,

                }]
            }
        }
    });

</script>

<script>




    $(".js-example-placeholder-multiple").select2({
        placeholder: "+ Ajouter"
    });
    $(".js-example-placeholder-single").select2({
        placeholder: "+ Ajouter"
    });










    $(".js-example-placeholder-multiple").on('select2:select' , function () {
            $(".select2-search__field").attr('placeholder' , "+ Ajouter");
            $(".select2-search__field").data('placeholder' , "+ Ajouter");
    });

    $(document).ready(function(){
        $(".owl-carousel").owlCarousel();
    });


    $('.clockpicker').clockpicker();

    var input = $('#input-clock');
    input.clockpicker({
        autoclose: true
    });

    var dflt = {
        min: 0,
        max: 100,
        donut: true,
        gaugeWidthScale: 0.6,
        valueFontSize: 12,
        maxFontSize:12,
        titleMinFontSize: 20,

        counter: true,
        symbol: '%',
        hideInnerShadow: true

    }

    $('.gauge').each(function(){
        switch ($(this).data('color')) {
            case 'canauxdigitaux':
                var color = '#00c292';
                break;
            case 'crm':
                var color = '#ab8ce4';
                break;
            case 'communication':
                var color = '#03a9f3';
                break;
            case 'animation':
                var color = '#ffb463';
                break;
            default:
                var color = 'hotpink';
                break;

        }
        var id = $(this).attr('id');

        new JustGage({
            id: id,
            defaults: dflt,
            levelColors: [color]
        });
    });





    function graphPercentInit()
    {
        if ($('.percent-graph').length > 0 ) {
            drawGraph('.percent-graph', document.getElementById('chart-percent').getContext('2d'))
        }

        if ($('.numeric-graph').length > 0) {
            $('.numeric-graph').each(function () {
                var ctx = document.getElementById( 'chart-'+$(this).data('id') ).getContext('2d');
                drawGraph('#'+$('.numeric-graph').attr('id'), ctx)
            })
        }
    }

    function drawGraph(selector, ctx)
    {
        new Chart(ctx, {
            type: 'line',

            data: {
                labels: graphPeriods(selector),

                datasets: graphDatas(selector)
            },
            options: {
                responsive:true,
                maintainAspectRatio:true,
                aspectRatio:2,
                legend: {
                    position:'top',
                    labels: {
                        fontSize: 12,
                        padding:30
                    }
                },
                tooltips: {
                    mode: 'index',
                    intersect: false

                },
                scales: {
                    xAxes: [{
                        display: true

                    }],
                    yAxes: [{
                        display: true

                    }]
                }
            }
        });
    }

    function graphPeriods(selector)
    {
        var dates = [];
        $(selector).first().find('span').each(function () {
            dates.push($(this).data('period'));
        })
        return dates;
    }


    function graphDatas(selector)
    {
        var colors = ['#00c292','#ab8ce4','#03a9f3','#ffb463'];
        var i = 0;
        var datasets = [];
        $(selector).each(function () {
            var tmp = [];
            $(this).find('span').each(function () {
                tmp.push($(this).text());
            });
            datasets.push(
                {
                    label: $(this).data('name'),
                    fill: false,
                    data: tmp,
                    backgroundColor: colors[i],
                    borderColor: colors[i]
                }
            );
            i++;
        });
        $(selector).remove();
        return datasets;
    }

    graphPercentInit();

</script>




<!-- Custom js for this page-->

<!-- End custom js for this page-->
