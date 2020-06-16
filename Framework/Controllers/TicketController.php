<?php


namespace Controllers;
use Models\Ticket as Ticket;
use DAO\ShowDAODB as ShowDAODB;
use DAO\TicketDAODB as TicketDAODB;

class TicketController
{
    private $ticketDAODB;
    private $showDAODB;


     public function __construct()
     {

         $this->showDAODB = new ShowDAODB();
         $this->ticketDAODB = new TicketDAODB();



     }
    public function TicketToBuy($id_show)
    {
        $ticket = new Ticket();
        $price = $this->showDAODB->GetShow($id_show)->getRoom()->getCinema()->getTicketPrice();

        $ticket->setShow($this->showDAODB->GetShow($id_show));

        $ticket->setPrice($price);

        require_once(VIEWS_PATH."ticket-view.php");

    }

    public function Add($price, $quantity, $subtotal, $id_show){

        if($quantity!=0){

         $ticket = new Ticket();
         $ticket->setPrice($price);
         $ticket->setQuantity($quantity);
         $ticket->setSubtotal($subtotal);
         $ticket->setUser($_SESSION['usuarioLogueado']);


         $show = $this->showDAODB->GetShow($id_show);
         $ticket->setShow($show);

         $this->ticketDAODB->Add($ticket);

         //Mail de confirmación de compra.




         $this->ShowPrintView();
        }else
        {
            echo "<script> if(confirm('Error: Debe seleccionar al menos un ticket'));";  
                echo " </script>";
                $this->TicketToBuy($id_show);
        }
    }

    PUBLIC function ShowPrintView(){

         $id = $this->ticketDAODB->GetLastId();

         $ticket = new Ticket();
        $ticket=$this->ticketDAODB->GetTicket($id);
        require_once(VIEWS_PATH."ticket-final.php");
    }



}