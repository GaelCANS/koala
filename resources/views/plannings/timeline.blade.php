@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none mt-3">TImeline</h4>

    <div class="row">

        <div class="col-md-12">

                <div class=" text-center">

                    {!! Form::model(
                        $request,
                        array(
                            'class'     => 'form-horizontal',
                            'url'       => route('filter-timeline'),
                            'method'    => 'Post',
                            'autocomplete' => 'off',
                            'id'        => 'filter-timeline'
                        )
                    ) !!}



                    <div class="col-9">
                        <div class="card bg-transparent">
                            <div class="row">


                                <div class="col-md-4">
                                    <h6>Canal</h6>
                                    {!! Form::select('channel',$channels , null, ['class' => 'mb-1 select2' , 'id' => 'status-select', 'data-select2-id' => 'status-select']) !!}
                                </div>
                                <div class="col-12 col-lg-5 mb-3">
                                    <h6>Périodes</h6>
                                    <div class="input-group date datepicker">
                                        {!! Form::text('begin' , null , array("class"=>"form-control ajax-stat", "placeholder"=>"Début")) !!}
                                        <div class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <span class="text-muted mr-1 ml-1">au</span>
                                    <div class="input-group date datepicker">
                                        {!! Form::text('end' , null , array("class"=>"form-control ajax-stat", "placeholder"=>"Fin")) !!}
                                        <div class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3 my-auto pull-right">
                                    <a href="{{ route('clear-filter-stat') }}"><button type="button" class="btn btn-info icon-btn">Effacer</button></a>
                                    <button type="submit" class="btn btn-primary icon-btn">Filtrer</button>
                                </div>
                            </div>

                        </div>
                    </div>




                    @if ($campaigns)
                    <div id="planning-timeline">
                        <div class="card grid-margin">
                            <div class="card-body">
                                @include('plannings.gantt')
                            </div>
                        </div>
                    </div>
                    @endif

                    {!! Form::close() !!}

                </div>

        </div>
    </div>

@endsection

