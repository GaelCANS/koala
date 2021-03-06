<!DOCTYPE html>
<html>

@include('backoff.head')

<body class="">
<div class="container-scroller">

    @include('backoff.header', array('notifications' => \App\Notification::lists(auth()->user())))

    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            @include('backoff.side')

            <div class="content-wrapper">
            @include('flash.flash')

            @yield('content')
            </div>
        </div>

    </div>
    @include('backoff.footer')
</div>



@include('backoff.foot')

</body>
</html>
