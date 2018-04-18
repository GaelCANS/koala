<ul style="text-align: left">
    @forelse($campaigns as $campaign)
        <li>{{$campaign->name}}</li>
        @empty
    @endforelse
</ul>