<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
$file = fopen('log.log', 'a+');
ftruncate($file, 0);
fclose($file);

include_once "logger.php";
include_once "table.php";
include_once "pizza.php";
include_once "drink.php";
include_once "side_dish.php";
include_once "pasta.php";
include_once "sparkling_drink.php";
include_once "water.php";
include_once "still_drink.php";
include_once "order.php";
include_once "unpaid_order_exception.php";


$table1 = new Table(1);
$table2 = new Table(2);
$table3 = new Table(3);
$table4 = new Table(4);

$pizzaCapricciosa = new Pizza('Capricciosa');
$pizzaCarbonara = new Pizza('Carbonara');
$pizzaItaliana = new Pizza('Italiana');
$pizzaSiciliana = new Pizza('Siciliana');

$pastaItaliana = new Pasta('Italiana');
$pastaCarbonara = new Pasta('Carbonara');
$pastaNapoletana = new Pasta('Napoletana');
$pastaArrabiata = new Pasta('Arrabbiata');
$pastaAglio = new Pasta('Aglio e olio');

$sideDishUrnebes = new SideDish('urnebes');
$sideDishKetchup = new SideDish('kechup');
$sideDishOrigano = new SideDish('origano');
$sideDishExtraCheese = new SideDish('extra cheese');
$sideDishGreenSalat = new SideDish('urnebes');

$drinkSparklingDrink = new SparklingDrink('Coca-Cola', 0.5);
$drinkMinaqua = new Water('Minaqua', 0.3);
$drinkJuice = new StillDrink('Juice', 0.25);

$order1 = $table1->createOrder([$pizzaCapricciosa, $sideDishKetchup, $sideDishOrigano, $pastaItaliana, $sideDishExtraCheese, $drinkSparklingDrink, $drinkSparklingDrink]);
$order2 = $table2->createOrder([$pizzaSiciliana, $pizzaCarbonara, $drinkJuice]);
$order3 = $table3->createOrder([$pizzaCapricciosa, $pizzaCapricciosa, $pizzaCapricciosa, $sideDishKetchup, $sideDishKetchup, $drinkSparklingDrink, $drinkJuice, $drinkMinaqua]);

$order1->payReciept();
$order3->payReciept();
try {
    $table2->createOrder([new Pizza('Capricciosa')]);
} catch (UnpaidOrderException $e) {
    echo $e;
}
$order2->payReciept();
$table2->createOrder([new Pizza('Capricciosa')]);
