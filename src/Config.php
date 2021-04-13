<?php
namespace Kibo\PhpCsFixer;

class Config
{
    public static function create(string $root): \PhpCsFixer\Config
    {
        $config = new \PhpCsFixer\Config();
        $config->setFinder(self::createFinder($root));
        return $config;
    }

    public static function createFinder(string $root): \Traversable
    {
        return new GitFinder($root);
    }
}
