<?php

    namespace DAO;

    use \Exception as Exception;
    use DAO\IRoomDAOBD as IRoomDAOBD;
    use DAO\CinemaDAOBD as CinemaDAOBD;
    use Models\Cinema as Cinema;
    use Models\Room as Room;
    use DAO\Connection as Connection;

class RoomDAOBD implements IRoomDAOBD
{
    private $connection;
    private $tableName = "Rooms";
    private $cinemaDAOBD;

    public function __construct(){
        $this->cinemaDAOBD=new CinemaDAOBD();
    }
    /*test ok*/
    public function Add(Room $room)
    {
        try
        {
            $query = "INSERT INTO ".$this->tableName." (room_name, room_capacity, id_cinema) VALUES (:room_name, :room_capacity,:id_cinema);";
            
            $parameters["room_name"] = $room->getName();
            $parameters["room_capacity"] = $room->getCapacity();
            $parameters["id_cinema"] = $room->getCinema()->getId();

            $this->connection = Connection::GetInstance();


            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    /*test ok*/
    public function GetAll()
    {
        try
        {
            $roomList = array();
            $query = "SELECT * FROM ".$this->tableName . " r join Cinema c on c.id_cinema=r.id_cinema where c.statusCinema=1 and r.statusRoom=1;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row)
            {
                $room = new Room();
                $room->setId($row["id_room"]);
                $room->setName($row["room_name"]);
                $room->setCapacity($row["room_capacity"]);
                /*traer el cine por id e insertarlo en la sala*/
                $cine = $this->cinemaDAOBD->GetCinema($row["id_cinema"]);
                $room->setCinema($cine);


                array_push($roomList, $room);
            }
            return $roomList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }


    /*yo tengo que traer la sala de la bd, instanciarla, asignarle todos los datos,
    por otro lado voy a instanciar un cine, voy a agregar todos sus datos y
    luego lo meto en la sala.

    test pending*/
    public function GetRoom($id){
        try
        {
            $query = "SELECT * FROM ".$this->tableName." where id_room=$id;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            //var_dump($resultSet);
            $room = new Room();
            $cinema = new Cinema();
           

            foreach ($resultSet as $row){
                $room->setId($row["id_room"]);
                $room->setName($row["room_name"]);
                $room->setCapacity($row["room_capacity"]);
                $cinema = $this->cinemaDAOBD->GetCinema($row["id_cinema"]);
                $room->setCinema($cinema);
            }
            //var_dump($room);
            return $room;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }

    }

  
    public function Validate($id){
        try{

            $query="Select * from shows s join rooms r on s.id_room=r.id_room where r.id_room=$id;";
            
             $this->connection = Connection::GetInstance();
             $resultSet = $this->connection->Execute($query);
             return $resultSet;
            }
            catch(Exception $ex){
                throw $ex;
                }
    }
    /*test ok*/
    public function Delete($id){
        try{
            $query="UPDATE ". $this->tableName ." SET statusRoom=0 where id_room=$id;";

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        }
        catch(Exception $ex){
            throw $ex;
        }
    }

    /*test ok*/
    public function ViewModify($id){

        $room = new Room();
        $room= $this->GetRoom($id);

        require_once(VIEWS_PATH."room-modify.php");
    }

    /*test ok*/
    public function Modify(Room $room){
        try{
            $query="UPDATE ". $this->tableName ." SET room_name= '". $room->getName() ."', room_capacity= '" . $room->getCapacity() . "', id_cinema= " . $room->getCinema()->getId()." where id_room= ".$room->getId().";";

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        }
        catch(Exception $ex){
            throw $ex;
        }
    }
}

?>

