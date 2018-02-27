@extends('backoff.app')

@section('content')
    <h5 class="page-title">Tableau de bord</h5>
    <div class="row">
        <div class="col-md-9 grid-margin stretch-card ajax-action" id="block-campaigns">
            @include('dashboards.campaigns')
        </div>
        @include('dashboards.statistics')
    </div>
    <div class="row">
        @include('dashboards.mycampaigns')
        @include('dashboards.results')
    </div>

@endsection