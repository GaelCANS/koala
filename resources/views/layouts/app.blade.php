<!DOCTYPE html>
<html lang="fr">

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
    <!-- App -->
    <link href="{{ asset('/css/backoff-app.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/theme_modules/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- plugins:css -->

    <!-- endinject -->



    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/theme_modules/font-awesome/css/font-awesome.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('/theme_modules/icheck/skins/line/_all.css') }}?v={{ time() }}" />

</head>
<body id="app-layout">
    @yield('content')
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
// Initiate gifLoop for set interval
            var refresh;
// Duration count in seconds
            const duration = 1000 * 10;
// Giphy API defaults
            const giphy = {
                baseURL: "https://api.giphy.com/v1/gifs/",
                key: "dc6zaTOxFJmzC",
                tag: "fail",
                type: "random",
                rating: "pg-13"
            };
// Target gif-wrap container
            const $gif_wrap = $("#gif-wrap");
// Giphy API URL
            let giphyURL = encodeURI(
                    giphy.baseURL +
                    giphy.type +
                    "?api_key=" +
                    giphy.key +
                    "&tag=" +
                    giphy.tag +
                    "&rating=" +
                    giphy.rating
            );

// Call Giphy API and render data
            var newGif = () => $.getJSON(giphyURL, json => renderGif(json.data));

// Display Gif in gif wrap container
            var renderGif = _giphy => {
// Set gif as bg image
                $gif_wrap.css({
                    "background-image": 'url("' + _giphy.image_original_url + '")'
                });

// Start duration countdown
                refreshRate();
            };

// Call for new gif after duration
            var refreshRate = () => {
// Reset set intervals
                clearInterval(refresh);
                refresh = setInterval(function() {
// Call Giphy API for new gif
                    newGif();
                }, duration);
            };

// Call Giphy API for new gif
            newGif();
        });
    </script>



    <!-- plugins:js -->

    <script src="{{ url('/theme_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!-- endinject -->



    <!-- Plugin js for this page-->

    <script src="{{ url('/theme_modules/icheck/icheck.min.js') }}"></script>




    <!-- End plugin js for this page-->
    <!-- inject:js -->

    <script src="{{ url('/js/misc.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('/js/iCheck.js') }}?v={{ time() }}"></script>

</body>
</html>
