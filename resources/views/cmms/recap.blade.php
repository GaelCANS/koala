<div class="card">
    <div class="card-body pb-0">
        <div class="d-flex table-responsive mb-2">
            <h5 class="card-title">Récapitulatifs CMM</h5>
            <div class=" ml-auto mr-0 border-0">
                <div class="btn-group">
                    <input type="" class="form-control btn btn-light text-muted datepicker previous-cmm" placeholder="Rechercher par date">
                </div>
            </div>
        </div>
        <div class="font-weight-bold text-small text-success">Campagnes validées le <span id="last-cmm">{{$printable_lastCmm}}</span></div>

        <div class="row">
            <div class="col-12">
                <div class="wrapper py-2">
                    <div class="d-flex">
                        <div class="table-responsive">
                            <table class="table table-hover ajax-action">
                                <tbody id="list-validate-campaigns"  data-link="./cmm/previous">
                                    @include('cmms.recap-rows')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
