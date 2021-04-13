<?php
namespace Kibo\PhpCsFixer;

class Config {
    public static function create(string $root): \PhpCsFixer\Config {
        $config = new \PhpCsFixer\Config();
        $config->setFinder(self::createFinder($root));
        $config->setRules([
            '@PSR1' => true,
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
            'braces' => ['position_after_functions_and_oop_constructs' => 'same'],
            'cast_spaces' => true,
            'class_attributes_separation' => true,
            'concat_space' => ['spacing' => 'one'],
            'include' => true,
            'new_with_braces' => true,
            'no_superfluous_elseif' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unused_imports' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'no_whitespace_before_comma_in_array' => true,
            'no_whitespace_in_blank_line' => true,
            'ordered_imports' => true,
            'return_assignment' => true,
            'return_type_declaration' => true,
            'single_quote' => true,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline_array' => true,
            'trim_array_spaces' => true,
        ]);
        return $config;
    }

    public static function createFinder(string $root): \Traversable {
        return new GitFinder($root);
    }
}
