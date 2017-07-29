@extends('firefly::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                {{ $discussion->title }}

                @can('manage', $discussion)
                    <div class="pull-right">
                        <form action="{{ route('forum.discussions.destroy', $discussion) }}" method="POST" class="panel-options">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <input type="submit" value="{{ trans('firefly::forum.delete') }}" class="btn btn-xs btn-danger pull-right">
                        </form>

                        <form action="{{ route('forum.discussions.flag', $discussion) }}" method="POST" class="panel-options">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <input type="hidden" name="is_locked" value="{{ empty($discussion->locked_at) }}">
                            <input type="submit" value="{{ $discussion->locked_at ? trans('firefly::discussions.unlock') : trans('firefly::discussions.lock') }}" class="btn btn-xs btn-{{ $discussion->locked_at ? 'danger' : 'success' }} pull-right">
                        </form>

                        <form action="{{ route('forum.discussions.flag', $discussion) }}" method="POST" class="panel-options">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <input type="hidden" name="is_stickied" value="{{ empty($discussion->stickied_at) }}">
                            <input type="submit" value="{{ $discussion->stickied_at ? trans('firefly::discussions.unsticky') : trans('firefly::discussions.sticky') }}" class="btn btn-xs btn-{{ $discussion->stickied_at ? 'danger' : 'success' }} pull-right">
                        </form>
                    </div>
                @endcan
            </div>
        </div>

        <table class="table table-bordered">
            @each('firefly::partials.post', $discussion->posts, 'post')
        </table>

        @include('firefly::partials.paginator', ['resource' => $discussion->posts])
    </div>

    @can('reply', $discussion)
        @include('firefly::partials.quick-reply')
    @endcan
@endsection
