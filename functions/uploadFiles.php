<?php 
    include "../include/db_connect.php";


    foreach($_FILES as $key => $file){
        if(isset($_FILES[$key])) {
            // Make sure the file was sent without errors
            if($_FILES[$key]['error'] == 0) {
                // Connect to the database
                if(mysqli_connect_errno()) {
                    die("MySQL connection failed: ". mysqli_connect_error());
                }
        
                // Gather all required data
                $name = $conn->real_escape_string($_FILES[$key]['name']);
                $mime = $conn->real_escape_string($_FILES[$key]['type']);
                $data = $conn->real_escape_string(file_get_contents($_FILES[$key]['tmp_name']));
                $size = intval($_FILES[$key]['size']);
        
                // Create the SQL query
                $query = "INSERT INTO `file` (
                        `name`, `mime`, `size`, `data`, `created`
                    )
                    VALUES (
                        '{$name}', '{$mime}', {$size}, '{$data}', NOW()
                    )";
        
                // Execute the query
                $result = $conn->query($query);
        
                // Check if it was successfull
                if($result) {
                    echo 'Success! Your file was successfully added!';
                }
                else {
                    echo 'Error! Failed to insert the file'
                    . "<pre>{$conn->error}</pre>";
                }
            }
            else {
                echo 'An error accured while the file was being uploaded. '
                . 'Error code: '. intval($_FILES[$key]['error']);
            }
        
            // Close the mysql connection
            $conn->close();
        }
        else {
            echo 'Error! A file was not sent!';
        }
        
        // Echo a link back to the main page
        echo '<p>Click <a href="index.html">here</a> to go back</p>';
    }







