<?php

    namespace DAO;

    use \Exception as Exception;
    use DAO\IShowDAODB as IShowDAODB;
    use DAO\RoomDAOBD as RoomDAOBD;
    use DAO\MovieDAODB as MovieDAODB;
    use Models\Cinema as Cinema;
    use Models\Room as Room;
    use DAO\Connection as Connection;
    use Models\Show as Show;
    use Models\Movie as Movie;

class ShowDAODB implements IShowDAODB
{
    private $connection;
    private $tableName = "Shows";
    private $roomDAOBD;
    private $movieDAOBD;



    public function __construct()
    {
        $this->roomDAOBD = new RoomDAOBD();
        $this->movieDAOBD = new MovieDAODB();
    }

    public function Add(Show $show)
    {
        try
        {
            $query = "INSERT INTO ".$this->tableName." (show_time,show_day,id_movie_api,id_room) VALUES (:show_time,:show_day, :id_movie_api,:id_room);";
            //var_dump($query);
            $parameters["show_time"] = $show->getTime();
            $parameters["show_day"] = $show->getDay();
            $parameters["id_movie_api"] = $show->getMovie()->getId();
            $parameters["id_room"] = $show->getRoom()->getId();

            $this->connection = Connection::GetInstance();


            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    /*test pending*/
    public function GetAll()
    {
        try
        {
            $showList = array();


            $query = "SELECT * FROM ".$this->tableName;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            //var_dump($resultSet);
            foreach ($resultSet as $row)
            {
                $show = new Show();

                $show->setId($row["id_show"]);
                $show->setTime($row["show_time"]);
                $show->setDay($row["show_day"]);

                /*falta movieDAODB de los chicos*/
                $movie = $this->movieDAOBD->GetMovie($row["id_movie_api"]);
                $show->setMovie($movie);


                $room = $this->roomDAOBD->GetRoom($row["id_room"]);
                $show->setRoom($room);


                array_push($showList, $show);
            }
            return $showList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }




    /*
    test pending*/
    public function GetShow($id){
        try
        {
            $query = "SELECT * FROM ".$this->tableName." where id_show=$id;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            //var_dump($resultSet);

            foreach ($resultSet as $row){
                $show = new Show();
                $room = new Room();
                $movie = new Movie();
                $show->setId($row["id_show"]);
                $show->setTime($row["show_time"]);
                $show->setDay($row["show_day"]);

                $room = $this->roomDAOBD->GetRoom($row["id_room"]);
                $show->setRoom($room);

                $movie = $this->movieDAOBD->GetMovie($row["id_movie_api"]);
                $show->setMovie($movie);
            }
            //var_dump($show);
            return $show;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }

    }

    public function GetShowxMovie($id){
        try
        {
            $query = "SELECT * FROM ".$this->tableName." where id_movie_api=$id;";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            //var_dump($resultSet);
            $showList=array();
            foreach ($resultSet as $row){
                $show = new Show();
                $room = new Room();
                $movie = new Movie();
                $show->setId($row["id_show"]);
                $show->setTime($row["show_time"]);
                $show->setDay($row["show_day"]);

                $room = $this->roomDAOBD->GetRoom($row["id_room"]);
                $show->setRoom($room);

                $movie = $this->movieDAOBD->GetMovie($row["id_movie_api"]);
                $show->setMovie($movie);
                array_push($showList,$show);

            }
            //var_dump($show);
            return $showList;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }

    }

    public function ExistShow($day,$time,$id_room){

        try{

            $query="Select * from shows where show_day='".$day ."' and show_time='".$time ."' and id_room=$id_room;";
            
             $this->connection = Connection::GetInstance();
             $resultSet = $this->connection->Execute($query);
             return $resultSet;
            }
            catch(Exception $ex){
                throw $ex;
                }

    }
    //función para validar si una función tiene entradas adquiridas previo a borrar la función
    public function Validate($id){
        try{

            $query="Select * from shows s join tickets t on s.id_show=t.id_show where s.id_show=$id;";
            
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
            $query="DELETE FROM ".$this->tableName." where id_show=$id;";

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        }
        catch(Exception $ex){
            throw $ex;
        }
    }

    /*test pending - falta implementar la vista show-modify*/
    public function ViewModify($id){

        $show = new Show();
        $show = $this->GetShow($id);
        $roomList=$this->roomDAOBD->getAll();
        $movieList=$this->movieDAOBD->getAll();
     
        require_once(VIEWS_PATH."show-modify.php");
    }

    /*test pending*/
    public function Modify(Show $show){
        try{
            $query="UPDATE ". $this->tableName ." SET show_day= '". $show->getDay() ."',show_time= '". $show->getTime() ."', id_movie_api= '" . $show->getMovie()->getId() . "', id_room= " . $show->getRoom()->getId()." where id_show = ".$show->getId().";";
            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
        }
        catch(Exception $ex){
            throw $ex;
        }
    }
}

?>

