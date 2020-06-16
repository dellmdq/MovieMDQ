<?php


namespace Models;


class Ticket
{
    private $idTicket;
    //private $date; //(lo trae el show)
    //private $time; //(lo trae el show)
    private $price; //(lo trae el cine)
    private $show;
    private $user;
    private $quantity;
    private $subtotal;

    public function getIdTicket()
    {
        return $this->idTicket;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setIdTicket($idTicket)
    {
        $this->idTicket = $idTicket;
    }

    public function getShow()
    {
        return $this->show;
    }

    public function setShow($show)
    {
        $this->show = $show;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;
    }


}
?>