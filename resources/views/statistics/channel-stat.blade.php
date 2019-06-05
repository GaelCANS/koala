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

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active stats-campaign-tab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Campagnes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  stats-timeline-tab"  id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Timeline</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @include('statistics.campaigns')
            </div>
            <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @include('statistics.gantt')
            </div>
        </div>

    </div>


@endsection