@extends('backoff.app')

@section('content')
    <h5 class="page-title d-inline-block mr-2">
        @if( $campaign == null ) Création @else Édition @endif d'une fiche campagne @if( $campaign != null )
            <small class="text-capitalize">{{$campaign->name}}</small>
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
                            {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom de la campagne" ) ) !!}
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
                            {!! Form::text( 'begin' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
                            {!! Form::text( 'end' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <h6>Objectif(s) de la campagne</h6>
                            {!! Form::text( 'description' , null , array( 'class' => 'form-control' ) ) !!}
                        </div>
                        <div class="col-4">
                            <h6>Responsable de la campagne</h6>
                            {!! Form::select('user_id',$users , null, ['class' => 'js-example-placeholder-single js-states form-control']) !!}
                        </div>
                        <div class="col-4">
                            <h6>Contributeurs</h6>
                            <select class="js-example-placeholder-multiple js-states form-control" name="states[]" multiple="multiple" >
                                <option selected value="tous">Tous</option>
                                <option value="email">email</option>
                                <option value="bannière">bannière</option>
                                <option value="dab">dab</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        @include('campaigns.channels')

                        <!--<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Canaux</th>
                                    <th>Périodes</th>
                                    <th>Commentaires</th>
                                    <th>Indicateurs / Objectif / Résultats </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="inprogress" data-href='campaingns'>
                                    <td><div class="badge badge-outline-primary badge-pill">email</div></td>
                                    <td>03/01 au 15/02</td>
                                    <td>.</td>
                                    <td>
                                        .
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button>
                                            <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>-->
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
                <div class="card-body pt-3 pb-0  text-center">
                    <div class="text-center ">
                        <h6 class="mt-1">CMM</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2 ">
                                <div class="">
                                    <label for="cmm1">Oui</label>
                                    {!! Form::radio( 'cmm' , 1 , false , array('id' => 'cmm1' ) ) !!}
                                    <label for="cmm0">Non</label>
                                    {!! Form::radio( 'cmm' , 0 , false , array('id' => 'cmm0' , ($campaign == null ? 'checked="checked"' : '') ) ) !!}
                                    <div class="card-subtitle">Commentaires</div>
                                    {!! Form::text( 'cmm_comments' , null , array( 'class' => 'form-control bg-dark' ) ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body pt-3 pb-0  text-center">
                    <div class="text-center ">
                        <h6 class="mt-1">Résultats</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    {!! Form::text( 'results' , null , array( 'class' => 'form-control bg-dark' ) ) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body pt-3 pb-0  text-center">
                    <div class="text-center ">
                        <h6 class="mt-1">Ressources</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    {!! Form::text( 'resource_link' , null , array( 'class' => 'form-control bg-dark' , 'placeholder' => 'Chemin APUBLIC' ) ) !!}
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