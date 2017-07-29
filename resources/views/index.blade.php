@extends('firefly::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('firefly::discussions.plural') }}</div>

        <ul class="list-group">
            @if (count($discussions))
                @each('firefly::partials.discussion', $discussions, 'discussion')
            @else
                <li class="list-group-item">
                    {{ trans('firefly::discussions.empty') }}
                </li>
            @endif
        </ul>

        @include('firefly::partials.paginator', ['resource' => $discussions])
    </div>
@endsection
