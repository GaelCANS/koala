@extends('backoff.app')

@section('content')

    @include('campaigns.search')

    <div class="box-header">

        <h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> Liste des campagnes</h3>
            <span class="pull-right">
                <a href="{{action('CampaignController@create')}}" class="btn btn-success" title="Ajouter une campagne"><i class="fa fa-plus-circle"></i> &nbsp; Ajouter une campagne</a>
            </span>

    </div>

    @forelse($campaigns as $campaign)
        <div>
            <span class="nom">
                {{$campaign->name}}
            </span>
            <span class="periode">
                {{$campaign->begin}}
                <span @if($campaign->begin == '' || $campaign->end == '') style="display: none;" @endif>au</span>
                {{$campaign->end}}
            </span>
            <span class="actions">
                <a href="{{action('CampaignController@show' , $campaign)}}" class="btn btn-success" title="Modifier cette campagne">
                    <i class="fa fa-pencil-square"></i>
                    <a href="{{action('CampaignController@destroy' , $campaign)}}" class="btn btn-danger" title="Supprimer la campagne" data-confirm="Voulez-vous vraiment supprimer cette campagne ?" data-method="delete">
                        <i class="fa fa fa-fw fa-trash"></i>
                    </a>
                </a>
            </span>
        </div>
        @empty
        Aucune campagne
    @endforelse

    welcome to campaigns page

@endsection