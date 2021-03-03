<?php

use App\Core\App;
use App\Core\Database\Connection;

App::bind('config', require 'config.php');

App::bind('database', new culttt\Database(
    Connection::make(App::get('config')['database'])
));
