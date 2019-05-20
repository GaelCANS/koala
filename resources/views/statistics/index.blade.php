@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>

    @include('statistics.search')

    <div class="row dashboard-stat" id="stat-content">
        @include('statistics.index-datas' , array('stats'=>$stats))
    </div>


@endsection