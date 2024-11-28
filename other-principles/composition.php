<?php

class Dimensions
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        if ($width <= 0 || $height <= 0) {
            throw new InvalidArgumentException("Dimensions must be greater than 0.");
        }
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}

interface Shape
{
    public function getArea();
}

class Rectangle implements Shape
{
    private $dimensions;

    public function __construct($width, $height)
    {
        $this->dimensions = new Dimensions($width, $height);
    }

    public function getArea()
    {
        return $this->dimensions->calculateArea();
    }
}

class Square implements Shape
{
    private $dimensions;

    public function __construct($side)
    {
        $this->dimensions = new Dimensions($side, $side);
    }

    public function getArea()
    {
        return $this->dimensions->calculateArea();
    }
}

function printArea(Shape $shape)
{
    echo "Area of the shape is: " . $shape->getArea() . "\n";
}

$rectangle = new Rectangle(10, 5); // Width = 10, Height = 5
$square = new Square(4);          // Side = 4

printArea($rectangle); // Output: Area of the shape is: 50
printArea($square);    // Output: Area of the shape is: 16
