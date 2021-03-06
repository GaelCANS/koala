@extends('backoff.app')

@section('content')


    {!! Form::model(
        $campaign,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('CampaignController@'.($campaign == null ? 'store' : 'update') , $campaign),
            'method'    => $campaign == null ? 'Post' : 'Put',
            'id'        => 'form-campaign',
            'files'    => true
        )
    ) !!}




    <h4 class="fiche-title d-inline-block mr-2">
        Fiche campagne
    </h4>
    <div class="d-inline-block status">
        {!! Form::select('status',$status , null, ['class' => 'mb-1 select2' , 'id' => 'status-select', 'data-select2-id' => 'status-select']) !!}
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-fw fa-save"></i>Enregister
        </button>
        <a href="{{action('CampaignController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

    <div class="row" id="show-campaign">
        <div class="col-md-12 p-0">
            <div class="col-md-12 grid-margin">
                <div id="head-campaign-details" class="card">
                    <div class="row mb-3">
                        <div class="col-4">
                            <h6>Nom de la campagne</h6>
                            {!! Form::text( 'name' , null , array( 'class' => 'form-control font-weight-bold' , 'placeholder' => "Saisissez le nom de la campagne" , 'id' => 'name-campaign' ) ) !!}
                            {!! Form::hidden( 'saved' , 1  ) !!}
                        </div>
                        <!--<div class="col-4">
                            <h6>Marchés</h6>
                            @foreach($markets as $market)
                                <div id="{{$market->class_css}}" class="icheck-line">
                                    {!! Form::checkbox('markets[]',$market->id, null, array('id' => 'line-checkbox-'.$market->id )) !!}
                                    <label for="line-checkbox{{$market->id}}">{{$market->abbreviation}}</label>
                                </div>
                            @endforeach
                        </div>-->

                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h6>Responsable de la campagne</h6>
                                    {!! Form::select('user_id',$users , ($campaign->user_id == 0 ? auth()->user()->id : $campaign->user_id), ['class' => 'select2 form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <h6>Univers de besoin</h6>
                            {!! Form::select('needs[]',$needs , $campaign->Needs->lists('id')->toArray(), ['class' => 'js-example-placeholder-multiple form-control tag-input force-placeholder', 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true', 'placeholder' => '+ Ajouter','data-value' => '+ Ajouter' ]) !!}
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h6>Objectif(s) de la campagne</h6>
                            {!! Form::textarea( 'description' , null , array( 'class' => 'form-control' , 'rows' => '6', 'cols' => '10') ) !!}
                        </div>
                        <div id="resp" class="col-4">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h6>Période de la campagne</h6>
                                    <div class="col-12 d-inline-flex text-center pl-0">
                                        <div class="form-control col-5 font-weight-bold" id="text-campaign-begin">@if($campaign != null) {{ $campaign->beginLong }} @endif</div>
                                        <span class="text-muted pt-1 mr-1 ml-1 col-2">au</span>
                                        <div class="form-control col-5 font-weight-bold" id="text-campaign-end">@if($campaign != null) {{ $campaign->endLong }} @endif</div>
                                    </div>
                                    {!! Form::hidden( 'begin' , null , array( 'id' => 'campaign-begin' ) ) !!}
                                    {!! Form::hidden( 'end' , null , array( 'id' => 'campaign-end' ) ) !!}
                                </div>

                                <div class="col-12">
                                    <h6>Segments</h6>
                                    @foreach($segments as $segment)
                                        <div id="{{$segment->class_css}}" class="icheck-line">
                                            {!! Form::checkbox('segments[]',$segment->id, null, array('id' => 'line-checkbox-'.$segment->id )) !!}
                                            <label for="line-checkbox{{$segment->id}}">{{$segment->abbreviation}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <h6>Contributeurs</h6>
                            <!--{!! Form::select('services[]',$services , $campaign->Services->lists('id')->toArray(), ['class' => 'js-example-placeholder-multiple form-control tag-input force-placeholder', 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true', 'placeholder' => '+ Ajouter','data-value' => '+ Ajouter' ]) !!}-->
                            {!! Form::select('users[]',$users , $campaign->Users->lists('id')->toArray(), ['class' => 'js-example-placeholder-multiple form-control tag-input force-placeholder', 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true', 'placeholder' => '+ Ajouter','data-value' => '+ Ajouter' ]) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin ">
                <div class="wrapper d-md-flex mb-3 pull-right">
                    <h6 class="font-weight-normal">Présentée en comité</h6>		
                    <div class="wrapper ml-md-3">
                        <div class="toggle-radio">
                            {!! Form::radio( 'cmm' , 1 , false , array('id' => 'cmm1' ) ) !!}
                            {!! Form::radio( 'cmm' , 0 , false , array('id' => 'cmm0' , ($campaign == null ? 'checked="checked"' : '') ) ) !!}
                            <div class="switch">
                                <label for="cmm1">Oui</label>
                                <label for="cmm0">Non</label>
                                <span></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    @include('campaigns.channels')
                </div>
            </div>

            <div class="row">

                <div class="col-4">
                    <div class="card  grid-margin">
                        <div class="card-body pt-3 pb-3 pl-3 pr-3 text-center">
                            <h6 class="mt-1 text-center mb-4">Commentaires</h6>
                            <div class="row">
                                <div class="col-12">
                                    {!! Form::textarea( 'cmm_comments' , null , array( 'class' => 'form-control bg-light', 'rows' => '5', 'cols' => '10') ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card  grid-margin">
                        <div class="card-body pt-3 pb-3 pl-3 pr-3">
                            <h6 class="mt-1 text-center">Résultats</h6>
                            <div class="row">
                                <div class="col-12">
                                    <div class="wrapper">
                                        <div class="d-flex">
                                            {!! Form::textarea( 'results' , null , array( 'class' => 'form-control bg-light' , 'rows' => '5', 'cols' => '10') ) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card grid-margin">
                        <div class="card-body pt-3 pb-3 pl-3 pr-3">
                            <div class="text-center ">
                                <h6 class="mt-1">Ressources</h6>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="wrapper">
                                        <div class="d-flex">
                                            {!! Form::text( 'resource_link' , null , array( 'class' => 'form-control bg-light' , 'placeholder' => 'Copier/coller le chemin texte APUBLIC' ) ) !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="wrapper">
                                        <div class="d-flex">
                                            <div class="file-upload-wrapper">
                                                <div id="campaign-upload" data-id="{{ $campaign->id }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-0">
                                    <div class="owl-carousel owl-theme full-width" id="carousel-image" data-link="{{route('delete-image-campaign')}}">
                                        @forelse($files as $file)
                                            {{ basename($file) }}
                                            <div class="item" data-item="{{basename($file)}}" data-count="">
                                                <div class="card">
                                                    <div class="d-flex">
                                                        <div class="mt-0 text-center w-100">
                                                            <img src="{{ asset( URL::to('/').'/storage/'.basename($file).'/'.$campaign->id ) }}" class="open-modal" style="cursor: pointer; " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12 grid-margin text-right">
                <div class="col-8 d-inline-block">
                    <p class="text-left text-muted text-small ">
                        Pour vous aider à renseigner les périodes, vous pouvez vous référer au <a href="{{route('planning-index')}}" target="_blank">calendrier</a> ou la <a href="{{route('timeline-index')}}" target="_blank">timeline</a> en filtrant par canal.<br><br>
                        N'oubliez pas de passer votre campagne en statut "<u>Publiée</u>" afin qu'elle puisse être intégrée dans la <a href="{{route('cmm-index')}}" target="_blank">liste des campagnes en attente de validation CMM</a>.<br><br>
                        Dès lors que le campagne est en statut "<u>Publiée</u>" et "<u>Validée CMM : OUI</u>", celle-ci devient visible dans le <a href="{{route('dashboard-index')}}" target="_blank">tableau de bord des campagnes en cours / à venir</a>.
                </div>
                <div class="col-2 pull-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-save"></i>Enregister
                    </button>
                </div>
                <div class="col-2 pull-right">
                    <a href="{{route('timeline-campaign', array($campaign))}}">
                        <button type="button" class="btn btn-info">
                            <i class="fa fa-calendar" aria-hidden="true"></i>Timeline
                        </button>
                    </a>
                </div>
            </div>

        </div>


    </div>
    {!! Form::close() !!}

    @include('campaigns.modal')

@endsection