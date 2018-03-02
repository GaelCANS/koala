@extends('backoff.app')

@section('content')
    <h4 class="page-title d-inline-block mr-2">Campagnes</h4>
    <button type="button" class="btn btn-secondary btn-xs mb-1" data-href="{{ route('new-campaign') }}" title="Ajouter une campagne">+ Ajouter</button>

    @include('campaigns.search')


    <div class="row">
        <div class="col-md-12">
            <nav class="float-right">
                <ul class="pagination">
                    <!--<li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>-->
                    {!! str_replace( '/?' , '?' , $campaigns->appends(\Illuminate\Support\Facades\Input::except('page'))->render() ) !!}
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Marchés</th>
                                        <th>Noms</th>
                                        <th>Périodes</th>
                                        <th>Canaux</th>
                                        <th>Resp. campagne</th>
                                        <th>Résultats</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($campaigns as $campaign)
                                    <tr>
                                        <td class="marches">
                                            @forelse($campaign->Markets as $market)
                                                <div class="badge {{ $market->class_css }}">{{ $market->abbreviation }}</div>
                                            @empty
                                            @endforelse

                                        </td>
                                        <td class="text-left">{{ $campaign->name }}</td>
                                        <td>{{ $campaign->period }}</td>
                                        <td>
                                            @if($campaign->countChannel<=5)
                                                @forelse($campaign->channelsDistinct as $channel)
                                                    <div class="badge badge-outline-primary badge-pill">{{ $channel->Channel->name }}</div>
                                                @empty
                                                @endforelse
                                            @else
                                                <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($campaign->User)
                                                {{ $campaign->User->firstnameInitial }}
                                            @endif
                                        </td>
                                        <td class="results">
                                            <label class="badge @if($campaign->results_state == 'ajoutés')badge-success @elseif($campaign->results_state == 'partiels')badge-warning @else badge-danger @endif">{{$campaign->results_state}}</label>
                                        </td>
                                        <td>
                                            <div class="btn-group ajax-action" role="group" aria-label="Basic example">
                                                <a href="{{action('CampaignController@show' , $campaign)}}"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button></a>
                                                <a data-msg="Voulez-vous vraiment dupliquer cette campagne ?" href="javascript:;" data-href="{{route('duplicate-campaign' , array('id' => $campaign->id ))}}"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button></a>
                                                <a href="{{action('CampaignController@destroy' , $campaign)}}" title="Supprimer la campagne" data-confirm="Voulez-vous vraiment supprimer cette campagne ?" data-method="delete"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Aucune campagne</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="float-right">
                <ul class="pagination">
                    {!! str_replace( '/?' , '?' , $campaigns->appends(\Illuminate\Support\Facades\Input::except('page'))->render() ) !!}
                </ul>
            </nav>
        </div>
    </div>


@endsection

