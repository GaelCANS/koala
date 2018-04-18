<ul>
    @forelse($campaigns as $campaign)
        <li>{{$campaign->name}}</li>
        @empty
    @endforelse
</ul>