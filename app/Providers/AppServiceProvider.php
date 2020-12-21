<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        global $DB;

        // Test la connexion à la base de données
        $host = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname =  config("database.connections.mysql.database");

        try {
            $db = new \PDO("mysql:host=$host;dbname=$dbname",$username,$password);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            require __DIR__.config("var.database_connection_failed");
            exit();
        }

        $DB = $db;

    }
}
