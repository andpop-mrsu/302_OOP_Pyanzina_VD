<?php

namespace App;

class Stack implements StackInterface
{
    private array $elements = [];

    public function __construct(...$elements)
    {
        $this->elements = $elements;
    }

    public function push(...$elements): void
    {
        array_unshift($this->elements, ...$elements);
    }

    public function pop()
    {
        return array_shift($this->elements) ?? null;
    }

    public function top()
    {
        return $this->elements[0] ?? null;
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function copy(): Stack
    {
        return new Stack(...$this->elements);
    }

    public function __toString(): string
    {
        return '[' . implode('->', $this->elements) . ']';
    }
}