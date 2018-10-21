<?php

namespace LeaveFormManagement\Persistence;

interface DatabaseInterface{

    function connection();

    function disconnect();

    function query($query);

    function fetch();

    function fetchRow();

    function select($table,$conditions,$fields,$order,$limit,$offest);

    function insert($table,array $data);

    function update($table,array $data ,$conditions);

    function delete($table,$conditions);

    function getAffectedRows();

    function countResultantRows();

}


