<?php
    // Include config file
    require_once 'include/db_connect.php';
    require_once 'functions/functions.php';
    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

 
    // Define variables and initialize with empty values
    $userFirstName = $userLastName = $type = $password = $confirmPassword = $email = "";
    $userFirstNameErr = $userLastNameErr = $userTypeErr = $passwordErr = $confirmPasswordErr = $emailErr = "";

    // Processing form data when form is submitted
    if(isset($_POST['signup_submit'])){

        // Validate first name
        if(empty(trim($_POST["fname"]))){
            $userFirstNameErr = "Please enter your first name.";
        } else{
            $userFirstName = trim($_POST['fname']);
          
        }

        //Validate last name
        if(empty(trim($_POST["lname"]))){
            $userLastNameErr = "Please enter your last name.";
        } else{
            $userLastName = trim($_POST['lname']);
          
        }

        $type = trim($_POST["user-type"]);

        // Validate email
        if(empty(trim($_POST["email"]))){
            $emailErr = "Please enter an email.";
        } else{
            // Prepare a select statement
            $sql = "SELECT user_email FROM users WHERE user_email = ?";
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $paramEmail);
                $paramEmail = trim($_POST["email"]);
                if(mysqli_stmt_execute($stmt)){
                    // store result
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $emailErr = "This email is already taken.";
                    } else{
                        $email = trim($_POST["email"]);
                    }
                } else{
                    echo "Execution email failed";
                }
            }
            else{
                echo "Prepare email failed";
            }
            

        }

        // Validate password
        if(empty(trim($_POST['password']))){
            $passwordErr = "Please enter a password.";
        } elseif(strlen(trim($_POST['password'])) < 6){
            $passwordErr = "Password must have at least 6 characters.";
        } else{
            $password = trim($_POST['password']);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirmPasswordErr = 'Please confirm password.';
        } else{
            $confirmPassword = trim($_POST['confirm_password']);
            if($password != $confirmPassword){
                $confirmPasswordErr = 'Password did not match.';
            }
        }

        // Check input errors before inserting in database
        if(empty($userFirstNameErr) && empty($userLastNameErr) && empty($userTypeErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)){

            // Prepare an insert statement
            $sql = "INSERT INTO users (user_id, user_first_name, user_last_name, user_email, user_type, user_password) VALUES (default,?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssis", $paramFirstName, $paramLastName, $paramEmail, $paramType, $paramPassword);

                // Set parameters
                $paramFirstName = $userFirstName;
                $paramLastName = $userLastName;
                $paramEmail = $email;
                $paramType = $type;
                $paramPassword = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    $insert_id = mysqli_stmt_insert_id($stmt);
                    session_start();
                    $_SESSION['user_id'] = $insert_id;
                    $_SESSION['user_email'] = $email;
                    setcookie("insert_id", $insert_id , time() + (86400 * 30), "/");

                    header("location: migrantForm.php?id=".$_SESSION['user_id']);


                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

        }

        
    }


    if(isset($_POST["language"])){
        $language = $_POST["language"];
        setcookie("language", $language, time() + (86400 * 30), "/");
    }elseif(!isset($_COOKIE["language"])) {
        $language = "en";
        setcookie("language", $language, time() + (86400 * 30), "/");
    }else{
        $language=$_COOKIE["language"];
    }
    

    
    $content["login__sign_in_account"]="If you have previously created a profile and are a registered guide, please sign in below";
    $content["login__login_general_use_description"]= "This website creates a personal account so you can resume your search for the perfect guide anytime. Don't worry, your information is confidential and secure";
    $content["login__sign_in_header_text_bold"]= "Sign up";
    $content["login__login"] = "Login";
    $content["login__create_account_button"]= "Create Account";
    $content["login__sign_in_header_text"]= "for your personal account";
    $content["login__create_account"]="If you are new to this website, click the button below to get started on your personal profile and make one step closer to finding your future guide";
    $content["login__sign_up_button"]="continue";

    $trans = new GoogleTranslate();
    foreach($content as $key => $text){
        $content["$key"] = $trans->translate("en", $language, $text);
    }

    
    $user_type = get_user_type($conn);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php $content["login__login"]; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <style>
        .box-container {
            background-color: white;
            margin-bottom: 25px;
            margin: auto;
            margin-top: 10px;
            width: 50%;
            box-shadow: 0px 0px 15px lightgray;
        }
        .card-row-header {
            font-size: 13px;
            color: gray;
            margin-bottom: 25px;
            overflow: auto;
            padding: 0px 20px;
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            text-align-last: center;
        }
        .card-row-header input::placeholder {
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            color: lightgray;
        }
        .card-field {
            margin: 0px auto 10px auto;
            width: 33.33%;
        }
        .card-row-header input {
            border: none;
            background-color: #fff;
            padding: 0px;
            color: black;
            font-weight: 700;
            width: 100%;
        }
        .card-row-header select {
            border: none;
            text-transform: uppercase;
            background-color: #fff;
            padding: 0px;
            color: black;
            font-weight: 700;
            width: 100%;
        }
        .divider {
            width: 50%;
            margin: 0 auto;
        }
        button {
            cursor: pointer;
        }
        button:focus {
            outline:0;
        }
    </style>
    </head>

<body>

<header style="margin-top: 7%;">
    <div class="title"><b><?php echo  $content["login__sign_in_header_text_bold"]; ?></b> <?php echo $content["login__sign_in_header_text"]; ?></div>
    <div class="sub-title"><?php echo  $content["login__login_general_use_description"]; ?></div>
</header>

<main>

        <div class="divider">
            <div class="grade">sign up</div>
            <div class="date">personal account</div>
        </div>

        <div class="box-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="card-row-header" style="padding-top: 20px;">
                    <div class="card-field"><input  type="text" name="fname" placeholder="first name"><?php echo $userFirstNameErr; ?><br>first name</div>
                    <div class="card-field"><input  type="text" name="lname" placeholder="last name"><?php echo $userLastNameErr; ?><br>first name</div>
                </div>
                <div class="card-row-header">
                <div class="card-field"><input  type="text" name="email" placeholder="johnsmith@email.com"><?php echo $emailErr; ?><br>email</div>
                <div class="card-field"><select name="user-type">
                    <?php
                        foreach($user_type as $data)
                        {
                                  	echo '<option value="'. $data->id.'">'. $data->user_type.'</option>';
                          }
                        ?>
                    </select>
                    <br>citizenship status</div>
                <div class="card-row-header">
                    <div class="card-field"><input  type="password" name="password" placeholder="password"><?php echo $passwordErr; ?><br>password</div>
                    <div class="card-field"><input  type="password" name="confirm_password" placeholder="confirm password"><?php echo $confirmPasswordErr; ?><br>retype password</div>
                </div>
                <div class="card-row-header">
                    <div class="card-field"><button type="submit" name="signup_submit"><?php echo $content["login__sign_up_button"]; ?></button></div>
                </div>
            </form>
    </div>
</main>

</body>
<footer>
    <div id="language-footer">
        <div id = "language-display" class="languages"><script>displayLanguage('<?php echo $language?>');</script></div>
        <img src="" alt="">
    </div>

</footer>
</html>
