@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none">Tableau de bord</h4>
    <div class="row">
        <div class="col-lg-9 col-xs-12 grid-margin stretch-card ajax-action" id="block-campaigns">
            @include('dashboards.campaigns')
        </div>
        @include('dashboards.statistics')
   
        @include('dashboards.mycampaigns')
        @include('dashboards.results')
    </div>

@endsection