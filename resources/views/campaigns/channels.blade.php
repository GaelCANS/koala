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

        <tr>
            <td>
                {{ $channel->name }}
            </td>
            <td>
                {{ $channel->pivot->begin }}
                {{ $channel->pivot->end }}
            </td>
            <td>
                {{ $channel->pivot->comment }}
            </td>
            <td>
                @if (!empty($channel->Indicators))

                @foreach ($channel->Indicators as $indicator)
                    <ul class="list-inline">
                        <li class="list-inline-item">
                           {{$indicator->id}} {{$indicator->name}}
                        </li>
                        <li class="list-inline-item">
                            @if(isset($campaignChannelIndicator[$indicator->id][0]->goal)) {{$campaignChannelIndicator[$indicator->id][0]->goal}} @else @endif
                        </li>
                        <li class="list-inline-item">
                            @if(isset($campaignChannelIndicator[$indicator->id][0]->result)) {{$campaignChannelIndicator[$indicator->id][0]->result}} @else @endif
                        </li>
                    </ul>
                    @endforeach

                @endif
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
        </tr>

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