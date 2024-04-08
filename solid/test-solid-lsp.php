<?php

//LSP example - wrong example

class Bird {
    public function fly() {
        echo 'I can fly';
    }
}

class Penguin extends Bird {
    public function fly() {
        echo 'I can\'t fly';
    }
}

function makeBirdFly(Bird $bird) {
    $bird->fly();
}

$bird = new Penguin();

makeBirdFly($bird);

// Output: I can't fly
// Explanation: The Penguin class is not able to fly, so the makeBirdFly function should not be able to make it fly. This is a violation of the Liskov Substitution Principle.

//LSP example - correct example

class Bird {
    public function fly() {
        echo 'I can fly';
    }
}

class Penguin extends Bird {
    public function fly() {
        throw new Exception('I can\'t fly');
    }
}

function makeBirdFly(Bird $bird) {
    $bird->fly();
}

$bird = new Bird();

makeBirdFly($bird);

// Output: I can fly
// Explanation: The Penguin class is not able to fly, so the makeBirdFly function should not be able to make it fly. This is a violation of the Liskov Substitution Principle.
// In this example, the Penguin class throws an exception when the fly method is called, which is the correct behavior. The makeBirdFly function is able to handle this exception and the Liskov Substitution Principle is not violated.

//LSP example - correct example2
class Animal {
}

class Bird extends Animal {
    public function fly() {
    }
}
class Sparrow extends Bird {
}

class Penguin extends Animal {
}
