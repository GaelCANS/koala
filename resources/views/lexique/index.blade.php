@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none mt-3">Glossaire</h4>

    <div class="row">

        <div class="col-lg-5">
            <div class="card ">

            </div>
            <div class="card grid-margin">
                <div class="card-body text-center">
                    <div id="lexique">
                        <select  class="select2">
                            <option value="0">vitr - ban part</option>
                            <option>hey</option>
                            <option>c'est super</option>
                            <option>ce que tu fais</option>
                        </select>
                    </div>
                    <p class="pt-4 pb-4">
                        Cette bannière est affichée sur la page d'accueil des Particuliers du site ca-normandie-seine.fr.<br>
                        Elle se décline en 4 formats : HD, desktop, tablette et mobile.</p>
                    <div class="row">
                        <div class="col-6" style="border-right:1px solid #e8e8e8;">
                            <h6>Service expert</h6>
                            <small class="text-muted">Canaux Digitaux</small>
                        </div>
                        <div class="col-6">
                            <h6>Formats</h6>
                            <small class="text-muted">
                                1920x768<br>
                                1280x768<br>
                                900x540<br>
                                480x360
                            </small>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="mb-2">Statitiques moyenne</h6>
                    <div class="text-center">
                        <div class="indicator-channel">
                            <h2 style="color:#fb9678;">243</h2>
                            <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                        </div>
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-2">Voir les statistiques en détail</a><br>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                   <img src="{{ asset('/images/lexique/vitr-banpart.png') }}" width="100%">

                </div>
            </div>
        </div>
    </div>

@endsection