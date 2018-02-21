<table>
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
            Indicateurs
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

    <tfoot>
    <tr>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
        <td>

        </td>
    </tr>
    </tfoot>
</table>