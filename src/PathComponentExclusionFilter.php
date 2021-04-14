<?php
namespace Kibo\PhpCsFixer;

use IteratorAggregate;
use Traversable;

class PathComponentExclusionFilter implements IteratorAggregate {
    private $source;

    private $pattern;

    public function __construct(string $pathComponent, Traversable $source) {
        $this->source = $source;
        $this->pattern = sprintf('~(^|/)%s($|/)~', preg_quote($pathComponent, '~'));
    }

    public function getIterator(): \Generator {
        foreach ($this->source as $file) {
            if (!preg_match($this->pattern, $file->getPathname())) {
                yield $file;
            }
        }
    }
}
