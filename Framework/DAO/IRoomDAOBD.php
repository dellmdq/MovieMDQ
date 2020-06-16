<?php

namespace DAO;

use Models\Room as Room;
use DAO\Connection as Connection;

interface IRoomDAOBD
{
    function Add(Room $room);

    function GetAll();

    function Delete($id);
}

?>