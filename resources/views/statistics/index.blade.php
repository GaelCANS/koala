@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>

    @include('statistics.search')

    <div class="row dashboard-stat">

        @foreach($stats as $stat)
            <div class="grid-margin stretch-card">
                <div class="card p-3">
                    <div class="badge badge-outline-dark badge-pill">{{$stat['channel']->name}}</div><span class="badge badge-pill  badge-outline-info number">{{$stat['campaigns']}}</span>
                    <div class="d-flex align-items-center justify-content-md-center text-center h-100">
                        @foreach($stat['stats'] as $indicator)
                            <div class="indicator-channel">
                                @if($indicator['type'] == 'percent')
                                    @include('statistics.percent' , array('indicator' => $indicator, 'channel' => $stat['channel']))
                                @else
                                    @include('statistics.increment' , array('indicator' => $indicator, 'channel' => $stat['channel']))
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a href="{{route('channel-stat' , array('id' => $stat['channel']->id))}}" class="btn btn-light btn-xs mt-1">Voir en détail</a>
                </div>
            </div>
        @endforeach
    </div>


@endsection