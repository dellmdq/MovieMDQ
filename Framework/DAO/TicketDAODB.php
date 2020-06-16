<?php
namespace DAO;
use DAO\CinemaDAOBD as CinemaDAOBD;
use \Exception as Exception;
use DAO\ITicketDAO as ITicketDAO;

use Models\Cinema as Cinema;
use Models\Room as Room;
use Models\Ticket as Ticket;
use DAO\Connection as Connection;


class TicketDAODB implements ITicketDAO
{
    private $connection;
    private $tableName = "Tickets";
    private $showDAODB;

    public function __construct(){
        $this->showDAODB=new ShowDAODB();
    }

    public function Add(Ticket $ticket)
    {
        try
        {

            $query = "INSERT INTO ".$this->tableName." (ticket_price, id_show, ticket_quantity, ticket_subtotal, id_user) VALUES (:ticket_price, :id_show, :ticket_quantity, :ticket_subtotal, :id_user);";

            $parameters["ticket_price"] = $ticket->getPrice();
            $parameters["id_show"] = $ticket->getShow()->getId();
            $parameters["ticket_quantity"] = $ticket->getQuantity();
            $parameters["ticket_subtotal"] = $ticket->getSubtotal();
            $parameters["id_user"] = $ticket->getUser()->getId();



            $this->connection = Connection::GetInstance();


            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try
        {
            $ticketList = array();
            $query = "SELECT * FROM ".$this->tableName;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
            {
                $ticket = new Ticket();
                $ticket->setId($row["id_ticket"]);
                $ticket->setPrice($row["ticket_price"]);

                $show= $this->showDAODB->GetShow($row["id_show"]);
                $ticket->setShow($show);

                $ticket->setQuantity($row["ticket_quantity"]);
                $ticket->setSubtotal($row["ticket_subtotal"]);

                array_push($ticketList, $ticket);
            }
            return $ticketList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetTicket($id){
        try
        {


            $query = "SELECT * FROM ".$this->tableName." where id_ticket=$id;";
            //echo $query;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            //var_dump($resultSet);
            $ticket = new Ticket();

            foreach ($resultSet as $row){

                $ticket->setIdTicket($row["id_ticket"]);
                $ticket->setPrice($row["ticket_price"]);
                $show=$this->showDAODB->GetShow($row["id_show"]);
                $ticket->setShow($show);
                $ticket->setQuantity($row["ticket_quantity"]);
                $ticket->setSubtotal($row["ticket_subtotal"]);
            }
            return $ticket;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }

    }

    public function GetTicketsByUser($id_user){
        try
        {
            $ticketList = array();
            $query = "SELECT * FROM ".$this->tableName." where id_user=$id_user;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
            {
                $ticket = new Ticket();
                $ticket->setIdTicket($row["id_ticket"]);
                $ticket->setPrice($row["ticket_price"]);

                $show= $this->showDAODB->GetShow($row["id_show"]);
                $ticket->setShow($show);

                $ticket->setQuantity($row["ticket_quantity"]);
                $ticket->setSubtotal($row["ticket_subtotal"]);

                array_push($ticketList, $ticket);
            }
            return $ticketList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetLastId(){
        try
        {

            $query = "SELECT MAX(id_ticket) AS id FROM ".$this->tableName.";";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $item){
                $id = $item['id'];
            }

            return $id;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }

    }
}
?>