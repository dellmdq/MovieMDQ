<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;    
    use Models\Room as Room;
    use Models\User as User;    
    use DAO\Connection as Connection;


    

    class CinemaDAOBD implements ICinemaDAO
    {
        private $connection;
        private $tableName = "Cinema";
        private $tableName2 = "Rooms";
      

        public function Add(Cinema $cine)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (cinema_name, cinema_address, ticket_price) VALUES (:cinema_name, :cinema_address, :ticket_price);";
                
                $parameters["cinema_name"] = $cine->getName();
                $parameters["cinema_address"] = $cine->getAddress();
                $parameters["ticket_price"] = $cine->getTicketPrice();
                

                $this->connection = Connection::GetInstance();
                

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetAll()
        {
            try
            {
                $cinemaList = array();
                $query = "SELECT * FROM ".$this->tableName . " where statusCinema=1;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["cinema_address"]);
                    $cinema->setTicketPrice($row["ticket_price"]);
                    array_push($cinemaList, $cinema);
                }
                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetCinema($id){
            try
            {
                
                
                $query = "SELECT * FROM ".$this->tableName." where id_cinema=$id;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                //var_dump($resultSet);
                $cinema = new Cinema();

                foreach ($resultSet as $row){
                    
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["cinema_address"]);
                    $cinema->setTicketPrice($row["ticket_price"]);
                }
               return $cinema;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function Validate($id){
            try{

                $query="Select * from shows s join rooms r on s.id_room=r.id_room join cinema c on r.id_cinema=c.id_cinema where c.id_cinema=$id;";
                
                 $this->connection = Connection::GetInstance();
                 $resultSet = $this->connection->Execute($query);
                 return $resultSet;
                }
                catch(Exception $ex){
                    throw $ex;
                    }
        }
        
        

        public function Delete($id){
            try{
                $query="UPDATE ". $this->tableName ." SET statusCinema=0 where id_cinema=$id;";
                
                 $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
                }
                catch(Exception $ex){
                    throw $ex;
                    }
    }

    public function ViewModify($id){
        
           $cinema = new Cinema;
           $cinema= $this->GetCinema($id);
           
            require_once(VIEWS_PATH."cine-modify.php");
           
            
    }

    public function Modify(Cinema $cine){
        try{
            $query="UPDATE ". $this->tableName ." SET cinema_name= '". $cine->getName() ."', cinema_address= '" . $cine->getAddress() . "', ticket_price= " . $cine->getTicketPrice()." where id_cinema= ".$cine->getId().";";
            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex){
                throw $ex;
                }
        }

    }

?>

