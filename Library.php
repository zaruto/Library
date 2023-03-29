<?php

require_once('Book.php');

class Library
{
    private $books = array();

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book)
    {
        foreach ($this->books as $key => $b) {
            if ($b->getISBN() === $book->getISBN()) {
                unset($this->books[$key]);
                break;
            }
        }
    }

    public function searchBooks($searchTerm, $searchType)
    {
        $results = array();
        foreach ($this->books as $book) {
            switch ($searchType) {
                case 'title':
                    if (strpos(strtolower($book->getTitle()), strtolower($searchTerm)) !== false) {
                        $results[] = $book;
                    }
                    break;
                case 'author':
                    if (strpos(strtolower($book->getAuthor()), strtolower($searchTerm)) !== false) {
                        $results[] = $book;
                    }
                    break;
                case 'genre':
                    if (strpos(strtolower($book->getGenre()), strtolower($searchTerm)) !== false) {
                        $results[] = $book;
                    }
                    break;
                case 'isbn':
                    if ($book->getISBN() == $searchTerm) {
                        $results[] = $book;
                    }
                    break;
            }
        }
        return $results;
    }

    /**
     * @throws Exception
     */
    public function borrowBook(Book $book)
    {
        $book->borrow();
    }

    public function returnBook(Book $book)
    {
        $book->returnBook();
    }

    public function getAllBooks()
    {
        return $this->books;
    }

    public function getAvailableBooks()
    {
        $availableBooks = array();
        foreach ($this->books as $book) {
            if ($book->isAvailable()) {
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }

    public function getBorrowedBooks($user)
    {
        $borrowedBooks = array();
        foreach ($this->books as $book) {
            if (!$book->isAvailable() && $book->getBorrower() == $user) {
                $borrowedBooks[] = $book;
            }
        }
        return $borrowedBooks;
    }
}
