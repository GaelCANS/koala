@extends('backoff.app')

@section('content')

    <a href="{{action('TagController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-1" title="Ajouter">+ Ajouter</button></a>
    <h4 class="page-title d-inline-block mr-2">Tags</h4>

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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($tags as $tag)
                                        <tr>
                                            <th align="left">{{$tag->name}}</th>
                                            <th>
                                                <a href="{{action("TagController@update" , $tag)}}" title="Modifier"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button></a>
                                                <a href="{{action("TagController@destroy" , $tag)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button></a>
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

