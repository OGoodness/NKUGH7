<?php
//all get functions...........

function getUserType($conn){
    $response = NULL;
    $sql = "SELECT *
            FROM user_type";
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


/*
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



 */ 