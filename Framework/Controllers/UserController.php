<?php
    namespace Controllers;
    use DAO\UserDAO as UserDAO;
    use DAO\CinemaDAOBD as CinemaDAOBD;
    use Models\User as User;
    use Models\Movie as Movie;
    use DAO\MovieDAODB as MovieDAODB;
    use DAO\ShowDAODB as ShowDAODB;
    use DAO\TicketDAODB as TicketDAODB;
    class UserController
    {
        private $userDAO;
        private $cinemaDAOBD;
        private $movieDAODB;
        private $showDAODB;
        private $ticketDAODB;
        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->cinemaDAOBD = new CinemaDAOBD();
            $this->movieDAODB = new MovieDAODB();
            $this->showDAODB = new ShowDAODB();
            $this->ticketDAODB = new TicketDAODB();


        }
       /* public function ShowMoviesandCinemasView()
        {
           // require_once(VIEWS_PATH."index.php"); mostrar peliculas y cines.
        }
     public function ShowListView()
        {
            $cinemaList = $this->cinemaDAO->GetAll();
            require_once(VIEWS_PATH."cine-list.php");
        }*/

        public function Add($name, $lastName, $email, $password) 
        {
                $user = new User();
                $user->setName($name);
                $user->setLastName($lastName);
                $user->setMail($email);
                $user->setPassword($password);

                $test = $this->userDAO->Add($user);
                var_dump($test);

                if ($test == 1)
                    {
                        echo "<script> if(confirm('Mail ya existe en sistema.'));";  
                        echo "</script>";
                        require_once(VIEWS_PATH."RegisterView.php");
                        
                    }
                    else{
                        echo "<script> if(confirm('Usuario agregado con éxito'));";  
                        echo "</script>";
                        $this->ShowLoginView();
                    }
                
                        
                
                
              
        }

        
        public function ShowLoginView($message = "")
        {
            require_once(VIEWS_PATH."index.php");
            
           
        }
        public function ShowMenuCine($message = "")
        {
            require_once(VIEWS_PATH."admin-cine-menu.php");
            
           
        }

        public function ShowMenuMovie($message = "")
        {
            require_once(VIEWS_PATH."admin-movie-menu.php");
            
           
        }

        public function ShowMenuShows($message = "")
        {
            require_once(VIEWS_PATH."admin-show-menu.php");
            
           
        }

        
        

        public function ShowRegisterView($message = "")
        {
            require_once(VIEWS_PATH."RegisterView.php");
            
           
        }

        public function MoviesxCinema($id){

            $showList=$this->showDAODB->GetShowxMovie($id);
            
            require_once(VIEWS_PATH."show-select.php");
        }

        public function ShowListView_user()
        {
            $movieList = $this->movieDAODB->GetMovieinShow();
            require_once(VIEWS_PATH."movie-user.php");
        }

        public function ShowListViewCinema_user()
        {
            $cinemaList = $this->cinemaDAOBD->GetAll();
            require_once(VIEWS_PATH."cine-list_user.php");
        }
    
        public function Login ($mail, $password){
            $userExists = $this->userDAO->SearchUser($mail,$password);

            if($userExists != null){
                //guardar en session
                $_SESSION['usuarioLogueado'] = $userExists;
            

                 if($userExists->getId()==1)
                    {
                      
                        require_once(VIEWS_PATH."admin-cine-menu.php");
                    }
        
                    else{
                        
                        $this->ShowListView_user();
                    }
                }else{
header ('location:'.FRONT_ROOT);

        }
}
        public function ShowWatchlist(){
            $ticketList= $this->ticketDAODB->GetTicketsByUser($_SESSION['usuarioLogueado']->getId());
            require_once (VIEWS_PATH."mytickets.php");
        }
        public function Logout(){
            session_destroy();
            header ('location:'.FRONT_ROOT);
        }
            
        }   
    
?>

