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