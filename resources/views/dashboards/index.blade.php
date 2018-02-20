@extends('backoff.app')

@section('content')

        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex table-responsive">
                            <h6 class="card-title">Campagnes en cours / à venir</h6>
                            <div class=" ml-auto mr-0 border-0">
                                <nav>
                                    <ul class="pagination pagination-info mb-1">
                                        <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                        <li class="page-item active"><span class="page-link" style="cursor:initial;">Février 2018</span></li>
                                        <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Marchés</th>
                                    <th>Noms</th>
                                    <th>Périodes</th>
                                    <th>Canaux</th>
                                    <th>Responsables</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="inprogress" data-href='campaingns'>
                                    <td class="marches"><div class="badge part">PART</div></td>
                                    <td>Conquête parrainage</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                    </td>
                                    <td>Samantha R.</td>
                                </tr>
                                <tr class="inprogress">
                                    <td class="marches">
                                        <div class="badge part">PART</div>
                                        <div class="badge pro">PRO</div>
                                        <div class="badge agri">AGRI</div>
                                    </td>
                                    <td>EKO by CA</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                    </td>
                                    <td>Mickaël B.</td>
                                </tr>
                                <tr class="inprogress">
                                    <td class="marches"><div class="badge part">PART</div></td>
                                    <td>Assemblée Générales</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                        <div class="badge badge-outline-primary badge-pill">dab</div>
                                    </td>
                                    <td>Bénédicte R.</td>
                                </tr>
                                <tr>
                                    <td class="marches"><div class="badge soc">SOC</div></td>
                                    <td>Bonus diversification épargne</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">affichage</div>
                                    </td>
                                    <td>Maud G.</td>
                                </tr>
                                <tr>
                                    <td class="marches"><div class="badge part">PART</div></td>
                                    <td>e-Immo</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                                    </td>
                                    <td>Siham B.</td>
                                </tr>
                                <tr>
                                    <td class="marches">
                                        <div class="badge part">PART</div>
                                        <div class="badge bp">BP</div>
                                    </td>
                                    <td>Jobdating Wizbii</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                    </td>
                                    <td>Julie L.</td>
                                </tr>
                                <tr>
                                    <td class="marches">
                                        <div class="badge part">PART</div>
                                        <div class="badge bp">BP</div>
                                    </td>
                                    <td>Jobdating Wizbii</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                    </td>
                                    <td>Julie L.</td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title text-center">1<sup>er</sup> trimestre 2018</h6>


                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-email-open-outline icon-lg text-secondary"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">33%</h3>
                                <small class="text-muted">ouvreurs</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 2%</div>

                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-facebook icon-lg text-secondary"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">18</h3>
                                <small class="text-muted">likes</small>
                            </div>
                            <div class="badge badge-pill badge-outline-danger text-danger"><i class="mdi mdi-arrow-down"></i> 5%</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-image icon-lg text-secondary"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">135</h3>
                                <small class="text-muted">clics</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 7%</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-format-page-break icon-lg text-secondary"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">1281</h3>
                                <small class="text-muted">vues</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 4%</div>
                        </div>
                        <hr>
                        <h6 class="card-title text-center">L'emailing du mois <i class="mdi mdi-heart icon-sm" style="color:hotpink";></i></h6>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <div class="text-center">
                                <h3 class="mb-0" style="color:hotpink;line-height: 18px;">39%</h3>
                                <small class="mt-0 text-muted">ouvreurs</small>
                                <p class="mt-2 mb-0"><b>Assemblée générale</b><br>
                                <small class="text-muted">envoyé le 07/01/2018</small></p>

                            </div>




                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex table-responsive">
                            <h6 class="card-title">Mes campagnes</h6>
                            <div class=" ml-auto mr-0 border-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light text-muted"><small>Toutes mes campagnes</small></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrapper py-2">
                                    <div class="d-flex">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr class="inprogress" data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>Samantha R.</td>
                                                </tr>
                                                <tr class="inprogress" data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>Samantha R.</td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>Samantha R.</td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>Samantha R.</td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>Samantha R.</td>
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
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex table-responsive">
                            <h6 class="card-title">Derniers résultats</h6>
                            <div class=" ml-auto mr-0 border-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light text-muted"><small>Tous les résultats</small></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrapper py-2">
                                    <div class="d-flex">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>
                                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h4 class="mb-0">33%</h4>
                                                            <small>ouvreurs</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>EKO by CA</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>
                                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h4 class="mb-0">398</h4>
                                                            <small>clics</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Assemblée générale</td>
                                                    <td>03/02 au 20/03</td>
                                                    <td>
                                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h4 class="mb-0">34</h4>
                                                            <small>likes</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Bonus diversification épargne</td>
                                                    <td>12/11 au 19/02</td>
                                                    <td>
                                                        <div class="badge badge-outline-primary badge-pill">page</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h4 class="mb-0">1034</h4>
                                                            <small>vues</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr data-href='campaingns'>
                                                    <td>Conquête parrainage</td>
                                                    <td>03/01 au 15/02</td>
                                                    <td>
                                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <h4 class="mb-0">33%</h4>
                                                            <small>ouvreurs</small>
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
            </div>

        </div>




@endsection