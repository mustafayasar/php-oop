<?php

spl_autoload_register(function ($class_name) {

    $class_name = str_replace("\\", "/", $class_name);

    include __DIR__. '/' .$class_name. '.php';
});


use classes\FileCache;

$file_cache = new FileCache();

$file_cache->set('hey', 'merhaba', 360);