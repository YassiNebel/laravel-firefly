<li class="list-group-item">
    <div class="label-group pull-right">
        @foreach ($discussion->groups as $group)
            @if ($discussion->stickied_at)
                <div class="label label-success">{{ trans('firefly::discussions.stickied') }}</div>
            @endif

            @if ($discussion->locked_at)
                <div class="label label-danger">{{ trans('firefly::discussions.locked') }}</div>
            @endif

            <div class="label" style="background: {{ $group->color }}">{{ $group->name }}</div>
        @endforeach
    </div>
    <a href="{{ route('forum.discussions.show', $discussion->slug) }}">{{ $discussion->title }}</a><br>
    <p class="meta">Submitted by {{ $discussion->user->name }}, {{ $discussion->created_at->diffForHumans() }}</p>
</li>
