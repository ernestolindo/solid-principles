<?php

abstract class Shape
{
    abstract function getArea();
}

class Rectangle extends Shape
{
    private $width;
    private $height;

    function __construct($width, $height)
    {
        if ($width <= 0 || $height <= 0) {
            throw new InvalidArgumentException("Width and height must be greater than 0.");
        }
        $this->width = $width;
        $this->height = $height;
    }

    function getArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Shape
{
    private $side;

    function __construct($side)
    {
        if ($side <= 0) {
            throw new InvalidArgumentException("Side must be greater than 0.");
        }
        $this->side = $side;
    }

    function getArea()
    {
        return $this->side * $this->side;
    }
}

function printArea(Shape $shape)
{
    echo "Area of the shape is " . $shape->getArea() . "\n";
}

$rectangle = new Rectangle(10, 5); // Width = 10, Height = 5
$square = new Square(4);          // Side = 4

printArea($rectangle); // Output: Area of the shape is 50
printArea($square);    // Output: Area of the shape is 16
