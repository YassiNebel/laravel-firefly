<?php

namespace Bitporch\Forum\Observers;

use Bitporch\Forum\Models\Post;

class PostObserver
{
    /**
     * Listen to the Post created event.
     *
     * @param Post $post
     *
     * @return void
     */
    public function created(Post $post)
    {
        $discussion = $post->discussion();
        $discussion->update([
            'posts_count'  => ($discussion->posts_count + 1),
            'last_post_id' => $post->user_id,
        ]);
    }

    /**
     * Listen to the Post deleting event.
     *
     * @param Post $post
     *
     * @return void
     */
    public function deleting(Post $post)
    {
        $discussion = $post->discussion();
        $discussion->update(['posts_count' => ($discussion->posts_count - 1)]);
    }
}
