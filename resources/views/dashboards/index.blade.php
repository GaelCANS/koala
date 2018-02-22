@extends('backoff.app')

@section('content')
    <h5 class="page-title">Tableau de bord</h5>
    <div class="row">
        @include('dashboards.campaigns')
        @include('dashboards.statistics')
    </div>
    <div class="row">
        @include('dashboards.mycampaigns')
        @include('dashboards.results')
    </div>

@endsection