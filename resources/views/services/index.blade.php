@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none mr-2">Services</h4>
    <a href="{{action('ServiceController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-2" title="Ajouter">+ Ajouter un service</button></a>

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
                                                <a href="{{action('ServiceController@show' , $service)}}" title="Modifier"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button></a>
                                                <a href="{{action('ServiceController@destroy' , $service)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button></a>
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