<?php

include __DIR__. '/interfaces/CacheInterface.php';
include __DIR__. '/classes/RedisCache.php';

$redis_cache = new \classes\RedisCache();

$redis_cache->set('hey', 'merhaba', 360);