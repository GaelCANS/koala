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


            {!! Form::text( $indicator == null ?'new_indicator[]':'indicator['.$indicator->id.']',$indicator == null?'':$indicator->name, array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom l'indicateur" ) ) !!}

        </div>
    </div>
    @endif
@if ($indicator == null)
</div>
@endif