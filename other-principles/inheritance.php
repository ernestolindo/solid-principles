<?php

class Rectangle
{
    protected $width;
    protected $height;

    public function __construct($width, $height)
    {
        if ($width <= 0 || $height <= 0) {
            throw new InvalidArgumentException("Dimensions must be greater than 0.");
        }
        $this->width = $width;
        $this->height = $height;
    }

    public function setWidth($width)
    {
        if ($width <= 0) {
            throw new InvalidArgumentException("Width must be greater than 0.");
        }
        $this->width = $width;
    }

    public function setHeight($height)
    {
        if ($height <= 0) {
            throw new InvalidArgumentException("Height must be greater than 0.");
        }
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle
{
    public function __construct($side)
    {
        parent::__construct($side, $side);
    }

    public function setWidth($side)
    {
        parent::setWidth($side);
        parent::setHeight($side);
    }

    public function setHeight($side)
    {
        parent::setWidth($side);
        parent::setHeight($side);
    }
}

// Testing
function printArea(Rectangle $shape)
{
    echo "Area of the shape is: " . $shape->getArea() . "\n";
}

$rectangle = new Rectangle(10, 5);
$square = new Square(4);

printArea($rectangle); // Output: Area of the shape is: 50
printArea($square);    // Output: Area of the shape is: 16

$square->setWidth(6);
printArea($square);    // Output: Area of the shape is: 36
