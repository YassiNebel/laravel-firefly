@extends('firefly::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('firefly::posts.edit') }}</div>

        <div class="panel-body">
            <form action="{{ route('forum.posts.update', $post->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content">{{ trans('firefly::forum.content') }}</label>
                    <textarea name="content" id="content" placeholder="{{ trans('firefly::posts.reply') }}" class="form-control">{{ $post->content }}</textarea>

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-success">{{ trans('firefly::forum.save') }}</button>
            </form>
        </div>
    </div>
@endsection
