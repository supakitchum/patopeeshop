<?php
if (!function_exists('get_title')) {
    function get_title()
    {
        $title = View::getSection('title');
        if ($title) {
            return $title . " : " . env('APP_NAME');
        } else {
            return env('APP_NAME');
        }
    }
}
