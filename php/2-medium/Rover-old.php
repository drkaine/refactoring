<?php

declare(strict_types=1);

namespace App;

// Remplacement des " en ' pour respecter les conventions et plus de propreté

class RoverOld
{
    private string $direction;
    private int $y; // Renommage de y en coordinateY
    private int $x; // Renommage de x en coordinateX

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    // Renommage en playCommandsSequence pour une meilleure compréhension du but de la fonction
    // Toutes les méthodes que je crée et après le refactoring de receive return true
    // Il faut éviter les fonctions qui ne retournent rien car on ne peut pas savoir si elles fonctionnent
    // Avec un retour en booléan on peut les tester et savoir si tous se passe bien
    public function receive(string $commandsSequence): void  
    {
        // Utilisation d'un foreach en remplaçant commandsSequenceLenght par
        // commandsSequenceArray en utilisant str_split pour transformer un string en array
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            // J'inverse la condition initiale 
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                // Extraxtion de cette partie pour réduire la méthode et respecter le SRP 
                // Single Responsibility Principle et pour éviter la redondance des if
                // Je sépare le if 'l' || 'r' en deux if, pas en else pour plus de sécurité 
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
                // Extraxtion de cette partie pour réduire la méthode et respecter le SRP 
                // Single Responsibility Principle
                // Je transforme la condition de $displacement en ternaire et supprime la variable
                // Temporaire $displacement1
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
    }
}