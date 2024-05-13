<?php

class Bedroom {

    private int $_id;
    private Hotel $_hotel;
    private int $_nbBed;
    private bool $_wifi;
    private float $_price;
    private bool $_avaliable;



    public function __construct(int $id, Hotel $hotel, int $nbBed, bool $wifi, float $price, bool $avaliable) {
        $this->_id = $id;
        $this->_hotel = $hotel;
        $this->_nbBed = $nbBed;
        $this->_wifi = $wifi;
        $this->_price = $price;
        $this->_avaliable = $avaliable;
        $this->_hotel->addBedroom($this);
    }

    public function getID() {
        return $this->_id;
    }
    public function getNbBed() {
        return $this->_nbBed;
    }
    public function getWifi() {
        return $this->_wifi;
    }
    public function getPrice() {
        return $this->_price;
    }
    public function getAvaliable() {
        return $this->_avaliable;
    }
    public function getHotelName() {
        return $this->_hotel->getHotelName();
    }
    public function getHotel() {
        return $this->_hotel;
    }


    public function setID(int $id) {
        $this->_id = $id;
    }
    public function setNbBed(int $nbBed) {
        $this->_hotelName = $hotelName;
    }
    public function setWifi(bool $wifi) {
        $this->_wifi = $wifi;
    }
    public function setPrice(float $price) {
        $this->_price = $price;
    }
    public function setAvaliable(bool $avaliable) {
        $this->_avaliable = $avaliable;
    }

    public function __toString() {
        return $this->getID();
    }
}


    