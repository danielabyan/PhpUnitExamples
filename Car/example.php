<?php
namespace Car;

use Car\Size\Large;
use Car\Type\Luxury;

require_once 'bootstrap.php';

$carBuilder = new CarBuilder();
$carBuilder->setBrandName("Mercedes SLC 550");
$carBuilder->setSize(new Large());
$carBuilder->setType(new Luxury());
$carBuilder->build();

$car = $carBuilder->getCar();

print_r($car->getPrice());

