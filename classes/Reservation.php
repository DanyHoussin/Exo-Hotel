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


    public function setDateStart(string $dateStart) {
        $this->_dateStart = new DateTime($dateStart);
    }
    public function setDateEnd(string $dateEnd) {
        $this->_dateEnd = new DateTime($dateEnd);
    }


}

    