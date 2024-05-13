<?php


class Reservation {

    private Client $_client;
    private Bedroom $_bedroom;
    private DateTime $_dateStart;
    private DateTime $_dateEnd;



    public function __construct(Client $client, Bedroom $bedroom, string $dateStart, string $dateEnd) {
        $this->_client = $client;
        $this->_bedroom = $bedroom;
        $this->_dateStart = new DateTime($dateStart);
        $this->_dateEnd = new DateTime($dateEnd);
        $this->_bedroom->getHotel()->addReservation($this);
        $this->_client->addReservation($this);
    }

    public function getClient() {
        return $this->_client;
    }
    public function getBedroom() {
        return $this->_bedroom;
    }
    public function getDateStart() {
        return $this->_dateStart;
    }
    public function getDateEnd() {
        return $this->_dateEnd;
    }


    public function setClient(Client $client) {
        $this->_client = $client;
    }
    public function setBedroom(Bedroom $bedroom) {
        $this->_bedroom = $bedroom;
    }
    public function setDateStart(string $dateStart) {
        $this->_dateStart = new DateTime($dateStart);
    }
    public function setDateEnd(string $dateEnd) {
        $this->_dateEnd = new DateTime($dateEnd);
    }

    public function __toString() {
        return $this->getDateStart()->format('d-m-Y')." au ".$this->getDateEnd()->format('d-m-Y');
    }

}

    