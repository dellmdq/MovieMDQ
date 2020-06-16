<?php
    namespace DAO;
    use Models\Movie as Movie;
    use DAO\Connection as Connection;
    interface IMovieDAO
    {
        function Add(Movie $movie);
      //  function GetAll();
    }
?>
