<?php
    namespace Controllers;
    use DAO\MovieDAODB as MovieDAODB;
    use Models\Movie as Movie;
    use Models\Genres as Genres;
    class MovieController
    {
        private $movieDAO;
        public function __construct()
        {
            $this->movieDAO = new MovieDAODB();
        }

   
       
     /*  public function ShowListView()
        {
            $movieList = $this->movieDAO->GetAll();
            require_once(VIEWS_PATH."movie-list.php");
        }
*/       

public function ShowListGenres()

{
    $genresList=$this->movieDAO->GetAllGenres();
    require_once(VIEWS_PATH."filtersMovies.php");
   
}

//función que solo muestra las perliculas por género
public function ShowListViewMovies($id){
    $movieList = $this->movieDAO->GetMoviexGenres($id);
    require_once(VIEWS_PATH."movie-list.php");
}

//funcion que devuelve todas las películas que vienen de la api
public function ShowAllMovies(){
    $movieList = $this->movieDAO->GetAll();
    require_once(VIEWS_PATH."movie-list.php");
}

//función que muestra la película buscada por nombre
public function ShowMoviexName($name){
    $movieList = $this->movieDAO->GetMoviexName($name);
    require_once(VIEWS_PATH."movie-list.php");
}

//función que solo lista las películas que tienen show
public function ShowMoviesinShow(){
    $movieList = $this->movieDAO->GetMovieinShow();
    require_once(VIEWS_PATH."movie-user.php");
}

//función que lista películas por fecha de función

 public function ShowMoviesxDate($date){
    $movieList = $this->movieDAO->GetMovieinShowxDate($date);
    require_once(VIEWS_PATH."movie-user.php");
}
     
 
public function RetrieveData(){
    $this->movieDAO->RetrieveData();
    $this->ShowListGenres();
}

public function RetrieveDataGenres(){
    $this->movieDAO->RetrieveDataGenres();
    require_once (VIEWS_PATH."nav.php");
}

//función que modifica el estado de la película (actidada/desactivada)

public function ModifyStatus($id,$name,$nowPlaying){
    $movie= new Movie();
    $movie->setId($id);
    $movie->setName($name);
    $movie->setPlayingNow($nowPlaying);
    
    $this->movieDAO->ModifyStatus($movie);
    $this->ShowAllMovies();
}


public function ViewModify($id){
    $this->movieDAO->ViewModify($id);
    require_once(VIEWS_PATH."movie-modify.php");
}
    }
?>
