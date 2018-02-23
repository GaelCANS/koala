@extends('backoff.app')

@section('content')

    <div class="box-header">

        <h3 class="box-title"><i class="fa fa-list" aria-hidden="true"></i> Liste des marchés</h3>
        <span class="pull-right">
                <a href="{{action('MarketController@create')}}" class="btn btn-success" title="Ajouter un marché"><i class="fa fa-plus-circle"></i> &nbsp; Ajouter un marché</a>
            </span>

    </div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Abbréviation</th>
        <th>Class CSS</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($markets as $market)
        <tr>
            <th>{{$market->name}}</th>
                <th>{{$market->abbreviation}}</th>
                <th>{{$market->class_css}}</th>
                <th>
                    <a href="{{action("MarketController@show",$market)}}" class="btn btn-success" title="Modifier ce marché">
                        <i class="fa fa-pencil-square"></i>
                    </a>
                    <a href="{{action("MarketController@destroy",$market)}}" class="btn btn-danger" title="Supprimer le marché" data-confirm="Voulez-vous vraiment supprimer ce marché ?" data-method="delete">
                        <i class="fa fa fa-fw fa-trash"></i>
                    </a>

                </th>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>

@endsection
