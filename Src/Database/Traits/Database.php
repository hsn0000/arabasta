<?php

namespace Arabasta\Database\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait Database 
{
    /**
     * ------------------- Trait Database Function ---------------------
     * **/
    
    #default connection db
    protected ?string $db_connection = null;

    # manual load connection db
    public function connection(string $connection = 'default'): \Illuminate\Database\ConnectionInterface
    {
        $connection = $connection == 'default' ? (!is_null($this->db_connection) ? $this->db_connection : config('database.default')) : $connection;

        return DB::connection($connection);
    }

    #manual load table w/o model
    public function table(string $table_name, string $connection = 'default'): \Illuminate\Database\Query\Builder
    {
        $connection = $connection == 'default' ? (!is_null($this->db_connection) ? $this->db_connection : config('database.default')) : $connection;

        return $this->connection($connection)->table($table_name);
    }

    #check database has table or not
    public function has_table(string $table_name, string $connection = 'default'): bool
    {
        $connection = $connection == 'default' ? (!is_null($this->db_connection) ? $this->db_connection : config('database.default')) : $connection;

        return Schema::connection($connection)->hasTable($table_name);
    }


    #raw scope
    public function raw(string $query, string $connection = 'default'): \Illuminate\Database\Query\Expression
    {
        $connection = $connection == 'default' ? (!is_null($this->db_connection) ? $this->db_connection : config('database.default')) : $connection;

        return $this->connection($connection)->raw($query);
    }


    #select scope
    public function select(string $query, string $connection = 'default'): \Illuminate\Database\Query\Expression
    {
        $connection = $connection == 'default' ? (!is_null($this->db_connection) ? $this->db_connection : config('database.default')) : $connection;

        return $this->connection($connection)->select($query);
    }
    
}
