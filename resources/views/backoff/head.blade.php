<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>CMM</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{!!  csrf_token()  !!}" />
    <meta name="url-app" content="{!! $app->make('url')->to('/') !!}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- App -->
    <link href="{{ asset('/css/backoff-app.css') }}?v={{ time() }}" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/theme_modules/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}" />
    <!-- endinject -->

    <!-- Calendar -->
    <link rel="stylesheet" href="{{ asset('/theme_modules/fullcalendar/dist/fullcalendar.min.css') }}" />
    <!-- End Calendar -->

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/theme_modules/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/clockpicker/dist/jquery-clockpicker.min.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/icheck/skins/line/_all.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/owl-carousel-2/assets/owl.carousel.min.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/owl-carousel-2/assets/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/theme_modules/jquery-file-upload/css/uploadfile.css') }}?v={{ time() }}" />


    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>