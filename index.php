<?php

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

$hotel1 = new Hotel("Hilton **** Strasbourg", "Avenue jsp");
$hotel2 = new Hotel("Regent **** Paris", "Avenue jsp");
$bedroom1 = new Bedroom(1, $hotel1, 2, "No", 120, "No");
$bedroom2 = new Bedroom(2, $hotel1, 3, "Yes", 300, "Yes");
$bedroom3 = new Bedroom(3, $hotel1, 5, "Yes", 500, "No");
$bedroom4 = new Bedroom(4, $hotel1, 7, "Yes", 700, "Yes");
$bedroom5 = new Bedroom(5, $hotel1, 9, "Yes", 900, "No");

$client1 = new Client ("Mathieu", "Osef");
$client2 = new Client ("Roland", "Molang");
$reservation1 = new Reservation($client1, $bedroom1, "2024-02-23", "2024-03-23");
$reservation2 = new Reservation($client2, $bedroom3, "2024-02-15", "2024-03-15");
$reservation3 = new Reservation($client1, $bedroom5, "2024-03-16", "2024-04-16");


echo $hotel1->getHotelName()."<br/>";

echo $hotel1->displayBedrooms()."<br/>";

echo $hotel1->displayReservation()."<br/>";
echo $hotel2->displayReservation()."<br/>";

echo $client1->displayReservation()."<br/>";

echo $hotel1->displayArrayReservation()."<br/>";