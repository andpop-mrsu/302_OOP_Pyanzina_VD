<?php

use PHPUnit\Framework\TestCase;
use App\BooksList;
use Task05\Book;

class BooksListIteratorTest extends TestCase
{
    public function testIteration()
    {
        $booksList = new BooksList();
        
        $book1 = new Book('Book One', ['Author1'], 'Publisher1', 2021);
        $book2 = new Book('Book Two', ['Author2'], 'Publisher2', 2022);
        $book3 = new Book('Book Three', ['Author3'], 'Publisher3', 2023);
        
        $booksList->add($book1)
                  ->add($book2)
                  ->add($book3);
        
        $expectedIds = [1, 2, 3];
        $collectedIds = [];
        $collectedTitles = [];
        
        foreach ($booksList as $id => $book) {
            $collectedIds[] = $id;
            $collectedTitles[] = $book->getTitle();
        }
        
        $this->assertSame($expectedIds, $collectedIds);
        $this->assertSame(['Book One', 'Book Two', 'Book Three'], $collectedTitles);
    }
}