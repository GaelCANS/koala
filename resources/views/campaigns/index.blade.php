@extends('backoff.app')

@section('content')
    <h5 class="page-title d-inline-block mr-2">Campagnes</h5>
    <button type="button" class="btn btn-secondary btn-xs mb-1" data-href="{{action('CampaignController@create')}}" title="Ajouter une campagne">+ Ajouter</button>


    <div class="row">


        <div class="col-md-9 grid-margin stretch-card">

            <div>
                FILTRES<br>
                <button type="button" class="btn btn-light btn-fw">Périodes</button>
                <button type="button" class="btn btn-light btn-fw">Canaux</button>
                <button type="button" class="btn btn-light btn-fw">Marchés</button>
                <button type="button" class="btn btn-light btn-fw">Responsables</button>
                <button type="button" class="btn btn-light btn-fw">Services</button>
                <button type="button" class="btn btn-light btn-fw">Résultats</button>
            </div>

        </div>


        <div class="col-md-3 grid-margin stretch-card">
            <div class="table-responsive text-right">
                <div class="col-md-12 mb-3 pr-0">
                @include('campaigns.search')
                </div>
                <div class="col-md-12 pr-0">
                    <nav class="float-right">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
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
                                    <tr>
                                        <td class="marches"><div class="badge part">PART</div></td>
                                        <td class="text-left">Conquête parrainage</td>
                                        <td>03/01 au 15/02</td>
                                        <td class="text-left">
                                            <div class="badge badge-outline-primary badge-pill">email</div>
                                            <div class="badge badge-outline-primary badge-pill">bannière</div>
                                            <div class="badge badge-outline-primary badge-pill">post fb</div>
                                        </td>
                                        <td>Samantha R.</td>
                                        <td class="results">
                                            <label class="badge badge-success">Ajoutés</label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="marches"><div class="badge part">PART</div></td>
                                        <td class="text-left">EKO by CA</td>
                                        <td>13/02 au 15/02</td>
                                        <td class="text-left">
                                            <div class="badge badge-outline-primary badge-pill">email</div>
                                            <div class="badge badge-outline-primary badge-pill">bannière</div>
                                            <div class="badge badge-outline-primary badge-pill">post fb</div>
                                        </td>
                                        <td>Samantha R.</td>
                                        <td class="results">
                                            <label class="badge badge-warning">Partiels</label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="marches"><div class="badge pro">PRO</div></td>
                                        <td class="text-left">Bonus diversification épargne</td>
                                        <td>13/02 au 15/02</td>
                                        <td class="text-left">
                                            <div class="badge badge-outline-primary badge-pill">email</div>
                                            <div class="badge badge-outline-primary badge-pill">bannière</div>
                                            <div class="badge badge-outline-primary badge-pill">post fb</div>
                                        </td>
                                        <td>Élise C.</td>
                                        <td class="results">
                                            <label class="badge badge-danger">Aucuns</label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button>
                                                <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                        </td>
                                    </tr>


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
                    <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>



    @forelse($campaigns as $campaign)
        <div>
            <span class="nom">
                {{$campaign->name}}
            </span>
            <span class="periode">
                {{$campaign->beginshort}}
                <span @if($campaign->beginshort == '' || $campaign->endshort == '') style="display: none;" @endif>au</span>
                {{$campaign->endshort}}
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

