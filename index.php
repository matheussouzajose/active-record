<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Users;
use MatheusSouzaJose\ActiveRecordORM\Drivers\MySql;

$conn = new MySql();
$conn->connect([
    'server' => 'mysql',
    'database' => 'active_record',
    'user' => 'root',
    'password' => 'root',
    'options' => []
]);

$model = new Users($conn);
$model->first(1);
var_dump($model->first_name);
