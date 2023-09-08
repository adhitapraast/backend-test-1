<?php

/**
 * Question 4
 * 
 * Simple Question Class OOP
 */

// abstract ship class with properties and methods
abstract class Ship {

    // constructor to initialize properties
    public function __construct(
        // encapsulation properties
        public string $name, 
        public float $length,
        public string $color = "white", 
    ) {
        //
    }

    // abstract methods for polymorphism
    abstract public function shipCategory(): string;
    abstract public function engineType(): string;
    abstract public function sail(): string;
}

// inheriting from Ship class
class MotorBoat extends Ship {
    private bool $hasSails;

    // Polymorphism the shipCategory from ship class
    public function shipCategory(): string {
        return "{$this->color} {$this->name} {$this->length}m is the ship for performance category.\n";
    }

    // Polymorphism the engineType from ship class
    public function engineType():string {
        return "{$this->color} {$this->name} has racing engine.\n";
    }

    // Polymorphism the sail from ship class
    public function sail(): string {
        $this->hasSails = false;
        if ($this->hasSails) {
            return "{$this->color} {$this->name} motorboat have sail.\n";
        } else {
            return "{$this->color} {$this->name} motorboat can only sail using engine.\n";
        }
    }
}

// inheriting from Ship class
class Sailboat extends Ship {

    // Polymorphism the shipCategory from ship class
    public function shipCategory(): string {
        return "{$this->color} {$this->name} {$this->length}m is the ship propelled by sail.\n";
    }

    // Polymorphism the engineType from ship class
    public function engineType():string {
        return "{$this->color} {$this->name} has no engine.\n";
    }

    // Polymorphism the sail from ship class
    public function sail(): string {
        return "{$this->color} {$this->name} sailboat sailup and start sailing.\n";
    }
}

// inheriting from Ship class
class Yacht extends Ship {

    // Polymorphism the shipCategory from ship class
    public function shipCategory(): string {
        return "{$this->color} {$this->name} {$this->length}m is the luxury ship for traveling around.\n";
    }

    // Polymorphism the engineType from ship class
    public function engineType():string {
        return "{$this->color} {$this->name} has engine to sail.\n";
    }

    // Polymorphism the sail from ship class
    public function sail(): string {
        return "{$this->color} {$this->name} yacht can sailing with both engine or sail.\n";
    }
}

echo "<pre>";
echo "<h1>Question 4</h1>";

// example usage & test cases
$motorBoat = new MotorBoat("Fletcher Boats Arrow", 4.5, "Black");
echo $motorBoat->shipCategory();
echo $motorBoat->engineType();
echo $motorBoat->sail();
echo "<br>";

$sailboat = new Sailboat("Schooner", 46, "White-black");
echo $sailboat->shipCategory();
echo $sailboat->engineType();
echo $sailboat->sail();
echo "<br>";

$yacht = new Yacht("Koru", 127);
echo $yacht->shipCategory();
echo $yacht->engineType();
echo $yacht->sail();