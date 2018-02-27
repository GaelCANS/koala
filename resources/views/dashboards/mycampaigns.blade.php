<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body pb-0">
            <div class="d-flex table-responsive">
                <h6 class="card-title">Mes campagnes</h6>
                <div class=" ml-auto mr-0 border-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light text-muted"><small>Toutes mes campagnes</small></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wrapper py-2">
                        <div class="d-flex">
                            <div class="table-responsive">
                                <table class="table table-hover ajax-action">
                                    <tbody>
                                    @forelse($mycampaigns as $mycampaign)
                                        <tr class="@if($mycampaign->inProgress)inprogress @endif" data-href='{{action('CampaignController@show' , $mycampaign)}}'>
                                            <td class="text-left">
                                                {{ $mycampaign->name }}
                                            </td>
                                            <td title="{{ $mycampaign->begin }} - {{ $mycampaign->end }}">
                                                {{ $mycampaign->period }}
                                            </td>
                                            <td>
                                                @if($mycampaign->User)
                                                    {{ $mycampaign->User->firstnameInitial }}
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">
                                                Aucune campagne
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>