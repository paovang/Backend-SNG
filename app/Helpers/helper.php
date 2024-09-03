<?php

if (!function_exists('exampleHelper')) {
    function exampleHelper($request)
    {
        return strtoupper($request);
    }
}


if (!function_exists('formatDate')) {
    function formatDate($request)
    {
        return 'DateTime:' . $request;
    }
}