<tr>
    <td class="col-xs-12 col-sm-3 user">
        {{ $post->user->name }}
    </td>

    <td class="col-xs-12 col-sm-9">
        <div class="pull-right">
            <form action="{{ route('forum.posts.edit', $post->id) }}" method="GET" class="panel-options">
                <input type="submit" value="{{ trans('forum::forum.edit') }}" class="btn btn-xs btn-success pull-right">
            </form>

            <form action="{{ route('forum.posts.destroy', $post->id) }}" method="POST" class="panel-options">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <input type="submit" value="{{ trans('forum::forum.delete') }}" class="btn btn-xs btn-danger pull-right">
            </form>
        </div>

        {{ $post->content }}
    </td>
</tr>
