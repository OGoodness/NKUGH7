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


function get_migrant($conn){
    $response = NULL;
    $sql = "SELECT *
    FROM migrant m LEFT JOIN users u ON u.user_id  = m.users_id";
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


function get_guides($conn){
    $response = NULL;
    $sql = "SELECT *
    FROM guide m LEFT JOIN users u ON u.user_id  = m.users_id";
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

function getUser($conn, $id){
    $response = NULL;
    $sql = "SELECT * From users where user_id = $id";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_object()){
                $response[] = $row;
            }
        }
        $result->free();
    }
    return $response;
}