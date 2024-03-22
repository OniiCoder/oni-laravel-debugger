<?php

namespace OniiCoder\OniDebugger;

if (! function_exists('oni')) {
    function oni(...$args) {
        $caller = getCallerClassAndMethod();

        writeToFile($caller);

        foreach ($args as $arg) {
            writeToFile($arg);
        }
    }
}

function writeToFile($data) {
    file_put_contents(storage_path('logs/debug.log'), json_encode($data, JSON_PRETTY_PRINT) . PHP_EOL, FILE_APPEND);
}

function getCallerClassAndMethod() {
    $trace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
    if (isset($trace[1]['file']) && isset($trace[1]['line'])) {
        return $trace[1]['file'] . ':' . $trace[1]['line'];
    }

    return null;
}
