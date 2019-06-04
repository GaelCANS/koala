@extends('backoff.app')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <h4 class="fiche-title d-inline-block mr-2">
                Planning des communications
            </h4>
            <div class="pull-right">
                <a href="{{action('CampaignController@show' , array($campaign))}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 12px">
        <div class="col-md-12">
            <div
                id="gantt-camp"
                style="height: 550px;"
                data-min="{{\Carbon\Carbon::createFromFormat('d/m/y',$campaign->begin)->subMonth()->format('Y-m-d')}}"
                data-max="{{\Carbon\Carbon::createFromFormat('d/m/y',$campaign->end)->addMonth()->format('Y-m-d')}}"
            ></div>
        </div>
    </div>
    @forelse($campaign->relationCampaignChannels as $campaignChannel)
        @if ($campaignChannel->begin != '0000-00-00' && $campaignChannel->end != '0000-00-00')
            <div
                class="timeline-channel"
                data-channel="{{$campaignChannel->Channel->name}}"
                data-family="{{$campaignChannel->Channel->class_name}}"
                data-begin="{{$campaignChannel->begin}}"
                data-end="{{$campaignChannel->end}}"
            >
            </div>
        @endif
    @empty
    @endforelse


@endsection