<?php

namespace Arabasta\Interface;

interface DatabaseInterface 
{
    /**
     * manual load connection db
     *
     * @param string $connection
     */
    public function connection(string $connection = 'default'): \Illuminate\Database\ConnectionInterface;

    /**
     * manual load table w/o model
     *
     * @param  string  $table_name
     * @param string $connection
     * @return 
     */
    public function table(string $table_name, string $connection = 'default'): \Illuminate\Database\Query\Builder;

    /**
     * check database has table or not
     *
     * @param string $table_name
     * @param string $connection (optional connection)
     * @return bool
     */
    public function has_table(string $table_name, string $connection = 'default'): bool;

    /**
     * @param  string  $query
     * @param string $connection
     */
    public function raw(string $query, string $connection = 'default'): \Illuminate\Database\Query\Expression;

    /**
     * @param  string  $query
     * @return 
     */
    public function select(string $query, string $connection = 'default'): \Illuminate\Database\Query\Expression;
    
}
