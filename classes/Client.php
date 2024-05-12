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
        echo '<h2>'."Réservations de ".$this->getFirstName() ." ". $this->getLastName()." <br>".'</h2>';
        echo  '<span style="background-color: rgb(67, 182, 87); color:white;">'.count($this->reservations)." RESERVATIONS".'</span>'."<br>";
        foreach($this->reservations as $reservation) {
            echo $reservation->getBedroom()->getHotelName()." / Chambre : ".$reservation->getBedroom()->getID()." (".$reservation->getBedroom()->getNbBed()." lits - ".$reservation->getBedroom()->getPrice()." € - Wifi : ".$reservation->getBedroom()->getWifi().") du ".$reservation->getDateStart()->format('d-m-Y')." au ".$reservation->getDateEnd()->format('d-m-Y')."<br>";
        }
        } else {
            echo '<h2>'."Réservations de ".$this->getHotelName()." <br>".'</h2>';
            echo "Aucune réservation !";
        }
    }


}

    