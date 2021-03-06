@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none mr-2">Campagnes</h4>
    <!--<a href="{{ route('new-campaign') }}"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Ajouter une campagne">+ Ajouter</button></a>-->

    @include('campaigns.search')


    <div class="row">
        <div class="col-md-12">
            <nav class="float-right">
                <ul id="tab" class="pagination">
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
                                <table class="table table-hover ajax-action">
                                    <thead>
                                    <tr>
                                        <th>Marchés</th>
                                        <th>Noms</th>
                                        <th>Périodes</th>
                                        <th>Canaux</th>
                                        <th>Resp.</th>
                                        <th>Résultats</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($campaigns as $campaign)
                                    <tr>
                                        <td class="marches" data-href="{{action('CampaignController@show' , $campaign)}}">
                                            @forelse($campaign->Markets as $market)
                                                <div class="badge {{ $market->class_css }}">{{ $market->abbreviation }}</div>
                                            @empty
                                            @endforelse

                                        </td>
                                        <td class="text-left" data-href="{{action('CampaignController@show' , $campaign)}}">{{ $campaign->name }}</td>
                                        <td data-href="{{action('CampaignController@show' , $campaign)}}">{{ $campaign->period }}</td>
                                        <td data-href="{{action('CampaignController@show' , $campaign)}}">
                                            @if($campaign->countChannel<=5)
                                                @forelse($campaign->channelsDistinct as $channel)
                                                    <div class="badge badge-outline-primary badge-pill">{{ $channel->Channel->name }}</div>
                                                @empty
                                                @endforelse
                                            @else
                                                <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                                            @endif
                                        </td>
                                        <td data-href="{{action('CampaignController@show' , $campaign)}}">
                                            @if($campaign->User)
                                                {{ $campaign->User->firstnameInitial }}
                                            @endif
                                        </td>
                                        <td class="results" data-href="{{action('CampaignController@show' , $campaign)}}">
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
                <ul id="tab" class="pagination">
                    {!! str_replace( '/?' , '?' , $campaigns->appends(\Illuminate\Support\Facades\Input::except('page'))->render() ) !!}
                </ul>
            </nav>
        </div>
    </div>


@endsection

