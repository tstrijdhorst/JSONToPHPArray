<?php

use JTPAC\JSONToPHPArrayConverter;

require_once 'vendor/autoload.php';

$stdin = stream_get_contents(fopen('php://stdin', 'r'));
echo (new JSONToPHPArrayConverter())->convert($stdin);