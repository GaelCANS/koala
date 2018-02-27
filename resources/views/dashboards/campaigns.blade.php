
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-flex table-responsive">
                <h6 class="card-title">Campagnes en cours / à venir</h6>
                <div class=" ml-auto mr-0 border-0">
                    <nav>
                        <ul class="pagination pagination-info mb-1">
                            <li class="page-item"><a class="page-link btn-period-campaign" data-link="{{ $periods->prev }}"><i class="mdi mdi-chevron-left"></i></a></li>
                            <li class="page-item active"><span class="page-link" style="cursor:initial;" id="current-period" data-period="{{ $periods->date }}">{{ $periods->text }}</span></li>
                            <li class="page-item"><a class="page-link btn-period-campaign" data-link="{{ $periods->next }}"><i class="mdi mdi-chevron-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div  class="table-responsive">
                <table class="table table-hover ajax-action dashboard">
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
                    @forelse($campaigns as $campaign)
                    <tr class="@if($campaign->inProgress)inprogress @endif" data-href='{{action('CampaignController@show' , $campaign)}}'>
                        <td class="marches"><div class="badge part">@TODO</div></td>
                        <td class="text-left">{{ $campaign->name }}</td>
                        <td title="{{ $campaign->begin }} - {{ $campaign->end }}">
                            {{ $campaign->period }}
                        </td>
                        <td>
                            @if($campaign->countChannel<=5)
                                @forelse($campaign->channelsDistinct as $channel)
                                    <div class="badge badge-outline-primary badge-pill">{{ $channel->Channel->name }}</div>
                                    @empty
                                @endforelse
                                @else
                                <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                            @endif
                        </td>
                        <td>
                            @if($campaign->User)
                                {{ $campaign->User->firstnameInitial }}
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucune campagne en cours / à venir pour la période</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
