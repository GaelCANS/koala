@if ($indicator == null)
<div id="template-add-indicator" style="display: none">

 @endif

    @if ($indicator == null || $indicator->delete == 0)
    <div @if ($indicator == null) class="col-md-12 add-indic" @else class="col-md-12" @endif  @if ($indicator != null) id="root-indicator-{{$indicator->id}}" @endif >
        <div class="form-group">
            <label for="name">Nom de l'indicateur </label>
            <button class="btn btn-danger indicator-del" type="button" data-id="{{ $indicator == null?'':$indicator->id}}" @if ($indicator != null) data-url="{{action("IndicatorController@destroy" , $indicator)}}" @endif>
                <i class="fa fa-trash "></i>
            </button>


            {!! Form::text( $indicator == null ?'new_indicator[]':'indicator['.$indicator->id.'][name]',$indicator == null?'':$indicator->name, array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom l'indicateur" ) ) !!}

        </div>
        <div class="form-group">
            <label for="type">Type de l'indicateur</label>

            {!! Form::text( $indicator == null ?'new_type[]':'indicator['.$indicator->id.'][type]',$indicator == null?'':$indicator->type, array( 'class' => 'form-control' , 'placeholder' => "Saisissez le type l'indicateur" ) ) !!}

            <div class="wrapper ml-md-3">

                <?php $random = rand(0,1000) ?>
                <div class="form-radio">
                    <label for="percent-{{ $indicator != null ? $random : 'REPLACEID'}}">
                        {!! Form::radio( $indicator == null ?'new_type[]':'indicator['.$indicator->id.'][type]', 'percent',($indicator == null || $indicator->type == 'percent') ? true : false  , array('id' => 'percent-'.$random, 'class' => 'form-check-input') ) !!}
                        Percent
                    </label>
                </div>

                <div class="form-radio">
                    <label for="numeric-{{ $indicator != null ? $random : 'REPLACEID'}}">
                        {!! Form::radio( $indicator == null ?'new_type[]':'indicator['.$indicator->id.'][type]', 'numeric',($indicator != null && $indicator->type == 'numeric') ? true : false  , array('id' => 'numeric-'.$random, 'class' => 'form-check-input') ) !!}
                        Numeric
                    </label>
                </div>

                <div class="form-radio">
                    <label for="decimal-{{ $indicator != null ? $random : 'REPLACEID'}}">
                        {!! Form::radio( $indicator == null ?'new_type[]':'indicator['.$indicator->id.'][type]', 'decimal',($indicator != null && $indicator->type == 'decimal') ? true : false  , array('id' => 'decimal-'.$random, 'class' => 'form-check-input') ) !!}

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