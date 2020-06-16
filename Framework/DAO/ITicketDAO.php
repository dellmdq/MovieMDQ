<?php
namespace DAO;
use Models\Ticket as Ticket;
use DAO\Connection as Connection;
interface ITicketDAO
{
    function Add(Ticket $ticket);
    function GetAll();

}
?>