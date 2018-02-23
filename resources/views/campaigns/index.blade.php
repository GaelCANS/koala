@extends('backoff.app')

@section('content')
    <h5 class="page-title d-inline-block mr-2">Campagnes</h5>
    <button type="button" class="btn btn-secondary btn-xs mb-1" data-href="{{ route('new-campaign') }}" title="Ajouter une campagne">+ Ajouter</button>

    <div class="row">
        <div class="col-10 grid-margin">
            <div class="card bg-transparent">
                <div class="row mb-3">
                    <div class="col-5">
                        <h6>Périodes</h6>
                        <div class="input-group date datepicker">
                            <input type="text" class="form-control" placeholder="Date de début" />
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                        <div class="input-group date datepicker">
                            <input type="text" class="form-control" placeholder="Date de fin" />
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <h6>Marchés</h6>
                        .
                    </div>
                    <div class="col-2">
                        <h6>Résultats</h6>
                        .
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <h6>Responsables / Contributeurs</h6>
                        <select class="js-example-placeholder-multiple js-states form-control" name="states[]" multiple="multiple" >
                            <option selected value="tous">Tous</option>
                            <option value="email">email</option>
                            <option value="bannière">bannière</option>
                            <option value="dab">dab</option>
                            <option value="email">email</option>
                            <option value="bannière">bannière</option>
                            <option value="dab">dab</option>
                            <option value="bannière">bannière</option>
                            <option value="dab">dab</option>
                        </select>

                    </div>
                    <div class="col-7">
                        <h6>Canaux</h6>
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
        <div class="col-2 grid-margin">
            <div class="card bg-transparent text-right">
                <div class="row">
                    <div class="col-12 mb-3 ">
                        @include('campaigns.search')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button>
                            <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-content-copy"></i></button>
                            <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button>
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

