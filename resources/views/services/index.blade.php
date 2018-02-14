@extends('backoff.app')

@section('content')

<div class="box box-primary">

    <div class="box-header">

        <h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> Liste des services</h3>
            <span class="pull-right">
                <a href="{{action('ServiceController@create')}}" class="btn btn-success" title="Ajouter un service"><i class="fa fa-plus-circle"></i> &nbsp; Ajouter un service</a>
            </span>

    </div>

    <div class="box-body">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Membres</th>
            <th>Actif</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($services as $service)
            <tr>
                <th>{{ $service->name }}</th>
                <th>@TODO</th>
                <th>{{ $service->disabled ? 'oui' : 'non' }}</th>
                <th>
                    <a href="{{action('ServiceController@show' , $service)}}" class="btn btn-success" title="Modifier ce service">
                        <i class="fa fa-pencil-square"></i>
                        <a href="{{action('ServiceController@destroy' , $service)}}" class="btn btn-danger" title="Supprimer le service" data-confirm="Voulez-vous vraiment supprimer ce service ?" data-method="delete">
                            <i class="fa fa fa-fw fa-trash"></i>
                        </a>
                    </a>
                </th>
            </tr>
            @empty
        @endforelse
        </tbody>
    </table>

    </div>

</div>

@endsection