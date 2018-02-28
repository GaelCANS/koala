@extends('backoff.app')

@section('content')
    <h5 class="page-title d-inline-block mr-2">
        @if( $campaign == null ) Création @else Édition @endif d'une fiche campagne @if( $campaign != null )
        @endif
    </h5>
    <div class="d-inline-block">
        {!! Form::select('status',$status , null, ['class' => 'btn btn-primary btn-xs mb-1']) !!}
    </div>

    <a href="{{action('CampaignController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>


    {!! Form::model(
        $campaign,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('CampaignController@'.($campaign == null ? 'store' : 'update') , $campaign),
            'method'    => $campaign == null ? 'Post' : 'Put'
        )
    ) !!}

    <div class="row">
        <div class="col-md-9 p-0">
            <div class="col-md-12 grid-margin">
                <div class="card bg-transparent">
                    <div class="row mb-3">
                        <div class="col-4">
                            <h6>Nom</h6>
                            {!! Form::text( 'name' , null , array( 'class' => 'form-control font-weight-bold' , 'placeholder' => "Saisissez le nom de la campagne" ) ) !!}
                            {!! Form::hidden( 'saved' , 1  ) !!}
                        </div>
                        <div class="col-4">
                            <h6>Marchés</h6>
                            <div id="part" class="icheck-line">
                                <input tabindex="1" type="checkbox" id="line-checkbox-1"  />
                                <label for="line-checkbox-1">PART</label>
                            </div>
                            <div id="pro" class="icheck-line">
                                <input tabindex="2" type="checkbox" id="line-checkbox-2"   />
                                <label for="line-checkbox-2">PRO</label>
                            </div>
                            <div id="agri" class="icheck-line">
                                <input tabindex="3" type="checkbox" id="line-checkbox-3"  />
                                <label for="line-checkbox-3">AGRI</label>
                            </div>
                            <div id="bp" class="icheck-line">
                                <input tabindex="4" type="checkbox" id="line-checkbox-4" />
                                <label for="line-checkbox-4">BP</label>
                            </div>
                            <div id="soc" class="icheck-line">
                                <input tabindex="5" type="checkbox" id="line-checkbox-5" />
                                <label for="line-checkbox-5">SOC</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <h6>Période de la campagne</h6>
                            <div class="col-12 d-inline-flex text-center pl-0">
                                <div class="form-control col-5 font-weight-bold">02/03/2018</div>
                                <span class="text-muted mr-1 ml-1 col-2">au</span>
                                <div class="form-control col-5 font-weight-bold">18/04/2018</div>
                            </div>

                            {!! Form::hidden( 'begin' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
                            {!! Form::hidden( 'end' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}




                            <!--<div class="input-group">
                                <input type="text" class="form-control" placeholder="Date de début" />

                            </div>
                            <span class="text-muted mr-1 ml-1">au</span>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Date de fin" />
                            </div>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h6>Objectif(s) de la campagne</h6>
                            {!! Form::textarea( 'description' , null , array( 'class' => 'form-control' , 'rows' => '2', 'cols' => '10') ) !!}
                        </div>
                        <div class="col-4">
                            <h6>Responsable de la campagne</h6>
                            {!! Form::select('user_id',$users , null, ['class' => 'js-example-placeholder-single js-states form-control']) !!}
                        </div>
                        <div class="col-4">
                            <h6>Contributeurs</h6>
                            {!! Form::select('services[]',$services , $campaign->Services->lists('id')->toArray(), ['class' => 'js-example-placeholder-multiple js-states form-control', 'multiple' => 'multiple' ]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @include('campaigns.channels')
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Enregister
                </button>
            </div>
        </div>

        <div class="col-md-3 grid-margin">
            <div class="card  grid-margin">
                <div class="card-body pt-3 pb-3 pl-3 pr-3 text-center">
                        <h6 class="mt-1 text-center mb-4">CMM</h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper d-md-flex mb-3">
                                <h6 class="text-muted">Validé en CMM</h6>
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
                                <h6 class="text-muted text-left">Commentaires</h6>
                                {!! Form::textarea( 'cmm_comments' , null , array( 'class' => 'form-control bg-light', 'rows' => '5', 'cols' => '10') ) !!}



                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid-margin">
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
            <div class="card grid-margin">
                <div class="card-body pt-3 pb-3 pl-3 pr-3">
                    <div class="text-center ">
                        <h6 class="mt-1">Ressources</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper">
                                <div class="d-flex">
                                    {!! Form::text( 'resource_link' , null , array( 'class' => 'form-control bg-light' , 'placeholder' => 'Chemin APUBLIC' ) ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body pt-3 pb-3 pl-3 pr-3">
                    <div class="text-center ">
                        <h6 class="mt-1">Liaison Unica</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper">
                                <div class="d-flex">
                                    {!! Form::text( 'unica' , null , array( 'class' => 'form-control bg-light' , 'placeholder' => 'ID de liaison avec Unica' ) ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body pt-3 pb-3 pl-3 pr-3">
                    <div class="text-center ">
                        <h6 class="mt-1">Validation juridique</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <label for="legal_validation-oui">Oui</label>
                                        {!! Form::radio( 'legal_validation' , 'oui' , false , array('id' => 'legal_validation-oui') ) !!}
                                        <label for="legal_validation-non">Non</label>
                                        {!! Form::radio( 'legal_validation' , 'non' , false , array('id' => 'legal_validation-non') ) !!}
                                        <label for="legal_validation-nc">Non concerné</label>
                                        {!! Form::radio( 'legal_validation' , 'non concerné' , false , array('id' => 'legal_validation-nc') ) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


















    {!! Form::close() !!}


@endsection