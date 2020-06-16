<?php
    namespace DAO;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;
    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaList = array();
        public function Add(Cinema $cinema)
        {
            $this->RetrieveData();
            
            array_push($this->cinemaList, $cinema);
            $this->SaveData();
        }
        public function GetAll()
        {
            $this->RetrieveData();
            return $this->cinemaList;
        }
        private function SaveData()
        {
            $arrayToEncode = array();
            foreach($this->cinemaList as $cinema)
            {
                $valuesArray=array();
                $valuesArray["name"] = $cinema->getName();
                $valuesArray["address"] = $cinema->getAddress();
                $valuesArray["capacity"] = $cinema->getCapacity();
                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('cinemas.json', $jsonContent);
        }

        public function Delete($name){
            $this->RetrieveData();
            $newList = array();
            foreach ($this->cinemaList as $cinema) {
                if($cinema->getName() != $name){
                    array_push($newList, $cinema);
                }
            }
    
            $this->cinemaList = $newList;
            $this->saveData();
        }
        
        private function RetrieveData()
        {
            $this->cinemaList = array();
            if(file_exists('cinemas.json'))
            {
                $jsonContent = file_get_contents('cinemas.json');
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new Cinema();
                    $cinema->setName($valuesArray["name"]);
                    $cinema->setAddress($valuesArray["address"]);
                    $cinema->setCapacity($valuesArray["capacity"]);
                    array_push($this->cinemaList, $cinema);
                }
            }
        }
    }
?>

