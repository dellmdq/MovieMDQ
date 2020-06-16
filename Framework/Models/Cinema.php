<?php
namespace Models;
class Cinema{
    
    private $id;
    private $name;
    private $address;
    private $capacity;
    private $ticketPrice;
    private $roomList;

    
    
    public function setName($name)
    {
        $this->name=$name;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function setAddress($address){

        $this->address=$address;

    }

    public function setCapacity($capacity){
        $this->capacity=$capacity;
    }

    public function setTicketPrice($ticketPrice){
        $this->ticketPrice=$ticketPrice;
    }

    public function setRoomList($roomList)
    {
        $this->roomList=$roomList;
    }

    public function getRoomList(){
        return $this->roomList;
    }


    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCapacity(){
        return $this->capacity;
    }

    public function getId(){
        return $this->id;
    }

    public function getTicketPrice(){
        return $this->ticketPrice;
    }

}
?>