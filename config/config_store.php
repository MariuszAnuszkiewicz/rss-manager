<?php

require_once("config.php");


// database

Config::set('db.host', 'localhost');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'rss');


// select time remove

Config::set('set_10_days', '10');
Config::set('set_20_days', '20');
Config::set('set_30_days', '30');


?>