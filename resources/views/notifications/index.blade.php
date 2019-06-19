@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none mr-2">Notifications</h4>


    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover ajax-action">
                                    <thead>
                                    <tr>
                                        <th>Détails</th>
                                        <th>Campagne</th>
                                        <th>Depuis</th>
                                    </tr>
                                    </thead>
                                    <tbody id="notifications-list" data-link="{{route('notifications-update')}}">
                                    @forelse($notifications as $notification)
                                        <tr class="todo-notification" style="@if ($notification->done) text-decoration: line-through; @endif" data-id="{{ $notification->id }}">
                                            <td class="text-left detail-notification">
                                                <i class="fa fa-eercast" style="color: @if($notification->created_at > $last_notification) red @else green @endif" title="@if($notification->created_at > $last_notification) Non vue @else Vue @endif"></i>
                                                &nbsp;
                                                {{ $notification->detail }}
                                            </td>
                                            <td>
                                                <a href="{{action('CampaignController@show' , $notification->Campaign)}}">{{ $notification->Campaign->name }}</a>
                                            </td>
                                            <td>{{ $notification->since }}</td>
                                        </tr>
                                    @empty
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


@endsection