<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $coordinateY; 
    private int $coordinateX; 

    public function __construct(int $coordinateX, int $coordinateY, string $direction) {
        $this->direction = $direction;
        $this->coordinateY = $coordinateY;
        $this->coordinateX = $coordinateX;
    }

    public function playCommandsSequence(string $commandsSequence): bool {
        $commandsSequenceArray = str_split($commandsSequence);

        if($this->analyzeCommandsSequence($commandsSequenceArray)) {
            return true;
        }

        return false;
    }

    private function analyzeCommandsSequence(array $commandsSequence): bool {
        foreach($commandsSequence as $commandLine) {
            if($commandLine !== 'l' || $commandLine !== 'r')
            {
                if(!$this->modifyCoordinate($commandLine)) {
                    return false;
                }
            } else {
                if(!$this->modifyDirection($commandLine)) {
                    return false;
                }
            }
        }
        return true;
    }

    private function modifyCoordinate(string $commandLine): bool {
        $displacement = $commandLine === 'f' ? 1 : -1;

        if ($this->direction === 'N') {
            $this->coordinateY += $displacement;
            return true;
        } else if ($this->direction === 'S') {
            $this->coordinateY -= $displacement;
            return true;
        } else if ($this->direction === 'W') {
            $this->coordinateX -= $displacement;
            return true;
        } else if($this->direction === "E"){
            $this->coordinateX += $displacement;
            return true;
        }

        return false;
    }

    private function modifyDirection(string $commandLine): bool {
        if ($commandLine === 'l' ) {
            if ($this->direction === 'N') {
                $this->direction = 'W';
                return true;
            } else if ($this->direction === 'S') {
                $this->direction = 'E';
                return true;
            } else if ($this->direction === 'W') {
                $this->direction = 'S';
                return true;
            } else {
                $this->direction = 'N';
                return true;
            }
        } elseif($commandLine === 'r') {
            if ($this->direction === 'N') {
                $this->direction = 'E';
                return true;
            } else if ($this->direction === 'S') {
                $this->direction = 'W';
                return true;
            } else if ($this->direction === 'W') {
                $this->direction = 'N';
                return true;
            } else {
                $this->direction = 'S';
                return true;  
            }          
        }
        return false;
    }
}
