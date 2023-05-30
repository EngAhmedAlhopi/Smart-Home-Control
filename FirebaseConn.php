<?php

require __DIR__ . 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile('../../../interfaceproject-97bb2-firebase-adminsdk-q2pu7-65a10880bd.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://interfaceproject-97bb2-default-rtdb.firebaseio.com/user')->create();
$database = $firebase->getDatabase();