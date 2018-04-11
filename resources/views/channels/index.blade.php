@extends('backoff.app')

@section('content')

    <div class="box-header">

        <h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> Liste des canaux</h3>
        <span class="pull-right">
                <a href="{{action('ChannelController@create')}}" class="btn btn-success" title="Ajouter un canal"><i class="fa fa-plus-circle"></i> &nbsp; Ajouter un canal</a>
            </span>

    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Class Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($channels as $channel)
            <tr>
                <th>{{$channel->name}}</th>
                <th>{{$channel->class_name}}</th>
                <th>
                    <a href="{{action("ChannelController@show",$channel)}}" class="btn btn-success" title="Modifier ce canal">
                        <i class="fa fa-pencil-square"></i>
                    </a>
                    <a href="{{action("ChannelController@destroy",$channel)}}" class="btn btn-danger" title="Supprimer le canal" data-confirm="Voulez-vous vraiment supprimer ce canal ?" data-method="delete">
                        <i class="fa fa fa-fw fa-trash"></i>
                    </a>

                </th>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>

@endsection
