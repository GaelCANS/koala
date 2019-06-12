


    <div class="row">



                <div class="col-md-12 text-center">

                    <p class="pt-4 pb-4">{{$channel->description}}</p>
                    <div class="row">
                        <div class="col-6" style="border-right:1px solid #e8e8e8;">
                            <h6>Service expert</h6>
                            <small class="text-muted">{{$channel->class_name}}</small>
                        </div>
                        <div class="col-6">
                            <h6>Formats</h6>
                            <small class="text-muted">
                                {{$channel->format}}
                            </small>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-12">
                            <div class="text-center">
                                Cibles privilégiées
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @forelse($channel->Tags as $tag)

                        <div class="col-4">
                            <div class="text-left">
                                <small><i class="fa fa-check" aria-hidden="true"></i> {{$tag->name}}</small>
                            </div>
                        </div>

                    @empty
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <small>Aucune cible privilégiée</small>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    </div>

                    <hr class="my-4">
                    <!--
                    <h6 class="mb-2">Statitiques moyenne</h6>
                    <div class="text-center">
                        <div class="indicator-channel">
                            <h2 style="color:#fb9678;">243</h2>
                            <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                        </div>
                    </div>
                    -->
                      <a href="{{route('channel-stat', array('id'=> $channel->id))}}" class="btn btn-light btn-xs mt-2">Voir les statistiques en détail</a><br>
                </div>



    </div>

