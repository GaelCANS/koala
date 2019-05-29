@if ($indicator == null)
    <div id="template-add-new-indicator" style="display: none">

        @endif

        @if ($indicator == null || $indicator->delete == 0)
            <div @if ($indicator == null) class="col-md-12 add-indic" @else class="col-md-12" @endif  @if ($indicator != null) id="root-indicator-{{$indicator->id}}" @endif >
                <div class="form-group">
                    <label for="name">Nom de l'indicateur </label>
                    <button class="btn btn-danger indicator-del" type="button" data-id="{{ $indicator == null?'':$indicator->id}}" @if ($indicator != null) data-url="{{action("IndicatorController@destroy" , $indicator)}}" @endif>
                        <i class="fa fa-trash "></i>
                    </button>


                    {!! Form::text( $indicator == null ?'new_indicator[REPLACEID]':'indicator['.$indicator->id.'][name]',$indicator == null?'':$indicator->name, array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom l'indicateur" ) ) !!}

                </div>
                <div class="form-group">
                    <label for="type">Type de l'indicateur</label>


                    <div class="wrapper ml-md-3" id="testastrid">

                        <?php $random = rand(0,1000) ?>
                        <div class="form-radio">
                            <label for="percent-REPLACEID">
                                {!! Form::radio( 'new_type[REPLACEID]', 'percent',($indicator == null || $indicator->type == 'percent') ? true : false  , array('id' => 'percent-REPLACEID', 'class' => 'form-check-input') ) !!}
                                Percent
                            </label>
                        </div>

                        <div class="form-radio">
                            <label for="numeric-REPLACEID">
                                {!! Form::radio( 'new_type[REPLACEID]', 'numeric',($indicator != null && $indicator->type == 'numeric') ? true : false  , array('id' => 'numeric-REPLACEID', 'class' => 'form-check-input') ) !!}
                                Numeric
                            </label>
                        </div>

                        <div class="form-radio">
                            <label for="decimal-REPLACEID">
                                {!! Form::radio( 'new_type[REPLACEID]', 'decimal',($indicator != null && $indicator->type == 'decimal') ? true : false  , array('id' => 'decimal-REPLACEID', 'class' => 'form-check-input') ) !!}

                                Decimal
                            </label>
                        </div>

                    </div>

                </div>
            </div>
        @endif
        @if ($indicator == null)
    </div>
@endif