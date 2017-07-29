<?php

namespace Bitporch\Firefly\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            $model->generateSlug();
        });

        static::updating(function (Model $model) {
            $model->generateSlug();
        });
    }

    protected function generateSlug()
    {
        $slug = str_slug($this->title);

        if ($this->hasSlugBeenUsed($slug)) {
            $slug = $this->uniqueSlug($slug);
        }

        $this->slug = $slug;
    }

    protected function uniqueSlug($slug)
    {
        $originalSlug = $slug;
        $i = 1;

        while ($this->hasSlugBeenUsed($slug) || $slug === '') {
            $slug = $originalSlug.'-'.$i++;
        }

        return $slug;
    }

    protected function hasSlugBeenUsed($slug)
    {
        return static::where('slug', $slug)
            ->where($this->getKeyName(), '!=', $this->getKey() ?? '0')
            ->withoutGlobalScopes()
            ->exists();
    }
}
