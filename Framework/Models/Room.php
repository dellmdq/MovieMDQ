<?php
    namespace Models;
    use Models\Cinema as Cinema;
    use Models\Show as Show;

    class Room{
        private $id;
        private $name;
        private $capacity;
        private $cinema;
        private $showList;

        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function setShowList($showList)
        {
            $this->showList = $showList;
        }

        public function getShowList()
        {
            return $this->showList;
        }
        public function getName()
        {
            return $this->name;
        }
        public function setName($name)
        {
            $this->name = $name;
        }
        public function getCapacity()
        {
            return $this->capacity;
        }
        public function setCapacity($capacity)
        {
            $this->capacity = $capacity;
        }
        public function getCinema()
        {
            return $this->cinema;
        }
        public function setCinema($cinema)
        {
            $this->cinema = $cinema;
        }



    }


?>