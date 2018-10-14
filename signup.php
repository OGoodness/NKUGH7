<?php
    // Include config file
    require_once 'include/db_connect.php';
    require_once 'functions/functions.php';
    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $content["login__err_first_name"] = "Please enter your first name.";
    $content["login__err_last_name"] = "Please enter your last name.";
    $content["login__err_enter_email"] = "Please enter an email.";
    $content["login__err_email_taken"] = "This email is already taken.";
    $content["login__err_exe_email_failed"] = "Execution email failed";
    $content["login__err_prep_email_fail"] = "Prepare email failed";
    $content["login__err_enter_password"] = "Please enter a password.";
    $content["login__err_password_len6"] = "Password must have at least 6 characters.";
    $content["login__err_confirm_password"] = "Please confirm password.";
    $content["login__err_passwords_ dont_match"] = "Password did not match.";
    $content["login__err_something_wrong"] = "Something went wrong. Please try again later.";
    $content["login__fname"] = "first name";
    $content["login__lname"] = "last name";
    $content["login__email"] = "email";


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

                    if($type == 1){
                        header("location: migrantForm.php?id=".$_SESSION['user_id']);
                    }else{
                        header("location: guideForm.php?id=".$_SESSION['user_id']);
                    }
                    


                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

        }

        
    }

    if (isset($_COOKIE['type'])) {
        unset($_COOKIE['type']);
        setcookie('type', null, -1, '/');
    } 

    if(isset($_POST["language"])){
        $language = $_POST["language"];
        setcookie("language", $language, time() + (60 * 5), "/");
    }elseif(!isset($_COOKIE["language"])) {
        $language = "en";
        setcookie("language", $language, time() + (60 * 5), "/");
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
    $content["signup__email_info"]="an email address will be your primary communications for any notifcations from community events to potentially friendship family requests";
    

    
    $content["login__sign_up_grade"]="sign up";
    $content["login__spersonal_acc"]="personal account";


    $content["login__citz_stat"]="citizenship status";
    $content["login__password"]="password";
    $content["login__retype_password"]="retype password";


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
    </head>

<body>
<header>
    <nav>
        <ul>
            <li style="float: left; font-size: 20px;"><a href="index.php"><b>CIP</b></a></li>
            <li style="float: right; font-size: 20px;"><a href="map.php"><i class="fas fa-map-marked-alt"></i></a></li>
            <li style="float: right; font-size: 20px;"><a href="browse.php"><i class="fas fa-list"></i></a></li>
            <li style="float: right; font-size: 20px;" class="dropdown"><a href="javascript:void(0)" class="dropbtn"><i class="fas fa-user-cog"></i></a>
            <div class="dropdown-content">
                <a href="#">Account</a>
                <a href="#">Sign Out</a>
            </div>
            </li>
        </ul>
    </nav>

    <div class="title"><b><?php echo  $content["login__sign_in_header_text_bold"]; ?></b> <?php echo $content["login__sign_in_header_text"]; ?></div>
    <div class="sub-title"><?php echo  $content["login__login_general_use_description"]; ?></div>
</header>

<main>

        <div class="divider">
            <div class="grade"><?php echo  $content["login__sign_up_grade"]; ?></div>
            <div class="date"><?php echo  $content["login__spersonal_acc"]; ?></div>
        </div>

        <div class="box-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="card-row-header" style="padding-top: 20px; padding-bottom: 0px;">
                    <div class="card-field"><input  type="text" name="fname"><?php echo $userFirstNameErr; ?><br><?php  echo $content["login__fname"]; ?></div>
                    <div class="card-field"><input  type="text" name="lname"><?php echo $userLastNameErr; ?><br><?php  echo $content["login__lname"]; ?></div>
                </div>
                <div class="card-row-header">
                <div class="card-field"><?php echo $content["signup__email_info"]; ?></div>
                <div class="card-field"><input  type="text" name="email"><?php echo $content["login__err_enter_email"]; ?><br> <?php echo $content["login__email"]; ?></div>
                <div class="card-field">
                    <select name="user-type">
                        <option>&nbsp;</option>
                    <?php
                        foreach($user_type as $data)
                        {
                                  	echo '<option value="'. $data->id.'">'. $trans->translate("en", $language, $data->user_type) .'</option>';
                          }
                        ?>
                    </select><br><?php echo $content["login__citz_stat"];?></div>
                        </div>
                <div class="card-row-header">
                    <div class="card-field"><input  type="password" name="password"><?php echo $passwordErr; ?><br><?php echo $content["login__password"]; ?></div>
                    <div class="card-field"><input  type="password" name="confirm_password"><?php echo $confirmPasswordErr; ?><br> <?php echo  $content["login__retype_password"]; ?></div>
                </div>
                <div class="card-row-header" style="padding-bottom: 0px;">
                    <div class="card-field"><button type="submit" name="signup_submit"><?php echo $content["login__sign_up_button"]; ?></button></div>
                </div>
            </form>
    </div>
</main>

</body>
</html>
