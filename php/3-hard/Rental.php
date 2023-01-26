<?php

declare(strict_types=1);


namespace App;


class Rental
{
    public function __construct(Movie $movie, int $daysRented)
    {
    $this->movie = $movie;
    $this->daysRented = $daysRented;
    }
    
    public function getDaysRented(): int
    {
        return $this->daysRented;
    }
    
    public function getMovie(): Movie
    {
        return $this->movie;
    }
    
    public function getTitle(): string
    {
        return $this->movie->getTitle();
    }
    
    public function calculateRentalAmount(): float
    {
        return $this->movie->calculateRentalAmount($this->daysRented);
    }
    
    public function calculateFentRenterPoints(): int
    {
    return $this->movie->calculateFrequentRenterPoints($this->daysRented);
    }
    
    private Movie $movie;
    private int $daysRented;
    }
    
    
/* {
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    private Movie $movie;
    private int $daysRented;
} */