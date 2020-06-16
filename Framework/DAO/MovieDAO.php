<?php
   /* namespace DAO;
    use Models\Movie as Movie;
    use Models\Genres as Genres;
    class MovieDAO 
    {
        private $movieList = array();
        //public static $genresList=array();
        public function Add(Movie $movie)
        {
            $this->RetrieveData();
            
          array_push($this->movieList, $movie);
          $this->SaveData();
           
        }
        public function GetAll()
        {
            $this->RetrieveData();
            return $this->movieList;
        }
        
        private function SaveData()
        {
            $arrayToEncode = array();
            foreach($this->movieList as $movie)
            {
                $valuesArray=array();
                $valuesArray["name"] = $movie->getName();
                $valuesArray["language"] = $movie->getLanguage();
                $valuesArray["image"] = $movie->getImage();
                $valuesArray["summary"]=$movie->getSummary();
                $valuesArray["releaseDate"]=$movie->getReleaseDate();
                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('movie.json', $jsonContent);
        }
        
        public static function RetrieveDataGenres(){

        $this->genresList = array();   
        $json1=file_get_contents ("https://api.themoviedb.org/3/genre/movie/list?api_key=5de19b6adfed779f6f309d15cb9b2da2");
        $arrayToDecode = ($json1) ? json_decode($json1, true) : array();
        //var_dump($arrayToDecode);
        foreach($arrayToDecode as $valuesArray){
            for($i=0;$i<count($valuesArray);$i++){
                $genres= new Genres();
                foreach($valuesArray as $values){

                     $genres->setId($values["id"]);
                     $genres->setName($values["name"]); 
                }
            
            }
        array_push($this->genresList,$genres);
        }


        }

        private function RetrieveData()
        {
            $this->movieList = array();
            $jsonContent = file_get_contents("https://api.themoviedb.org/3/movie/now_playing?api_key=5de19b6adfed779f6f309d15cb9b2da2");
             var_dump($jsonContent);  
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            //var_dump($arrayToDecode["results"]);
           // MovieDAO::RetrieveDataGenres();
           // var_dump($genresList);
                foreach($arrayToDecode["results"] as $valuesArray)
                {
                    $movie = new Movie();
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
                    array_push($this->movieList, $movie);
                }
            }*/


        }


    
?>

