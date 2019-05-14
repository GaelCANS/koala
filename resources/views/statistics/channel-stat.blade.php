@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques emailing</h4>

    @include('statistics.search')

    @include('statistics.side')

    @include('statistics.campaigns')


@endsection