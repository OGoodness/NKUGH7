<?php
//all get functions...........

include "include/db_connect.php";

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
    return (object)$response;
}



function selectGuide(){
    $visit="";
    $query = "SELECT";

    if ($result = $conn->query($query)) {
        if ($result->num_rows > 0) {
            $visit = $result->fetch_object();
        }else{
            echo "No rows were found";
        }
        $result->free();
    }
}


function insertHost(){
    if (!$insert->execute()) {
        echo mysqli_error($conn);
        echo "Unable to insert";
        $insert_id = $conn->insert_id;
    }
    $insert->close();
}



?>
    } else {