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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',


        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Ouvreurs',
                backgroundColor: [
                    'hotpink'
                ],
                borderColor: [
                    'hotpink'

                ],
                data: [12, 19, 3, 5, 2, 3, 12, 20, 43, 32],
                fill: false,
            }, {
                label: 'Cliqueurs',
                fill: false,
                backgroundColor: [
                    '#d94a92'
                ],
                borderColor: [
                    '#d94a92'
                ],
                data: [12, 29, 33, 35, 12, 33, 2, 10, 43, 32],

            }]
        },


        options: {
            responsive: true,
            title: {
                display: true,
                text: 'emailing'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: false,
                        labelString: '%'
                    }
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

    var gg1 = new JustGage({
        id: 'gg1',
        defaults: dflt,
        levelColors: ['hotpink']
    });

    var gg2 = new JustGage({
        id: 'gg2',
        defaults: dflt,
        levelColors: ['hotpink']
    });
    var gg3 = new JustGage({
        id: 'gg3',
        defaults: dflt,
        levelColors: ['#ab8ce4']
    });

    var gg4 = new JustGage({
        id: 'gg4',
        defaults: dflt,
        levelColors: ['#ab8ce4']
    });

    var gg5 = new JustGage({
        id: 'gg5',
        defaults: dflt,
        levelColors: ['#3c589b']
    });

    var gg6 = new JustGage({
        id: 'gg6',
        defaults: dflt,
        levelColors: ['#00aced']
    });

    var gg7 = new JustGage({
        id: 'gg7',
        defaults: dflt,
        levelColors: ['#0077B5']
    });

    var gg8 = new JustGage({
        id: 'gg8',
        defaults: dflt,
        levelColors: ['hotpink']
    });

    var gg9 = new JustGage({
        id: 'gg9',
        defaults: dflt,
        levelColors: ['hotpink']
    });





</script>




<!-- Custom js for this page-->

<!-- End custom js for this page-->
