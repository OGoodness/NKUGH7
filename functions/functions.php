<?php
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