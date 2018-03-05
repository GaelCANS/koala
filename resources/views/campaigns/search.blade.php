{!! Form::model( $data , [ 'class' => 'form-horizontal' , 'url' => route("filter-campaign" ) , 'method' => "post" ] ) !!}
<div class="row">

    <div class="col-10 grid-margin">
        <div class="card bg-transparent">
            <div class="row mb-3">
                <div class="col-5">
                    <h6>Périodes</h6>
                    <div class="input-group date datepicker">
                        {!! Form::text('begin' , null , array("class"=>"form-control", "placeholder"=>"Date de début")) !!}
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                    <span class="text-muted mr-1 ml-1">au</span>
                    <div class="input-group date datepicker">
                        {!! Form::text('end' , null , array("class"=>"form-control", "placeholder"=>"Date de fin")) !!}
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <h6>Marchés</h6>
                    @foreach($markets as $market)
                        <div id="{{$market->class_css}}" class="icheck-line">
                            {!! Form::checkbox('markets[]',$market->id, null, array('id' => 'line-checkbox-'.$market->id )) !!}
                            <label for="line-checkbox{{$market->id}}">{{$market->abbreviation}}</label>
                        </div>
                    @endforeach



                </div>
                <div class="col-3">
                    <h6>Résultats</h6>
                    @forelse($results as $class => $result)
                        <div id="results" class="icheck-line {{$class}}">
                            {!! Form::checkbox('results[]',$result, null, array('id' => 'line-results-checkbox-'.$class )) !!}
                            <label for="line-results-checkbox-1">{{ strtoupper($result) }}</label>
                        </div>
                        @empty
                    @endforelse
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <h6>Responsables / Contributeurs</h6>
                    {!! Form::select('services[]',$services , null, ['class' => 'js-example-placeholder-multiple js-states form-control toggle-tous', 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true' ]) !!}

                </div>
                <div class="col-7">
                    <h6>Canaux</h6>
                    {!! Form::select('channels[]',$channels , null, ['class' => 'js-example-placeholder-multiple js-states form-control toggle-tous', 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true' ]) !!}
                    <button type="submit" class="btn btn-outline-secondary icon-btn">Filtrer</button>
                    <a href="{{route('clear-filter-campaign')}}"><button type="button" class="btn btn-outline-secondary icon-btn">Effacer</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 grid-margin">
        <div class="card bg-transparent text-right">
            <div class="row">
                <div class="col-12 mb-3 ">
                    <li class="btn-group ml-auto mr-0 border-0">
                        {!! Form::text('keywords' , null , array("class"=>"form-control", "placeholder"=>"Rechercher")) !!}
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-export"></i></button>
                        <button type="button" class="btn btn-outline-secondary icon-btn"><i class="mdi mdi-printer"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
{!! Form::close() !!}