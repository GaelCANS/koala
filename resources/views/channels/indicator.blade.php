<div class="box box-primary">




    <div class="box-body with-border">

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nom de l'indicateur</label>

                {!! Form::text( 'name['.(isset($indicator->id)?$indicator->id:"0").']' ,!empty($indicator->name)?$indicator->name:'', array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom l'indicateur" ) ) !!}


                <a href="{{action("IndicatorController@destroy",$indicator)}}" class="btn btn-danger" title="Supprimer l'indicateur" data-confirm="Voulez-vous vraiment supprimer cet indicateur ?" data-method="delete">
                    <i class="fa fa fa-fw fa-trash"></i>
                </a>
            </div>
        </div>




    </div>



</div>