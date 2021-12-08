<?php
namespace Kibo\PhpCsFixer;

use PhpCsFixer\Config;

class Factory {
    private $finder;

    public function __construct(string $root) {
        $this->finder = new GitFinder($root);
    }

    public function config(): Config {
        $config = new Config();
        $config->setFinder($this->finder);
        $config->setRules([
            '@PSR1' => true,
            '@PSR2' => true,
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
            'trailing_comma_in_multiline' => true,
            'trim_array_spaces' => true,
        ]);
        return $config;
    }

    public function exclude(string $pathComponent): self {
        $next = clone $this;
        $next->finder = new PathComponentExclusionFilter($pathComponent, $this->finder);
        return $next;
    }
}
