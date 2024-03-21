<?php

namespace OniiCoder\OniDebugger;

if (! function_exists('oni')) {
    function oni(...$args) {
        file_put_contents(storage_path('logs/debug.log'), json_encode($args) . PHP_EOL, FILE_APPEND);
        // You can customize the behavior of the debug function here
        // For example, you can log to different files, or use different formatting
    }
}
