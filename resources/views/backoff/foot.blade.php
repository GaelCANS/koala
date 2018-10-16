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
<script src="{{ url('/js/planning-calendar.js?v=8') }}"></script>
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

</script>




<!-- Custom js for this page-->

<!-- End custom js for this page-->
