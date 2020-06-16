<?php

namespace DAO;

use DAO\Connection as Connection;
use Models\Show as Show;

interface IShowDAODB
{
    function Add(Show $show);

    function GetAll();

    function Delete($id);
}

?>