<?php

namespace Arabasta\Interface;

interface RedisInterface
{
    /**
     * ------------------- Redis Function Interface ---------------------
     * **/

    /**
     * set redis data
     *
     * @param  string  $key
     * @param  string  $value
     * @param  int|null  $expire_in [second]
     */
    public function redis_set(string $key, string $value, $expire_in = null):bool;

    /**
     * set redis data permanently if old data not exist
     *
     * @param  string  $key
     * @param  string  $value
     * @param  int|null  $expire_in [second]
     */
    public function redis_set_if_not_exist(string $key, string $value, int $expire_in = null):bool;

    /**
     * get redis value by key
     *
     * @param  string  $key
     */
    public function redis_get(string $key):mixed;

    /**
     * delete redis data
     *
     * @param  string  $key
     * @return bool
     */
    public function redis_delete(string $key):bool;

    /**
     * check redis data is exist or not
     *
     * @param  string  $key
     */
    public function redis_has(string $key):bool;

    /**
     * publish redis data
     *
     * @param  mixed  $channel
     * @param  mixed  $data
     */
    public function redis_publish(mixed $channel, mixed $data):mixed;

}
