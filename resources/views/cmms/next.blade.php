<div class="card mb-4">
    <div class="card-body pb-0">
        <div class="d-flex table-responsive">
            <h5 class="card-title">Prochain CMM</h5>
        </div>
        <div class="row" id="next-cmm" data-link="./cmm/params">
            <div class="col-12">
                <div class="card">
                    <div class="row mb-5">
                        <div class="col-4">
                            <h6>Date</h6>
                            <div class="col-6 d-inline-flex text-center pl-0">
                                {!! Form::text( 'date' , $cmm_params->date , array( 'class' => 'form-control font-weight-bold bg-light datepicker text-center auto-save', 'id' => 'input-date'  , 'placeholder' => "JJ/MM/AAAA" ) ) !!}
                            </div>
                        </div>
                        <div class="col-3">
                            <h6>Heure</h6>
                            <div class="col-10 d-inline-flex text-center pl-0 input-group clockpicker">
                                {!! Form::text( 'time' , $cmm_params->time , array( 'class' => 'form-control font-weight-bold bg-light text-center auto-save' , 'id' => 'input-clock' , 'placeholder' => "10:30" , 'data-default' => '10:30' ) ) !!}
                            </div>
                        </div>
                        <div class="col-5">
                            <h6>Lieu (salle)</h6>
                            <div class="col-12 d-inline-flex text-center pl-0">
                                {!! Form::text( 'where' , $cmm_params->where , array( 'class' => 'form-control font-weight-bold bg-light auto-save', 'id' => 'input-where'  , 'placeholder auto-save' => "Maurice LEBLANC"  ) ) !!}
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <h6>Campagnes à l'ordre du jour</h6>
                            <div class="row">
                                <div class="col-12">
                                    <div class="wrapper py-2">
                                        <div class="d-flex">
                                            <div class="table-responsive">
                                                <table class="table table-hover ajax-action" id="list-campaigns-cmm">
                                                    <tbody>
                                                    @forelse($campaigns as $campaign)
                                                        @include('cmms.next-row',array('campaign' => $campaign))
                                                        @empty
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->user()->cmm)
                            <div class="row">
                                <div class="col-12">
                                    <div class="wrapper text-right py-3">
                                        <a href="javascript:;" data-toggle="modal" data-target="#annulation-cmm" class="btn btn-danger"><i class="fa fa-mail-forward"></i> Annulation CMM</a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#day-order" class="btn btn-info"><i class="fa fa-mail-forward"></i> Envoyer l'ordre du jour</a>
                                        <!--<button type="submit" class="btn btn-primary" id="cloture-cmm" data-link="./cmm/close">
                                            <i class="fa fa-fw fa-save"></i>Clôturer le CMM
                                        </button>-->
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>