<?php

class Book
{
    private $isbn;
    private $title;
    private $author;
    private $publicationDate;
    private $publisher;
    private $numberOfPages;
    private $genre;
    private $availability;

    public function __construct($isbn, $title, $author, $publicationDate, $publisher, $numberOfPages, $genre, $availability = true)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
        $this->publisher = $publisher;
        $this->numberOfPages = $numberOfPages;
        $this->genre = $genre;
        $this->availability = $availability;
    }

    public function getISBN()
    {
        return $this->isbn;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getNumberOfPages()
    {
        return $this->numberOfPages;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function isAvailable()
    {
        return $this->availability;
    }

    /**
     * @throws Exception
     */
    public function borrow()
    {
        if (!$this->availability) {
            throw new Exception("Book not available for borrowing");
        }
        $this->availability = false;
    }

    public function returnBook()
    {
        $this->availability = true;
    }
}
