<?php
namespace Kibo\PhpCsFixer;

use IteratorAggregate;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use SplFileInfo;

class GitFinder implements IteratorAggregate
{
    private $root;
    public function __construct(string $root)
    {
        $this->root = $root;
    }
    public function getIterator()
    {
        $proc = new Process(['git', 'ls-files', '*.php'], $this->root);
        $proc->start();
        foreach ($this->getLines($proc->getIterator(Process::ITER_SKIP_ERR)) as $line) {
            yield new SplFileInfo(sprintf('%s/%s', $this->root, trim($line)));
        }
        if ($proc->wait() !== 0) {
            throw new ProcessFailedException($proc);
        }
    }
    private function getLines(\Generator $generator): \Generator
    {
        $buffer = '';
        foreach ($generator as $chunk) {
            $buffer .= $chunk;
            while (($pos = strpos($buffer, "\n")) !== false) {
                yield substr($buffer, 0, $pos + 1);
                $buffer = substr($buffer, $pos + 1);
            }
        }
        if ($buffer !== '') {
            yield $buffer;
        }
    }
}
