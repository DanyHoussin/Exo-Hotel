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
        $result = "<h2>$this<br></h2>";
        $result .= $this->getAddress()." <br>";
        $nbBedroomAvaliable = count($this->bedrooms);
        $nbBedroomReserved = 0;
        $result .= "Nombre de chambres : $nbBedroomAvaliable <br>";
            foreach($this->bedrooms as $bedroom) {
                if($bedroom->getAvaliable() == "No") { 
                    $nbBedroomReserved = $nbBedroomReserved + 1;
                    $nbBedroomAvaliable = $nbBedroomAvaliable - 1;
                } else {

                }
            }
        $result .= "Nombre de chambres réservées : $nbBedroomReserved <br>";
        $result .= "Nombre de chambres dispo : $nbBedroomAvaliable <br>";
        return $result;
    }

    public function displayReservation(){
        if(count($this->reservations) > 0){
            $result =  "<h2>Réservations de $this<br></h2>";
            $result .=   '<span class=green>'.count($this->reservations)." RESERVATIONS".'</span>'."<br>";
        foreach($this->reservations as $reservation) {
            $result .=  $reservation->getClient()." - Chambre ".$reservation->getBedroom()." - du $reservation<br>";
        }
        } else {
            $result =  '<h2>'."Réservations de $this<br>".'</h2>';
            $result .=  "Aucune réservation !";
        }
        return $result;
    }

    public function displayArrayReservation(){
        $result = "<h2>Statuts des chambres de $this</h2>";
        $result .= "<table width=50% height=200px>
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
                <td>Chambre $bedroom</td>
                <td>".$bedroom->getPrice()." €</td>";
                if($bedroom->getWifi()){
                    $result .= "<td>".'<i class="fa-solid fa-wifi"></i>'."</td>";
                } else {
                    $result .= "<td></td>";
                }

                if($bedroom->getAvaliable()){
                    $result .= "<td>".'<span class=green>DISPONIBLE</span>'."</td>";
                } else {
                    $result .= "<td>".'<span class=red>RESERVEE</span>'."</td>";
                }
                "</tr>";
            }
        $result .= "</tbody></table>";
        return $result;
}

public function __toString() {
    return $this->getHotelName();
}


}

    