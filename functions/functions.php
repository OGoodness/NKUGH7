<?php
//all get functions...........
function get_user_type($conn){
    $response = NULL;
    $sql = "SELECT *
    FROM globalhack7.user_type";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_object()){
                $response[] = $row;
            }
        }
    }
    $result->free();
    return $response;
}