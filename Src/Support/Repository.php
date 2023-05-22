<?php

namespace Arabasta\Support;

use Arabasta\Database\Database;
use Arabasta\Redis\Redis;

class Repository extends Database 
{
    // public function __construct()
    // {
    //   $this->redis = new Redis();
    // }

    use \Arabasta\Redis\Traits\Redis;
}