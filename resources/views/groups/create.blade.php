@extends('firefly::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ trans('firefly::groups.create') }}</div>

        <div class="panel-body">
            <form action="{{ route('forum.groups.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">{{ trans('firefly::forum.name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">

                    @error('name')
                </div>

                <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                    <label for="color">{{ trans('firefly::forum.color') }}</label>
                    <input type="color" name="color" id="color" value="{{ old('color') }}" class="form-control">

                    @error('color')
                </div>

                <button class="btn btn-success">{{ trans('firefly::forum.submit') }}</button>
            </form>
        </div>
    </div>
@endsection
