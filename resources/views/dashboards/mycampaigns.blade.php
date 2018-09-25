<div class="col-md-6 stretch-card">
    <div class="card">
        <div class="card-body pb-1">
            <div class="d-flex table-responsive">
                <h5 class="card-title">Mes campagnes</h5>
                <div class=" ml-auto mr-0 border-0">
                    <div class="btn-group">
                        <a href="{{ route('dashboard-my-campaigns') }}"> <button type="button" class="btn btn-light text-muted"><small>Toutes mes campagnes</small></button></a>
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