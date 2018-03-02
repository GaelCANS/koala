<div class="row">
    <div class="col-10 grid-margin">
        <div class="card bg-transparent">
            <div class="row mb-3">
                <div class="col-5">
                    <h6>Périodes</h6>
                    <div class="input-group date datepicker">
                        <input type="text" class="form-control" placeholder="Date de début" />
                        <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </div>
                    </div>
                    <span class="text-muted mr-1 ml-1">au</span>
                    <div class="input-group date datepicker">
                        <input type="text" class="form-control" placeholder="Date de fin" />
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
                    <div id="results" class="icheck-line success">
                        <input tabindex="1" type="checkbox" id="line-results-checkbox-1"  checked="" />
                        <label for="line-results-checkbox-1">AJOUTÉS</label>
                    </div>
                    <div id="results" class="icheck-line warning">
                        <input tabindex="2" type="checkbox" id="line-results-checkbox-2" checked=""  />
                        <label for="line-results-checkbox-2">PARTIELS</label>
                    </div>
                    <div id="results" class="icheck-line danger">
                        <input tabindex="3" type="checkbox" id="line-results-checkbox-3" checked="" />
                        <label for="line-results-checkbox-3">AUCUNS</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <h6>Responsables / Contributeurs</h6>
                    <select class="js-example-placeholder-multiple js-states form-control" name="states[]" multiple="multiple" >
                        <option selected value="tous">Tous</option>
                        <option value="email">email</option>
                        <option value="bannière">bannière</option>
                        <option value="dab">dab</option>
                        <option value="email">email</option>
                        <option value="bannière">bannière</option>
                        <option value="dab">dab</option>
                        <option value="bannière">bannière</option>
                        <option value="dab">dab</option>
                    </select>

                </div>
                <div class="col-7">
                    <h6>Canaux</h6>
                    <select class="js-example-placeholder-multiple js-states form-control" name="states[]" multiple="multiple" >
                        <option selected value="tous">Tous</option>
                        <option value="email">email</option>
                        <option value="bannière">bannière</option>
                        <option value="dab">dab</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2 grid-margin">
        <div class="card bg-transparent text-right">
            <div class="row">
                <div class="col-12 mb-3 ">
                    <li class="btn-group ml-auto mr-0 border-0">
                        <input type="text" class="form-control " placeholder="Rechercher">
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