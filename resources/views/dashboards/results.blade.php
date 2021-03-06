<div class="col-lg-6 col-xs-12 stretch-card">
    <div class="card">
        <div class="card-body pb-2">
            <div class="d-flex table-responsive">
                <h5 class="card-title">Derniers résultats</h5>
                <div class=" ml-auto mr-0 border-0">
                    <div class="btn-group">
                        <a href="{{ route('statistic-index') }}"><button type="button" class="btn btn-light text-muted"><small>Tous les résultats</small></button></a>
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
                                                {{ $indicator->campaignChannel->period }}
                                            </td>
                                            <td>
                                                <div class="badge badge-outline-primary badge-pill">
                                                    {{ $indicator->Indicator->Channel->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <h4 class="mb-0 font-weight-bold">
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