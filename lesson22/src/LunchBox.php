<?php

namespace Styde;

use Countable;
use ArrayIterator;
use IteratorAggregate;
use JetBrains\PhpStorm\Pure;

class LunchBox implements IteratorAggregate, Countable
{
    protected array $food = [];

    protected bool $original = true;

    public function __construct(array $food = [])
    {
        $this->food = $food;
    }

    public function __clone()
    {
        $this->original = false;
    }

    public function all(): array
    {
        return $this->food;
    }

    public function filter($callback): self
    {
        return new self(array_filter($this->food, $callback));
    }

    public function shift()
    {
        return array_shift($this->food);
    }

    public function isEmpty(): bool
    {
        return empty($this->food);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->food);
    }

    #[Pure] public function count(): int
    {
        return count($this->food);
    }
}



