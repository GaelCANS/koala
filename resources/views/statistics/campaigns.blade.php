<div class="stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex table-responsive">
                <h5 class="card-title">Campagnes concernées</h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wrapper py-2">
                        <div class="d-flex">
                            <div class="table-responsive">
                                <table class="table table-hover ajax-action">
                                    <thead>
                                    <tr>
                                        <th>Noms</th>
                                        <th>Marchés</th>
                                        <th>Périodes</th>
                                        <th>Etat</th>
                                        <th colspan="3">Indicateurs</th>
                                    </tr>
                                    </thead>
                                    <tbody id="listing-campaigns">
                                    @foreach($campaigns as $campaign)
                                        <tr>
                                            <td class="text-left">
                                                {{$campaign['campaign']->Campaign->name}}
                                            </td>
                                            <td class="marches">

                                                @forelse($campaign['campaign']->Campaign->Markets as $market)
                                                    <div class="badge {{ $market->class_css }}">{{ $market->abbreviation }}</div>
                                                @empty
                                                @endforelse</td>
                                            </td>
                                            <td title="">
                                                {{ $campaign['campaign']->Campaign->period }}
                                            </td>
                                            <td title="">
                                                <label class="badge @if($campaign['campaign']->Campaign->results_state == 'ajoutés')badge-success @elseif($campaign['campaign']->Campaign->results_state == 'partiels')badge-warning @else badge-danger @endif">{{$campaign['campaign']->Campaign->results_state}}</label>
                                            </td>

                                            <td>
                                                <table width="100%">
                                                    <tr>
                                                        @foreach($campaign['indicators'] as $indicator)
                                                        <td>
                                                            <div class="text-center">
                                                                <h4 class="mb-0 font-weight-bold">
                                                                    {{round($indicator['average'])}}
                                                                </h4>
                                                                <small>@if ($indicator['id'] != \App\Parameter::getParameter('best_banniere' , 'dashboard') ) {{$indicator['indicator']}} @else Clics/jour @endif</small>
                                                            </div>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
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