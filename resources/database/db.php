<?php

//Execute queries
function DBExecute($query){
    $link = DBConnect();
    $result = mysqli_query($link, $query) or die(mysqli_error());

    DBClose($link);
    return $result;
}