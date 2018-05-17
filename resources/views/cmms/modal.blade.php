<div class="modal fade" id="day-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Destinataires</label>
                        {!! Form::textarea( 'destinataires' , $cmm_params->recipients , array( 'class' => 'form-control' , 'placeholder' => "Liste des destinataires" , "rows" => 5 , 'id' => "recipients" ) ) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Invités</label>
                        {!! Form::text( 'guests' , null , array( 'class' => 'form-control' , 'placeholder' => "Liste des destinataires exceptionnels" , 'id' => 'guests' ) ) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Objet</label>
                        {!! Form::text( 'subject' , 'Ordre du jour du CMM du '.$cmm_params->date , array( 'class' => 'form-control' , 'placeholder' => "Objet du mail" , 'id' => 'subject' ) ) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Contenu</label>
                        {!! Form::textarea( 'content' , $cmm_params->content , array( 'class' => 'form-control summernote' , 'placeholder' => "Contenu du mail" , 'id' => 'content' ) ) !!}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" style="display: none" id="loading-mail"><i class="fa fa-circle-o-notch fa-spin"></i> Envoi du message en cours</button>
                <button type="button" class="btn btn-primary" id="send-mail" data-link="./cmm/send">Envoyer l'ordre du jour</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>