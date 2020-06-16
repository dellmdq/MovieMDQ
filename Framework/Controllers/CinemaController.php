<?php
    namespace Controllers;
    use DAO\CinemaDAOBD as CinemaDAOBD;
    use Models\Cinema as Cinema;
    class CinemaController
    {
        private $cinemaDAO;
        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAOBD();
        }
        public function ShowAddView()
        {
            require_once(VIEWS_PATH."cine-add.php");
        }
        public function ShowListView()
        {
            $cinemaList = $this->cinemaDAO->GetAll();
            require_once(VIEWS_PATH."cine-list.php");
        }
      
        public function Add($name, $address, $ticketPrice)
        {
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setAddress($address);
            $cinema->setTicketPrice($ticketPrice);
            $this->cinemaDAO->Add($cinema);
            $this->ShowListView();
        }

        public function Delete($id){
            $resultSet=$this->cinemaDAO->Validate($id);
            
            if($resultSet==null){
            $this->cinemaDAO->Delete($id);
            }
            else{
                echo "<script> if(confirm('Error: El cine tiene funciones asociadas!'));";  
                echo " </script>";
            }
            $this->ShowListView();
        }

        public function ViewModify($id){
            $this->cinemaDAO->ViewModify($id);
            
        }

        public function Modify($id,$name,$address,$ticketPrice){
            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setAddress($address);
            $cinema->setTicketPrice($ticketPrice);
            $this->cinemaDAO->Modify($cinema);
            $this->ShowListView();

        }
    }
?>

