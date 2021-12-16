<?php
use Kibo\PhpCsFixer\Factory;

if (!class_exists(Factory::class)) {
    require_once __DIR__ . '/vendor/autoload.php';
}

return (new Factory(__DIR__))->config();
