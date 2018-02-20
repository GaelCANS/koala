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
                <div class="form-group">
                    {!! Form::select('channel['.$channel->pivot->uniqid.'][channel_id]',$channels , $channel->id, ['class' => 'form-control select2']) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="name">Du</label>
                    {!! Form::text( 'channel['.$channel->pivot->uniqid.'][begin]' , $channel->pivot->begin , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
                </div>
                <div class="form-group">
                    <label for="name">au</label>
                    {!! Form::text( 'channel['.$channel->pivot->uniqid.'][end]' , $channel->pivot->end , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="name">Objectif(s) de la campagne</label>
                    {!! Form::textarea( 'channel['.$channel->pivot->uniqid.'][comment]' , $channel->pivot->comment , array( 'class' => 'form-control' ) ) !!}
                </div>
            </td>
            <td>
                @if (!empty($channel->Indicators))

                @forelse ($channel->Indicators as $indicator)
                    <?php $cci = $campaignChannelIndicator[$indicator->id][0] ?>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                           {{$indicator->name}}
                            {!! Form::hidden( 'indicator['.$cci->uniqid.'][uniqid]' , $cci->uniqid , array( 'class' => 'form-control' ) ) !!}
                            {!! Form::hidden( 'indicator['.$cci->uniqid.'][campaign_channel_id]' , $channel->pivot->id , array( 'class' => 'form-control' ) ) !!}
                        </li>
                        <li class="list-inline-item">
                            <div class="form-group">
                                {!! Form::number( 'indicator['.$cci->uniqid.'][goal]' , $cci->goal , array( 'class' => 'form-control' ) ) !!}
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="form-group">
                                {!! Form::number( 'indicator['.$cci->uniqid.'][result]' , $cci->result , array( 'class' => 'form-control' ) ) !!}
                            </div>
                        </li>
                    </ul>

                    @empty
                    aucun indicateur

                @endforelse


                @endif
            </td>
            <td>
                <a href="" class="btn btn-success" title="Dupliquer ce canal">
                    <i class="fa fa-copy"></i>
                    <a href="" class="btn btn-danger" title="Supprimer ce canal" data-confirm="Voulez-vous vraiment supprimer ce canal ?" data-method="delete">
                        <i class="fa fa fa-fw fa-trash"></i>
                    </a>
                </a>
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