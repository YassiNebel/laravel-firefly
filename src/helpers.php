<?php

if (!function_exists('is_group_mode')) {
    /**
     * Check if the group mode equals what was specified.
     *
     * @param string $mode
     *
     * @return bool
     */
    function is_group_mode($mode)
    {
        return config('firefly.group_mode') === $mode;
    }
}
