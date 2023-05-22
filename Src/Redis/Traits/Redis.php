<?php

namespace Arabasta\Redis\Traits;

use Illuminate\Support\Facades\Redis as LaravelRedis;

trait Redis
{
    /**
     * ------------------- Redis Function Traits ---------------------
     * **/

    #set redis data
    public function redis_set(string $key, string $value, $expire_in = null):bool
    {
        if (is_null($expire_in)) {
            return (bool) LaravelRedis::set($key, $value);
        } else {
            return (bool) LaravelRedis::set($key, $value, 'EX', $expire_in);
        }
    }

    #set redis data permanently if old data not exist
    public function redis_set_if_not_exist(string $key, string $value, int $expire_in = null):bool
    {
        if (is_null($expire_in)) {
            return (bool) LaravelRedis::setnx($key, $value);
        } else {
            return (bool) LaravelRedis::set($key, $value, 'EX', $expire_in, 'NX');
        }
    }

    #get redis value by key
    public function redis_get(string $key):mixed
    {
        return LaravelRedis::get($key);
    }

    #delete redis data
    public function redis_delete(string $key):bool
    {
        return (bool) LaravelRedis::del($key);
    }

    #check redis data is exist or not
    public function redis_has(string $key):bool
    {
        return (bool) LaravelRedis::exists($key);
    }

    #publish redis data
    public function redis_publish(mixed $channel, mixed $data):mixed
    {
        return (bool) LaravelRedis::publish($channel, $data);
    }
    
}
