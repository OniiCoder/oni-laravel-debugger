<?php

namespace OniiCoder\OniDebugger;

if (! function_exists('oni')) {
    function oni(...$args) {
        file_put_contents(storage_path('logs/debug.log'), json_encode($args, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);
    }
}
