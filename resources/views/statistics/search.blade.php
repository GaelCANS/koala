{!! Form::model( $data , [ 'class' => 'form-horizontal' , 'url' => route("filter-stat" ) , 'method' => "post" ] ) !!}

<div id="stat-search" class="row" data-page="{{$page}}" data-link="@if($page == 'index') {{route('ajax-index-stat')}} @else coucou @endif">
    <div class="col-9">
        <div class="card bg-transparent">
            <div class="row">
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
                <div class="col-12 col-md-3">
                    <h6>Marchés</h6>
                    @foreach($markets as $market)
                        <div id="{{$market->class_css}}" class="icheck-line">
                            {!! Form::checkbox('markets[]',$market->id, null, array('id' => 'line-checkbox-'.$market->id , 'class' => 'ajax-stat-check' )) !!}
                            <label for="line-checkbox{{$market->id}}" class="label-market">{{$market->abbreviation}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3">
                    <h6>Responsables</h6>
                    {!! Form::select('users[]',$users , null, ['class' => 'js-example-placeholder-multiple js-states form-control toggle-tous force-placeholder  ajax-stat', 'id' => 'stats-users' , 'multiple' => 'multiple', 'data-placeholder' => '+ Ajouter', 'data-allow-clear' => 'true' ]) !!}
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 col-lg-3 my-auto">
        <a href="{{ route('clear-filter-stat') }}"><button type="button" class="btn btn-info icon-btn">Effacer</button></a>
        <button type="submit" class="btn btn-primary icon-btn">Filtrer</button>
    </div>
</div>

{!! Form::close() !!}

