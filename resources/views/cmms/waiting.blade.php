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
                            <table class="table table-hover ajax-action" id="list-campaigns-waiting" data-link="./cmm/addCampaign">
                                <thead>
                                <tr>
                                    <th>Prochain CMM</th>
                                    <th>Noms</th>
                                    <th>Périodes</th>
                                    <th>Resp. campagne</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($waitings as $waiting)
                                    @include('cmms.waiting-row' , array('waiting' => $waiting))
                                    @empty
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
<p class="text-center text-muted text-small mt-4">Pour ajouter une campagne au prochain ordre du jour, merci de prendre contact avec {{ \App\User::UsersCmm() }}, en charge de l'animation du CMM.
    <br><br>
    Si votre campagne est en statut "brouillon", elle n'apparaîtra pas dans cette file d'attente.<br>
</p>