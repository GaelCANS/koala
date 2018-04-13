@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">Canaux</h4>
    <a href="{{action('ChannelController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Ajouter">+ Ajouter</button></a>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover ajax-action">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
