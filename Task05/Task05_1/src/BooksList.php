<?php

namespace App;

use Iterator;
use Task05\Book;

class BooksList implements Iterator
{
    private array $books = [];
    private int $position = 0;

    public function __construct()
    {
        $this->position = 0;
    }

    public function add(Book $book): self
    {
        $this->books[] = $book;
        return $this;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): ?Book
    {
        return $this->books[$n] ?? null;
    }

    public function store(string $fileName): void
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load(string $fileName): void
    {
        if (file_exists($fileName)) {
            $this->books = unserialize(file_get_contents($fileName));
        }
    }

    // Реализация методов интерфейса Iterator

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    /**
     * Ключом итерации является значение поля id объекта Book.
     */
    public function key(): int
    {
        return $this->books[$this->position]->getId();
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}
