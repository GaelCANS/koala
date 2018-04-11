@extends('backoff.app')

@section('content')

    <h4 class="page-title">CMM</h4>
    <div id="cmm" class="row">
        <div class="col-md-5 grid-margin ">
            <div class="card mb-4">
                <div class="card-body pb-0">
                    <div class="d-flex table-responsive">
                        <h5 class="card-title">Prochain CMM</h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row mb-5">
                                    <div class="col-4">
                                        <h6>Date</h6>
                                        <div class="col-6 d-inline-flex text-center pl-0">
                                            <input class="form-control font-weight-bold bg-light datepicker text-center" placeholder="JJ/MM/AAAA"/>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <h6>Heure</h6>
                                        <!--<div class="col-10 d-inline-flex text-center pl-0">
                                            <input class="form-control font-weight-bold bg-light text-center" placeholder="--h--"/>
                                        </div>-->
                                        <div class="col-10 d-inline-flex text-center pl-0 input-group clockpicker">
                                            <input id="input-clock" type="text" class="form-control font-weight-bold bg-light text-center" data-default="10:30" placeholder="10:30" />

                                        </div>




                                    </div>
                                    <div class="col-5">
                                        <h6>Lieu (salle)</h6>
                                        <div class="col-12 d-inline-flex text-center pl-0">
                                            <input class="form-control font-weight-bold bg-light" placeholder="Maurice LEBLANC"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Campagnes à l'ordre du jour</h6>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="wrapper py-2">
                                                    <div class="d-flex">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover ajax-action">
                                                                <tbody>
                                                                    <tr class="">
                                                                        <td class="text-left">
                                                                            Conquête Parrainage Février
                                                                        </td>
                                                                        <td title="">
                                                                           03/01/18 au 15/02/18
                                                                        </td>
                                                                        <td>
                                                                            Samantha R.
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="">
                                                                        <td class="text-left">
                                                                            EKO by CA
                                                                        </td>
                                                                        <td title="">
                                                                            02/03/18 au 25/04/18
                                                                        </td>
                                                                        <td>
                                                                            Thomas S.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="wrapper text-right py-3">
                                                    <a href="" class="btn btn-info"><i class="fa fa-mail-forward"></i> Envoyer l'ordre du jour</a>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-fw fa-save"></i>Clôturer le CMM
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex table-responsive mb-2">
                            <h5 class="card-title">Récapitulatifs CMM</h5>
                            <div class=" ml-auto mr-0 border-0">
                                <div class="btn-group">
                                    <input type="" class="form-control btn btn-light text-muted datepicker" placeholder="Rechercher par date">
                                </div>
                            </div>
                        </div>
                        <div class="font-weight-bold text-small text-success">Campagnes validées le 05/02/2018</div>

                        <div class="row">
                            <div class="col-12">
                                <div class="wrapper py-2">
                                    <div class="d-flex">
                                        <div class="table-responsive">
                                            <table class="table table-hover ajax-action">
                                                <tbody>
                                                <tr class="">
                                                    <td class="text-left">
                                                        Conquête Parrainage Février
                                                    </td>
                                                    <td title="">
                                                        03/01/18 au 15/02/18
                                                    </td>
                                                    <td>
                                                        Samantha R.
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-left">
                                                        EKO by CA
                                                    </td>
                                                    <td title="">
                                                        02/03/18 au 25/04/18
                                                    </td>
                                                    <td>
                                                        Thomas S.
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

        <div class="col-md-7 grid-margin ">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex table-responsive">
                        <h5 class="card-title">Campagnes en attente de validation</h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <table class="table table-hover ajax-action">
                                            <thead>
                                            <tr>
                                                <th>Prochain CMM</th>
                                                <th>Noms</th>
                                                <th>Périodes</th>
                                                <th>Resp. campagne</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    Conquête Parrainage Février
                                                </td>
                                                <td title="">
                                                    03/01/18 au 15/02/18
                                                </td>
                                                <td>
                                                    Samantha R.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td class="text-left">
                                                    <div class="toggle-radio">
                                                        <input id="cmm1" name="cmm" type="radio" value="1">
                                                        <input id="cmm0" checked="checked" name="cmm" type="radio" value="0">
                                                        <div class="switch">
                                                            <label for="cmm1">Oui</label>
                                                            <label for="cmm0">Non</label>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    EKO by CA
                                                </td>
                                                <td title="">
                                                    02/03/18 au 25/04/18
                                                </td>
                                                <td>
                                                    Thomas S.
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