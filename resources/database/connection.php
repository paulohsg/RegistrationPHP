<?php

//Open connection
function DBConnect(){
    $link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
    mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));

    return $link;
}

//Close connection
function DBClose($link){
    mysqli_close($link) or die(mysqli_error($link));
}

//Prevention against SQL injecions
function DBEscape($data){
    $link = DBConnect();

    if(!is_array($data)){
        $data = msqli_real_escape_string($link, $data);
    }else{
        $aux = $data;

        foreach ($aux as $key => $value){
            $key = msqli_real_escape_string($link, $key);
            $value = msqli_real_escape_string($link, $value);

            $data[$key] = $value;
        }
    }

    DBClose($link);
    return $data;
}