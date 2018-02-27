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
                                <table class="table table-hover ajax-action">
                                    <tbody>
                                    @forelse($indicators as $indicator)
                                        <tr data-href='{{action('CampaignController@show' , $indicator->campaignChannel->campaign)}}'>
                                            <td class="text-left">
                                                {{ $indicator->campaignChannel->campaign->name }}
                                            </td>
                                            <td title="{{ $indicator->begin }} - {{ $indicator->end }}">
                                                {{ $indicator->period }}
                                            </td>
                                            <td>
                                                <div class="badge badge-outline-primary badge-pill">
                                                    {{ $indicator->Indicator->Channel->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <h4 class="mb-0">
                                                        {{ $indicator->result }}
                                                    </h4>
                                                    <small>{{ $indicator->indicator->name }}</small>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">Aucun résultat</td>
                                        </tr>
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
</div>