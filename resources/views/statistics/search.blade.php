{!! Form::model( $data , [ 'class' => 'form-horizontal' , 'url' => route("filter-stat" ) , 'method' => "post" ] ) !!}

<div id="stat-search" class="row">
    <div class="col-9">
        <div class="card bg-transparent">
            <div class="row">
                <div class="col-12 col-lg-5 mb-3">
                    <h6>Périodes</h6>
                    <div class="input-group date datepicker">
                        {!! Form::text('begin' , null , array("class"=>"form-control", "placeholder"=>"Début")) !!}
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                    <span class="text-muted mr-1 ml-1">au</span>
                    <div class="input-group date datepicker">
                        {!! Form::text('end' , null , array("class"=>"form-control", "placeholder"=>"Fin")) !!}
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <h6>Marchés</h6>
                    <!--REPRENDRE CE QUE TU AS FAIT SUR LE SEARCH DE CAMPAIGNS-->
                        <div id="" class="icheck-line">
                            <label for="line-checkbox"></label>
                        </div>
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

