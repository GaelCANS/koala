<!DOCTYPE html>
<html>

@include('backoff.head')

<body>
<div class="container-scroller">

    @include('backoff.header')

    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            @include('backoff.side')

            <div class="content-wrapper">
            @include('flash.flash')

            @yield('content')
            </div>
        </div>
        @include('backoff.footer')
    </div>

</div>



@include('backoff.foot')

</body>
</html>
