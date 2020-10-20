@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Segments</h4>
    <a href="{{action('SegmentController@create')}}"><button type="button" class="btn btn-secondary btn-xs mb-2" title="Ajouter">+ Ajouter un segment</button></a>

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
                                    <th>Abbréviation</th>
                                    <th>Class CSS</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($segments as $segment)
                                    <tr>
                                        <th>{{$segment->name}}</th>
                                        <th>{{$segment->abbreviation}}</th>
                                        <th>{{$segment->class_css}}</th>
                                        <th>
                                            <a href="{{action("SegmentController@show" , $segment)}}" title="Modifier"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-border-color"></i></button></a>
                                            <a href="{{action("SegmentController@destroy" , $segment)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-delete"></i></button></a>
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
