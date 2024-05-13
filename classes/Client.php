<?php


class Client {

    private string $_firstName;
    private string $_lastName;
    private array $reservations = array();


    public function __construct(string $firstName, string $lastName) {
        $this->_firstName = $firstName;
        $this->_lastName = $lastName;
    }

    public function getFirstName() {
        return $this->_firstName;
    }
    public function getLastName() {
        return $this->_lastName;
    }


    public function setFirstName(string $firstName) {
        $this->_firstName = $firstName;
    }
    public function setLastName(string $lastName) {
        $this->_lastName = $lastName;
    }

    public function addReservation(Reservation $reservation){
        $this->reservations[] = $reservation;
    }

    public function displayReservation(){
        if(count($this->reservations) > 0){
            $result = '<h2>'."Réservations de $this<br>".'</h2>';
            $result .=  '<span class=green>'.count($this->reservations)." RESERVATIONS".'</span>'."<br>";
        foreach($this->reservations as $reservation) {
            $result .= $reservation->getBedroom()->getHotelName()." / Chambre : ".$reservation->getBedroom()." (".$reservation->getBedroom()->getNbBed()." lits - ".$reservation->getBedroom()->getPrice()." € - Wifi : ";
            if($reservation->getBedroom()->getWifi()){
                $result .= "Oui ";
            } else {
                $result .= "Non ";
            }
            $result .= ") du $reservation<br>";
        }
        } else {
            $result .= '<h2>'."Réservations de $this <br>".'</h2>';
            $result .= "Aucune réservation !";
        }
        return $result;
    }

    public function __toString() {
        return $this->getFirstName() ." ". $this->getLastName();
    }
}

    