<?php 
    ini_set('display_errors', 'On');
    $servername = "localhost";
    $username = "root";
    $password = "norsehacks";
    $database = "globalhack7";
    // Create connection
    $conn = new mysqli($servername, $username, '', $database);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    
    $user_id=0;
    if(isset($_COOKIE["insert_id"])){
        $user_id=$_COOKIE["insert_id"];
    }else if(isset($_SESSION["insert_id"])){
        $user_id=$_SESSION["insert_id"];
    }
    print_r($user_id);
    if(  $_COOKIE["type"] == "guide" || $_POST["type"] == "guide"){
        $insert = $conn->prepare("INSERT INTO guide
            SET users_id=?,
                age=?,
                gender=?,
                occupation=?,
                self_desc=?,
                religion=?,
                marital_status=?,
                city=?,
                state=?,
                nationality=?,
                primary_language=?,
                secondary_language=?,
                hobby_1=?,
                hobby_2=?,
                family_desc=?");
    $insert->bind_param("iisssssssssssss", $user_id, $_POST["age"], $_POST["gender"], $_POST["occupation"], $_POST["self"], $_POST["religion"], $_POST["maritalStat"], 
                                           $_POST["city"], $_POST["state"], $_POST["nationality"], $_POST["primLanguages"], 
                                           $_POST["secLanguages"], $_POST["hobby1"], $_POST["hobby2"], $_POST["family"]);
        print_r($insert);
    if (!$insert->execute()) {
        print_r($insert->error); 
        echo "Error, could not insert into users";
    } else {
        $insert_id = $conn->insert_id;
    }

    $insert->close();
    }elseif($_COOKIE["type"] == "migrant" || $_POST["type"] == "migrant"){
        $insert = $conn->prepare("INSERT INTO migrant
            SET users_id=?,
                age=?,
                gender=?,
                self_desc=?,
                religion=?,
                marital_status=?,
                city=?,
                state=?,
                nationality=?,
                primary_language=?,
                secondary_language=?,
                hobby_1=?,
                hobby_2=?,
                family_desc=?,
                end_goal=?");
        $insert->bind_param("iisssssssssssss", $user_id, $_POST["age"], $_POST["gender"], $_POST["self"], $_POST["religion"], $_POST["maritalStat"], 
                                           $_POST["city"], $_POST["state"], $_POST["nationality"], $_POST["primLanguages"], 
                                           $_POST["secLanguages"], $_POST["hobby1"], $_POST["hobby2"], $_POST["family"], $_POST["outcome"]);
            print_r($insert);
        if (!$insert->execute()) {
            print_r($insert->error); 
            echo "Error, could not insert into users";
        } else {
            $insert_id = $conn->insert_id;
        }

        $insert->close();
    }


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

     header("Location: ../browse.php");


 /*     
    // Query for a list of all existing files
    $sql = 'SELECT `id`, `name`, `mime`, `size`, `created` FROM `file`';
    $result = $conn->query($sql);
     
    // Check if it was successfull
    if($result) {
        // Make sure there are some files in there
        if($result->num_rows == 0) {
            echo '<p>There are no files in the database</p>';
        }
        else {
            // Print the top of a table
            echo '<table width="100%">
                    <tr>
                        <td><b>Name</b></td>
                        <td><b>Mime</b></td>
                        <td><b>Size (bytes)</b></td>
                        <td><b>Created</b></td>
                        <td><b>&nbsp;</b></td>
                    </tr>';
     
            // Print each file
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['name']}</td>
                        <td>{$row['mime']}</td>
                        <td>{$row['size']}</td>
                        <td>{$row['created']}</td>
                        <td><a href='get_file.php?id={$row['id']}'>Download</a></td>
                    </tr>";
            }
     
            // Close table
            echo '</table>';
        }
     
        // Free the result
        $result->free();
    }
    else
    {
        echo 'Error! SQL query failed:';
        echo "<pre>{$conn->error}</pre>";
    }
     
    // Close the mysql connection
    $conn->close(); */
    ?>





