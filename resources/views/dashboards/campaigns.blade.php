
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-flex table-responsive">
                <h6 class="card-title">Campagnes en cours / à venir {{ time() }}</h6>
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

            <div class="table-responsive">
                <table class="table table-hover ajax-action">
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
                        <td>
                            {{ $campaign->period }}
                        </td>
                        <td>
                            @if($campaign->countChannel<=5)
                                @forelse($campaign->Channels as $channel)
                                    <div class="badge badge-outline-primary badge-pill">{{ $channel->name }}</div>
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
                            <td colspan="4">Aucune campagne en cours/à venir pour la période</td>
                        </tr>
                    @endforelse
                    <tr class="inprogress">
                        <td class="marches">
                            <div class="badge part">PART</div>
                            <div class="badge pro">PRO</div>
                            <div class="badge agri">AGRI</div>
                        </td>
                        <td class="text-left">EKO by CA</td>
                        <td>03/01 au 15/02</td>
                        <td>
                            <div class="badge badge-outline-primary badge-pill">email</div>
                            <div class="badge badge-outline-primary badge-pill">bannière</div>
                            <div class="badge badge-outline-primary badge-pill">post fb</div>
                        </td>
                        <td>Mickaël B.</td>
                    </tr>
                    <tr class="inprogress">
                        <td class="marches"><div class="badge part">PART</div></td>
                        <td class="text-left">Assemblée Générales</td>
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
                        <td class="marches"><div class="badge soc">SOC</div></td>
                        <td class="text-left">Bonus diversification épargne</td>
                        <td>03/01 au 15/02</td>
                        <td>
                            <div class="badge badge-outline-primary badge-pill">email</div>
                            <div class="badge badge-outline-primary badge-pill">affichage</div>
                        </td>
                        <td>Maud G.</td>
                    </tr>
                    <tr>
                        <td class="marches"><div class="badge part">PART</div></td>
                        <td class="text-left">e-Immo</td>
                        <td>03/01 au 15/02</td>
                        <td>
                            <div class="badge badge-outline-primary badge-pill">+5 canaux</div>
                        </td>
                        <td>Siham B.</td>
                    </tr>
                    <tr>
                        <td class="marches">
                            <div class="badge part">PART</div>
                            <div class="badge bp">BP</div>
                        </td>
                        <td class="text-left">Jobdating Wizbii</td>
                        <td>03/01 au 15/02</td>
                        <td>
                            <div class="badge badge-outline-primary badge-pill">email</div>
                            <div class="badge badge-outline-primary badge-pill">bannière</div>
                            <div class="badge badge-outline-primary badge-pill">post fb</div>
                        </td>
                        <td>Julie L.</td>
                    </tr>
                    <tr>
                        <td class="marches">
                            <div class="badge part">PART</div>
                            <div class="badge bp">BP</div>
                        </td>
                        <td class="text-left">Jobdating Wizbii</td>
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
