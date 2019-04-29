@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>

    @include('statistics.search')

    <div class="row dashboard-stat">

        @foreach($stats as $stat)
            <div class="grid-margin stretch-card">
                <div class="card p-3">
                    <div class="badge badge-outline-dark badge-pill">{{$stat['channel']}}</div><span class="badge badge-pill  badge-outline-info number">{{$stat['campaigns']}}</span>
                    <div class="d-flex align-items-center justify-content-md-center text-center h-100">
                        @foreach($stat['stats'] as $indicator)
                            <div class="indicator-channel">
                                @if(rand(0,1) == 1)
                                    @include('statistics.percent' , array('indicator' => $indicator, 'color' => $stat['color']))
                                @else
                                    @include('statistics.increment' , array('indicator' => $indicator))
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-1">Voir en détail</a>
                </div>
            </div>
        @endforeach
    </div>


@endsection