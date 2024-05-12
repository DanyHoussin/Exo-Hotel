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
        echo  '<span style="background-color: rgb(67, 182, 87); color:white;">'.count($this->reservations)." RESERVATIONS".'</span>'."<br>";
        foreach($this->reservations as $reservation) {
            echo $reservation->getClient()->getFirstName()." ".$reservation->getClient()->getLastName()." - Chambre ".$reservation->getBedroom()->getID() ." - du ".$reservation->getDateStart()->format('d/m/Y')." au ".$reservation->getDateEnd()->format('d/m/Y')."<br>";
        }
        } else {
            echo '<h2>'."Réservations de ".$this->getHotelName()." <br>".'</h2>';
            echo "Aucune réservation !";
        }
    }

    public function displayArrayReservation(){
        $result = "<table>
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

        $result .= "<tr>
                        <td>Chambre ".$bedroom->getID()."</td>
                        <td>".$bedroom->getPrice()."</td>
                        <td>".$bedroom->getWifi()."</td>
                        
                    </tr>";
                    }
                    
                    $result .= "</tbody></table>";
    echo $result;
}

}

    
// if($bedroom->getAvaliable() == "Yes"){
//     "<td>".'<span style="background-color: rgb(67, 182, 87); color:white;">DISPONIBLE</span>'."<br>";
// } else {
//     "<td>".'<span style="background-color: rgb(67, 182, 87); color:white;">RESERVEE</span>'."<br>";
// }