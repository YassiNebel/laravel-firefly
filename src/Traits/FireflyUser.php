<?php

namespace Bitporch\Firefly\Traits;

use Bitporch\Firefly\Models\Discussion;
use Bitporch\Firefly\Models\Post;

trait FireflyUser
{
    /**
     * Return all the discussions created by the user.
     *
     * @return mixed
     */
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    /**
     * Get all the posts created by the user.
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
