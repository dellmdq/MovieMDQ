<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;    
    use Models\Genres as Genres;
    use DAO\Connection as Connection;
    class MovieDAODB implements IMovieDAO
    {
        private $connection;
        private $tableName = "Movies";
        private $tableName2 = "Genres";
        private $tableName3 = "MovieXGender";
        private $tableName4 = "MoviesArchive";

        public function Add(Movie $movie)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (id_movie_api, name_movie, summary, lenguage, dir_image, releaseDate, playingNow) VALUES (:id_movie_api, :name_movie, :summary, :lenguage, :dir_image, :releaseDate, :playingNow)
                on duplicate key update id_movie_api=id_movie_api , name_movie=name_movie , summary=summary , lenguage=lenguage , dir_image=dir_image , releaseDate=releaseDate;";
                //echo $query;
                
                $parameters["id_movie_api"]=$movie->getId();
                $parameters["name_movie"] = $movie->getName();
                $parameters["summary"] = $movie->getSummary();
                $parameters["lenguage"] = $movie->getLanguage();
                $parameters["dir_image"] = $movie->getImage();
                $parameters["releaseDate"] =$movie->getReleaseDate();
                $parameters["playingNow"] =$movie->getPlayingNow();
                //var_dump($parameters);

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
            
        }

       
      
        public function AddGenres(Genres $genre)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName2." (id_gender_api, gender_tipe) VALUES (:id_gender_api, :gender_tipe) on duplicate key update id_gender_api=id_gender_api , gender_tipe=gender_tipe;";
               
                $parameters["id_gender_api"]=$genre->getId_api();
                $parameters["gender_tipe"] = $genre->getName();
                

                $this->connection = Connection::GetInstance();
                

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
      
        public function AddMovieXGenres($genre,$id)
        {
            try
            {

                
                
                for ($i = 0; $i < count($genre); $i++){
                    $query = "INSERT INTO ".$this->tableName3." (id_gender_api,id_movie_api) VALUES (:id_gender_api, :id_movie_api)   on duplicate key update id_gender_api=id_gender_api, id_movie_api=id_movie_api;";
                   
                    $parameters["id_gender_api"]=$genre[$i];
                    $parameters["id_movie_api"] = $id;
                                    

                    $this->connection = Connection::GetInstance();
                                    

                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
                
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
                $movieList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList, $movie);
                }
                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAllActivate()
        {
            try
            {
                $movieList = array();
                $query = "SELECT * FROM ".$this->tableName . " m where m.playingNow=1;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList, $movie);
                }
                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function GetGenres($id){
            try
            {
     
                
                $query = "SELECT g.gender_tipe FROM ". $this->tableName2." g inner join " . $this->tableName3 . " m on g.id_gender_api=m.id_gender_api where id_movie_api=$id;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
               
                return $resultSet;


                               
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function GetAllGenres(){
            try
            {
                $genresList= array();
     
               
                $query = "SELECT * FROM ". $this->tableName2.";";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row){
                    $genre= new Genres();
                    $genre->setName($row["gender_tipe"]);
                    $genre->setId_api($row["id_gender_api"]);
                    array_push($genresList,$genre);
                }
               
                return $genresList;


                               
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }
        public function GetMovie($id){
            try
            {
                
                
                $query = "SELECT * FROM ".$this->tableName." where id_movie_api=$id;";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                //var_dump($resultSet);
                $movie = new Movie();

                foreach ($resultSet as $row){
                    
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                }
               return $movie;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function GetMoviexName($name){
            try
            {
                
                $movieList=array();
                $query = "SELECT * FROM ".$this->tableName." where name_movie like '%".$name."%';";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                //var_dump($resultSet);
                

                foreach ($resultSet as $row){
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList,$movie);
                }
               return $movieList;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function GetMoviexGenres($id){
            try
            {
                
                $movieList=array();
                $query = "SELECT * FROM ".$this->tableName." m inner join ". $this->tableName3. " mxg on m.id_movie_api=mxg.id_movie_api where mxg.id_gender_api=".$id. " and m.playingNow=1;";
               //echo $query;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
               // var_dump($resultSet);
               

                foreach ($resultSet as $row){
               
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList,$movie);
                }
               return $movieList;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function GetMovieinShow(){
            try
            {
                
                $movieList=array();
                $query = "SELECT * FROM ".$this->tableName." m inner join shows s on s.id_movie_api=m.id_movie_api where s.show_day > NOW() group by m.name_movie;";
               //echo $query;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
               // var_dump($resultSet);
               

                foreach ($resultSet as $row){
               
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList,$movie);
                }
               return $movieList;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function GetMovieinShowxDate($date){
            try
            {
                
                $movieList=array();
                $query = "SELECT * FROM ".$this->tableName." m inner join shows s on s.id_movie_api=m.id_movie_api where s.show_day=$date group by s.show_day;";
               //echo $query;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
               // var_dump($resultSet);
               

                foreach ($resultSet as $row){
               
                    $movie = new Movie();
                    $movie->setId($row["id_movie_api"]);
                    $movie->setName($row["name_movie"]);
                    $movie->setSummary($row["summary"]);
                    $movie->setLanguage($row["lenguage"]);
                    $movie->setImage($row["dir_image"]);
                    $movie->setReleaseDate($row["releaseDate"]);
                    $movie->setGenres($this->GetGenres($row["id_movie_api"]));
                    $movie->setPlayingNow($row["playingNow"]);
                    array_push($movieList,$movie);
                }
               return $movieList;    
                
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    
        }

        public function RetrieveData()
        {
           
            $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=5de19b6adfed779f6f309d15cb9b2da2");
            
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
          
            
           
                foreach($arrayToDecode["results"] as $valuesArray)
                {
                    $movie = new Movie();
                    $movie->setId($valuesArray["id"]);
                    $movie->setName($valuesArray["original_title"]);
                    $movie->setLanguage($valuesArray["original_language"]);
                    $movie->setImage($valuesArray["poster_path"]);
                    $movie->setSummary($valuesArray["overview"]);
                    $movie->setReleaseDate($valuesArray["release_date"]);
                    $arrayGenres=array();
                    foreach($valuesArray["genre_ids"] as $values){
                    array_push($arrayGenres,$values);
                        }
                    $movie->setGenres($arrayGenres);
                    $movie->setPlayingNow(0);
                    //var_dump($movie);
                    $this->Add($movie);
                    $this->AddMovieXGenres($arrayGenres,$valuesArray["id"]);

                }

               
            }

            public function RetrieveDataGenres()
        {
           
        $json1=file_get_contents ("https://api.themoviedb.org/3/genre/movie/list?api_key=5de19b6adfed779f6f309d15cb9b2da2");
        $arrayToDecode = ($json1) ? json_decode($json1, true) : array();
        
        foreach($arrayToDecode as $valuesArray){

            for($i=0;$i<count($valuesArray);$i++){
                $genre= new Genres();
                

                     $genre->setId_api($valuesArray[$i]["id"]);
                     $genre->setName($valuesArray[$i]["name"]);
                     $this->AddGenres($genre);
                
                
            }

        }
      
    }
           public function ModifyStatus(Movie $movie){
            try{
                
                $query="UPDATE ". $this->tableName ." SET playingNow= " . $movie->getPlayingNow() ." where id_movie_api= ".$movie->getId().";";
                
                 $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
                }
                catch(Exception $ex){
                    throw $ex;
                    }
    }

    public function ViewModify($id){
        
        $movie = new Movie();
        $movie= $this->GetMovie($id);
        
        require_once(VIEWS_PATH."movie-modify.php");
        
         
 }


  /*  public function ViewModify($id){
        
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
        }*/

    }

?>
