<?php
$txt =' Raja Saab mubarak ho' ;
$check=true;
// txt data type checking
$dataType = gettype($txt);
strlen($txt);
echo "Length of txt is: ".strlen($txt);

echo strpos("Hello world!", "world");
echo "Data Type of txt is: ".$dataType;
$white="                    ho hye ";
echo "Before trim: ".$white;

echo "\nAfter trim: ".trim($white);
// split
 $str = "Hello world. It's a beautiful day.";
 print_r (explode(" ",$str));
$x = "Hello World!";
$y = explode(" ", $x);

//Use the print_r() function to display the result:
print_r($y);

$x = "Hello World!";
echo $x;
echo "\n";
echo strrev($x);
echo str_replace("World", "Dolly",$x);
$x = "Hello World!";
echo substr($x, -5, 3);
$x = 5985;
var_dump(is_numeric($x));

$x = "5985";
var_dump(is_numeric($x));
$x = "59.85" + 100;
var_dump(is_numeric($x));

$x = "Hello";
var_dump(is_numeric($x));
// Cast float to int
$x = 23465.768;
$int_cast = $x;
echo $int_cast;

echo "<br>";

// Cast string to int
$x = "23465.768";
$int_cast = (string)$x;
echo $int_cast;
//absolute positive value
echo(abs(-6.7));

echo(sqrt(81));

echo(round(0.60));
echo(round(0.79));
echo(rand(10, 100));
echo"\n";
echo(rand());
define("cars", [
    "Alfa Romeo \n",
    "BMW \n",
    "Toyota \n"
]);
echo cars[0];
echo cars[1];
echo cars[2];
?>