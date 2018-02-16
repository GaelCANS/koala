@extends('backoff.app')

@section('content')

        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <h6 class="card-title">Campagnes en cours / à venir</h6>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
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
                                <tr>
                                    <td class="marches"><div class="badge badge-primary">PART</div></td>
                                    <td>Conquête parrainage</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">bannière</div>
                                        <div class="badge badge-outline-primary badge-pill">post fb</div>
                                    </td>
                                    <td>Samantha R.</td>
                                </tr>
                                <tr>
                                    <td class="marches">
                                        <div class="badge badge-primary">PART</div>
                                        <div class="badge badge-info">PRO</div>
                                        <div class="badge badge-success">AGRI</div>
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
                                <tr>
                                    <td class="marches"><div class="badge badge-primary">PART</div></td>
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
                                    <td class="marches"><div class="badge badge-warning">SOC</div></td>
                                    <td>Bonus diversification épargne</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">email</div>
                                        <div class="badge badge-outline-primary badge-pill">affichage</div>
                                    </td>
                                    <td>Maud G.</td>
                                </tr>
                                <tr>
                                    <td class="marches"><div class="badge badge-primary">PART</div></td>
                                    <td>e-Immo</td>
                                    <td>03/01 au 15/02</td>
                                    <td>
                                        <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                                    </td>
                                    <td>Siham B.</td>
                                </tr>
                                <tr>
                                    <td class="marches">
                                        <div class="badge badge-primary">PART</div>
                                        <div class="badge badge-danger">BP</div>
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
                        <h6 class="card-title text-center">Stats T1 2018</h6>

                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-email-open-outline icon-lg text-muted"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">33%</h3>
                                <small class="text-muted">ouvreurs</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 2%</div>

                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-facebook icon-lg text-muted"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">18</h3>
                                <small class="text-muted">likes</small>
                            </div>
                            <div class="badge badge-pill badge-outline-danger text-danger"><i class="mdi mdi-arrow-down"></i> 5%</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-image icon-lg text-muted"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">135</h3>
                                <small class="text-muted">clics</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 7%</div>
                        </div>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <i class="mdi mdi-format-page-break icon-lg text-muted"></i>
                            <div class="col-md-6 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">1281</h3>
                                <small class="text-muted">vues</small>
                            </div>
                            <div class="badge badge-pill badge-outline-success text-success"><i class="mdi mdi-arrow-up"></i> 4%</div>
                        </div>
                        <hr>
                        <h6 class="card-title text-center">Best emailing <i class="mdi mdi-heart icon-sm" style="color:hotpink";></i></h6>
                        <div class="d-flex align-items-center justify-content-md-center">
                            <div class="col-md-4 ml-2 mr-2 text-center">
                                <h3 class="mb-0" style="line-height: 19px;">39%</h3>
                                <small class="text-muted">ouvreurs</small>
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
                        <h6 class="card-title">Mes campagnes</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrapper py-2">
                                    <div class="d-flex">
                                        <div class="wrapper ml-4">
                                            liste
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
                        <h6 class="card-title">Derniers résultats</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="wrapper py-2">
                                    <div class="d-flex">
                                        <div class="wrapper ml-4">
                                            liste
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