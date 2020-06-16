<?php
    namespace Controllers;

    use DAO\RoomDAOBD as RoomDAOBD;
    use DAO\CinemaDAOBD as CinemaDAOBD;
    use Models\Cinema as Cinema;
    use Models\Room as Room;


    class RoomController
    {
        private $cinemaDAOBD;
        private $roomDAOBD;

        public function __construct()
        {
            $this->roomDAOBD = new RoomDAOBD();
            $this->cinemaDAOBD = new CinemaDAOBD();
        }

        public function ShowAddView()
        {   $cinemaList=$this->cinemaDAOBD->getAll();
            require_once(VIEWS_PATH."room-add.php");
        }

        public function ShowListView()
        {
            $roomList = $this->roomDAOBD->GetAll();
            require_once(VIEWS_PATH."room-list.php");
        }

        public function Add($name, $capacity, $id_cinema)
        {
            $room = new Room();
            $room->setName($name);
            $room->setCapacity($capacity);
            /*hay que buscar con el id en la bd el cine
            correspondiente a la id*/

            //$cine = new Cinema();
            $cine = $this->cinemaDAOBD->GetCinema($id_cinema);
            $room->setCinema($cine);


            $this->roomDAOBD->Add($room);
            $this->ShowListView();
        }

        
        public function Delete($id){
            $resultSet=$this->roomDAOBD->Validate($id);
            
            if($resultSet==null){
            $this->roomDAOBD->Delete($id);
            }
            else{
                echo "<script> if(confirm('Error: El room tiene funciones asociadas!'));";  
                echo " </script>";
            }
           
            $this->ShowListView();
        }



        /*sin hacer el DAODB*/
        public function ViewModify($id){
            $this->roomDAOBD->ViewModify($id);
        }



        /*Se debe validar que exista el id_cine ingresado,
         en la base de datos.*/
        public function Modify($id,$name,$capacity,$id_cine){
            $room = new Room();
            $room->setId($id);
            $room->setName($name);
            $room->setCapacity($capacity);
            $room->setCinema($this->cinemaDAOBD->GetCinema($id_cine));
            $this->roomDAOBD->Modify($room);
            $this->ShowListView();

        }
    }
?>

