@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none mr-2">Paramètres</h4>
    <a href="{{action('ParameterController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-2" title="Ajouter">+ Ajouter un paramètre</button></a>

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
                                        <th>Catégorie</th>
                                        <th>Valeur</th
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($parameters as $parameter)
                                        <tr>
                                            <th>{{$parameter->name}}</th>
                                            <th>{{$parameter->category}}</th>
                                            <th>{{str_limit($parameter->value,70)}}</th>
                                            <th>
                                                <a href="{{action("ParameterController@show" , $parameter)}}" title="Modifier"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button></a>
                                                <a href="{{action("ParameterController@destroy" , $parameter)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer ce paramètre" data-method="delete"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button></a>
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
