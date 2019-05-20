@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques emailing</h4>

    <div id="stat-content">
        @include('statistics.search')

        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="{{route('statistic-index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
                </div>
            </div>
        </div>

        @include('statistics.side')

        @include('statistics.campaigns')
    </div>


@endsection