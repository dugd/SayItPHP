<?php

function config($key, $default = null)
{
    static $configs;

    if (!isset($configs)) {
        $configs = [];
        foreach (glob(__DIR__ . '/../configs/*.php') as $file) {
            $name = basename($file, '.php');
            $configs[$name] = require $file;
        }
    }

    $keys = explode('.', $key);
    $value = $configs;

    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return $default;
        }
        $value = $value[$k];
    }

    return $value;
}
