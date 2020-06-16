<?php
    namespace Controllers;
    use DAO\MovieDAODB as MovieDAODB;
    use DAO\RoomDAOBD as RoomDAOBD;
    use DAO\ShowDAODB as ShowDAODB;
    use Models\Movie as Movie;
    use Models\Room as Room;
    use Models\Show as Show;


class ShowController{
        private $showDAODB;
        private $movieDAODB;
        private $roomDAOBD;
        public function __construct()
        {
            $this->showDAODB = new ShowDAODB();
            $this->movieDAODB = new MovieDAODB();
            $this->roomDAOBD = new RoomDAOBD();

        }
        public function ShowAddView()
        {  
            $roomList=$this->roomDAOBD->getAll();
            $movieList=$this->movieDAODB->getAllActivate();
            require_once(VIEWS_PATH."show-add.php");
        }
        public function ShowListView()
        {
            $showList = $this->showDAODB->GetAll();
            require_once(VIEWS_PATH."show-list.php");
        }
        public function Add($day, $time, $id_movie, $id_room)
        {

            $resultSet=$this->showDAODB->ExistShow($day,$time,$id_room);
            if($resultSet==null){
            $show = new Show();

            //$show->setTime((date(("H:i:s"),$time)));
            $show->setTime($time);
            $show->setDay($day);

            $movie = $this->movieDAODB->GetMovie($id_movie);
            $show->setMovie($movie);

            $room = $this->roomDAOBD->GetRoom($id_room);
            $show->setRoom($room);

            $this->showDAODB->Add($show);
            $this->ShowListView();
            }
            else{
                echo "<script> if(confirm('Error: Ya existe un show en esa sala para ese día y horario!'));";  
                echo " </script>";
                $this->ShowAddView();
            }
        }

      

        public function Delete($id){
            $resultSet=$this->showDAODB->Validate($id);
            
            if($resultSet==null){
            $this->showDAODB->Delete($id);
            }
            else{
                echo "<script> if(confirm('Error: El show tiene entradas adquiridas!'));";  
                echo " </script>";
            }
           
            $this->ShowListView();
        }

        public function ViewModify($id){

            $this->showDAODB->ViewModify($id);

        }

        
        public function Modify($id,$day,$time,$id_movie,$id_room){
            $resultSet=$this->showDAODB->ExistShow($day,$time,$id_room);
            if($resultSet==null){
            $show = new Show();
            $show->setId($id);
            $show->setTime($time);
            $show->setDay($day);
            $show->setMovie($this->movieDAODB->GetMovie($id_movie));
            $show->setRoom($this->roomDAOBD->GetRoom($id_room));
            $this->showDAODB->Modify($show);
            $this->ShowListView();
            }
            else{
                echo "<script> if(confirm('Error: Ya existe un show en esa sala para ese día y horario!'));";  
                echo " </script>";
                $this->ShowListView();
            }
        }
    }

?>

