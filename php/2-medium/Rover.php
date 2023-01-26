<?php

/* 
Dans la méthode `receive()`, je remplace la série de if/else par un tableau associatif nommé `directions`.
Ce tableau associe la direction du rover à un tableau contenant les deux directions possibles
soit la gauche ou la droite.
Je remplace aussi la série de if/else par un tableau associatif nommé `movement`
ce qui permet d'associer la direction du rover à un tableau contenant les coordonnées
sur les axes x et y.
Enfin je remplace la dernière série de if/else qui détermine le déplacement
du rover par un opérateur ternaire qui vérifie la direction actuelle du rover
et multiplie la direction par 1 ou -1 selon la direction du rover.
*/

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }



    public function receive(string $commandsSequence): void
    {
        $directions = ["N" => ["W", "E"], "S" => ["E", "W"], "W" => ["S", "N"], "E" => ["N", "S"]];
        $movement = ["f" => [0, 1], "b" => [0, -1]];
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if (array_key_exists($command, $directions)) {
                $this->direction = $directions[$this->direction][$command === "r" ? 1 : 0];
            } elseif (array_key_exists($command, $movement)) {
                [$x, $y] = $movement[$command];
                if ($this->direction === "N" || $this->direction === "S") {
                    $this->y += $y * ($this->direction === "S" ? -1 : 1);
                } else {
                $this->x += $x * ($this->direction === "W" ? -1 : 1);
                }
            }
        }
    }

/*     public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                if ($this->direction === "N") {
                    if ($command === "r") {
                        $this->direction = "E";
                    } else {
                        $this->direction = "W";
                    }
                } else if ($this->direction === "S") {
                    if ($command === "r") {
                        $this->direction = "W";
                    } else {
                        $this->direction = "E";
                    }
                } else if ($this->direction === "W") {
                    if ($command === "r") {
                        $this->direction = "N";
                    } else {
                        $this->direction = "S";
                    }
                } else {
                    if ($command === "r") {
                        $this->direction = "S";
                    } else {
                        $this->direction = "N";
                    }
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    } */
}