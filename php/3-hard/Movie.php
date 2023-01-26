<?php

declare(strict_types=1);


namespace App;


class Movie
{
    public const CHILDREN = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;
    
    private string $title;
    private int $priceCode;
    
    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }
    
    public function getPriceCode(): int
    {
        return $this->priceCode;
    }
    
    public function setPriceCode(int $code)
    {
        return $this->priceCode = $code;
    }
    
    public function calculateRentalAmount(int $daysRented): float
    {
        switch($this->priceCode) {
            case self::REGULAR:
                $amount = 2;
                if($daysRented > 2)
                    $amount += ($daysRented - 2) * 1.5;
                break;
            case self::NEW_RELEASE:
                $amount = $daysRented * 3;
                break;
            case self::CHILDREN:
                $amount = 1.5;
                if($daysRented > 3) {
                    $amount += ($daysRented - 3) * 1.5;
                }
                break;
        }
    
        return $amount;
    }
    
    public function calculateFrequentRenterPoints(int $daysRented): int
    {
        if($this->priceCode == self::NEW_RELEASE
            && $daysRented > 1)
            return 2;
        return 1;
    }
}
/* {
    public const CHILDREN = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private string $title;
    private int $priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $code)
    {
        return $this->priceCode = $code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
} */