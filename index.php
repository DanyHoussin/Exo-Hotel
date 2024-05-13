<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Exo_Hotel</title>
</head>
<body>
    


<?php

spl_autoload_register(function ($class_name) {
    require 'classes/'. $class_name . '.php';
});

$hotel1 = new Hotel("Hilton **** Strasbourg", "10 route de la Gare 67000 STRASBOURG");
$hotel2 = new Hotel("Regent **** Paris", "Avenue jsp");
$bedroom1 = new Bedroom(1, $hotel1, 2, FALSE, 120, FALSE);
$bedroom2 = new Bedroom(2, $hotel1, 3, TRUE, 300, TRUE);
$bedroom3 = new Bedroom(3, $hotel1, 5, TRUE, 500, FALSE);
$bedroom4 = new Bedroom(4, $hotel1, 7, TRUE, 700, TRUE);
$bedroom5 = new Bedroom(5, $hotel1, 9, TRUE, 900, FALSE);

$client1 = new Client ("Mathieu", "Osef");
$client2 = new Client ("Kamel", "Roland");
$reservation1 = new Reservation($client1, $bedroom1, "2024-02-23", "2024-03-23");
$reservation2 = new Reservation($client2, $bedroom3, "2024-02-15", "2024-03-15");
$reservation3 = new Reservation($client1, $bedroom5, "2024-03-16", "2024-04-16");


echo $hotel1->getHotelName()."<br>";

echo $hotel1->displayBedrooms()."<br>";

echo $hotel1->displayReservation()."<br>";
echo $hotel2->displayReservation()."<br>";

echo $client1->displayReservation()."<br>";

echo $client2->displayReservation()."<br>";

echo $hotel1->displayArrayReservation()."<br>";

?>

</body>
</html>