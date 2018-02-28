<div id="channels-table" class="table-responsive">
    <table class="ajax-action table">
        <thead>
        <tr>
            <th class="channel">
                Canaux
            </th>
            <th class="period">
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