<?php

function check($db,$param, $database_table)
{
    $query = $db->prepare("SELECT * FROM $database_table where email = ?");

    var_dump($query->rowCount());
}