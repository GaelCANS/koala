@extends('backoff.app')

@section('content')

    @include('channels.channel')

    @if ( $channel != null)
        {!! Form::model(
              null,
              array(
                  'class'     => 'form-horizontal',
                  'url'       => action('IndicatorController@store'),
                  'method'    => 'Post'
              )
          ) !!}
        @foreach( $channel -> Indicators as $indicator)
            @include('channels.indicator')
        @endforeach
        @include('channels.indicator', array('indicator'=>null))
        <button type="submit" class="btn btn-success">
            Enregister
        </button>
        {!! Form::hidden( 'channel_id' , $channel->id  ) !!}
        {!! Form::close() !!}
    @endif


@endsection