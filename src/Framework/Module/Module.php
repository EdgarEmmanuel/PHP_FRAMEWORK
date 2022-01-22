<?php
namespace Framework\Module;


class Module{


    /**
     * the variable specifying the definition for the dependency injection
     */
    const DEFINITIONS = null;


    /**
     * the varibale specifying the path for the migrations
     */
    const MIGRATIONS = [];

    /**
     * the variable for the database credentials
     */
    const DB_CONFIG = [
        'database.type' => 'mysql',
        'database.host' => '127.0.0.1',
        'database.name' => 'db_my_php_framework',
        'database.user' => 'root',
        'database.password' => ''
    ];


}
