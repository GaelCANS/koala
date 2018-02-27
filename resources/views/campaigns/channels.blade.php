<div class="table-responsive">
    <table id="channels-table" class="ajax-action table">
        <thead>
        <tr>
            <th>
                Canaux
            </th>
            <th>
                Périodes
            </th>
            <th>
                Commentaires
            </th>
            <th>
                Indicateurs / Objectif / Résultats
            </th>
            <th>
                Actions
            </th>
        </tr>
        </thead>
        @if (!empty($campaign->Channels))

        <tbody>
            @foreach($campaign->Channels as $channel)

                @include('campaigns.campaignchannels')

            @endforeach

        </tbody>

        @endif

        @include('campaigns.addchannel')

    </table>
</div>