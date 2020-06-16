<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;
    use DAO\Connection as Connection;
    use Controllers\CinemaController as CinemaController;
    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "users";
      
      
        public function Add(User $user)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (user_name, user_lastName, user_mail, user_pass) VALUES (:user_name, :user_lastName, :user_mail, :user_pass);";
                
                $parameters["user_name"] = $user->getName();
                $parameters["user_lastName"] = $user->getLastName();
                $parameters["user_mail"] = $user->getMail();
                $parameters["user_pass"] = $user->getPassword();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
                
            }
            catch(Exception $ex)
            {
                return 1;

            }
        }
    

   public function SearchUser($mail,$password){

    try{
        $query="SELECT * FROM " . $this->tableName . " where user_mail='".$mail."';";

        
        
        $this->connection = Connection::GetInstance();
        $resultSet = $this->connection->Execute($query);
	  $user = new User();
	
        if ($resultSet){
            foreach ($resultSet as $row)
            {                
              
                $user->setId($row["id_user"]);
                $user->setName($row["user_name"]);
                $user->setLastName($row["user_lastName"]);
                $user->setMail($row["user_mail"]);
                $user->setPassword ($row["user_pass"]);
            }
            if ($user->getPassword() != $password){
                 $user=null;
            }
           
        }else{
            $user=null;
        }

        }catch (Exception $ex)
        {
            throw $ex;
        }

        return $user;
    }
}

    


    //public function Login ()
     /*  public function GetAll()
        {
            try
            {
                $cinemaList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["cinema_address"]);
                    $cinema->setCapacity($row["cinema_capacity"]);
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

                foreach ($resultSet as $row){
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["cinema_address"]);
                    $cinema->setCapacity($row["cinema_capacity"]);
                }
               return $cinema;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }
        

        public function Delete($id){
            try{
                $query="DELETE FROM ". $this->tableName ." where id_cinema=$id;";
                
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
            $query="UPDATE ". $this->tableName ." SET cinema_name= '". $cine->getName() ."', cinema_address= '" . $cine->getAddress() . "', cinema_capacity= " . $cine->getCapacity()." where id_cinema= ".$cine->getId().";";
            
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex){
                throw $ex;
                }
        }

    }*/

?>

