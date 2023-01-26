<?php

/* 
Pour refactoriser ce code, j'ai tout d'abord extrait le calcul du Rental présent dans la méthode
statement de la class `Customer` dans une méthode séparé, nommé `calculateRentalAmount()`
que j'ai placé dans la class `Movie` afin de le rendre plus lisible et modulable. 
Puis j'ai refactorisé le switch en créant une méthode dans la class `Movie` qui calcule
le Rental pour un film spécifique, méthode que j'appelle dans `calculateRentalAmount()`. 
Enfin, la méthode qui retourn le titre d'un film peut être placée dans la class `Rental`
afin que la class `Customer` n'ait pas de référence direct a un film.
Ces modifications permettent de faciliter les changements ou ajouts à logique sans affecter le reste du code.
*/

declare(strict_types=1);


namespace App;


class Customer
{
    public function __construct(string $name, array $rentals)
    {
        $this->name = $name;
        $this->rentals = $rentals;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string {
        return $this->generateStatement();
    }

    private function generateStatement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->rentals as $each){
            $thisAmount = $each->calculateRentalAmount();
            $frequentRenterPoints += $each->calculateFrequentRenterPoints();
    
            $result .= "\t" . $each->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;
        }
    
        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";
    
        return $result;
    }
    
    private string $name;
    private array $rentals = [];
}

/* {
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $each){
           $thisAmount = 0.0;

           // determines the amount for each line
           switch($each->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if($each->getDaysRented() > 2)
                       $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $each->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if($each->getDaysRented() > 3) {
                       $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           $frequentRenterPoints++;

           if($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $each->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $each->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    private string $name;
    private array $rentals = [];
} */