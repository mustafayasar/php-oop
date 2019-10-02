<?php

namespace interfaces;


interface CacheInterface
{
    function set($key, $value, $duration = 360);

    function get($key);

    function remove($key);
}