<style>
.green {
    padding: 3px; 
    background-color: rgb(67, 182, 87); 
    color:white; 
    border-radius: 2px;
}

.red {
    padding: 3px; 
    background-color: red; 
    color:white; 
    border-radius: 2px;
}

table {
  width: 50%;
  height: 300px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: rgb(240, 240, 240);
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php


class Hotel {

    private string $_hotelName;
    private string $_address;
    private array $bedrooms = array();
    private array $reservations = array();


    public function __construct(string $hotelName, string $address) {
        $this->_hotelName = $hotelName;
        $this->_address = $address;
    }

    public function getHotelName() {
        return $this->_hotelName;
    }
    public function getAddress() {
        return $this->_address;
    }


    public function setHotelName(string $hotelName) {
        $this->_hotelName = $hotelName;
    }
    public function setAddress(string $address) {
        $this->_address = $address;
    }

    public function addBedroom(Bedroom $bedroom){
        $this->bedrooms[] = $bedroom;
    }
    public function addReservation(Reservation $reservation){
        $this->reservations[] = $reservation;
    }


    public function displayBedrooms(){
        echo '<h2>'.$this->getHotelName()." <br>".'</h2>';
        echo $this->getAddress()." <br>";
        $nbBedroomAvaliable = count($this->bedrooms);
        $nbBedroomReserved = 0;
        echo "Nombre de chambres : $nbBedroomAvaliable <br>";
            foreach($this->bedrooms as $bedroom) {
                if($bedroom->getAvaliable() == "No") { 
                    $nbBedroomReserved = $nbBedroomReserved + 1;
                    $nbBedroomAvaliable = $nbBedroomAvaliable - 1;
                } else {

                }
            }
        echo "Nombre de chambres réservées : $nbBedroomReserved <br>";
        echo "Nombre de chambres dispo : $nbBedroomAvaliable <br>";
    }

    public function displayReservation(){
        if(count($this->reservations) > 0){
        echo '<h2>'."Réservations de ".$this->getHotelName()." <br>".'</h2>';
        echo  '<span class=green>'.count($this->reservations)." RESERVATIONS".'</span>'."<br>";
        foreach($this->reservations as $reservation) {
            echo $reservation->getClient()->getFirstName()." ".$reservation->getClient()->getLastName()." - Chambre ".$reservation->getBedroom()->getID() ." - du ".$reservation->getDateStart()->format('d/m/Y')." au ".$reservation->getDateEnd()->format('d/m/Y')."<br>";
        }
        } else {
            echo '<h2>'."Réservations de ".$this->getHotelName()." <br>".'</h2>';
            echo "Aucune réservation !";
        }
    }

    public function displayArrayReservation(){
        echo "<table width=50% height=200px>
                <thead>
                    <tr>
                        <th>CHAMBRE</th>
                        <tH>PRIX</th>
                        <tH>WIFI</th>
                        <tH>ETAT</th>
                    </tr>
                </thead>
            <tbody>";
        foreach($this->bedrooms as $bedroom) {
            echo "<tr>
                <td>Chambre ".$bedroom->getID()."</td>
                <td>".$bedroom->getPrice()." €</td>";
                if($bedroom->getWifi() === TRUE){
                    echo "<td>".'<i class="fa-solid fa-wifi"></i>'."</td>";
                } else {
                    echo "<td></td>";
                }

                if($bedroom->getAvaliable() === TRUE){
                    echo "<td>".'<span class=green>DISPONIBLE</span>'."</td>";
                } else {
                    echo "<td>".'<span class=red>RESERVEE</span>'."</td>";
                }
                "</tr>";
            }
                    
                    
}

}

    