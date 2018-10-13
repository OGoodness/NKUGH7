<?php

    require_once 'include/db_connect.php';
    $email = $password = "";
    $emailErr = $passwordErr = "";


    if(!empty($_POST)){
        // Check if username is empty
        if(empty(trim($_POST["email"]))){
            $emailErr = 'Please enter your email.';
        } else{
            $email = trim($_POST["email"]);
        }

        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $passwordErr = 'Please enter your password.';
        } else{
            $password = trim($_POST['password']);
        }
        // Validate credentials
        if(empty($emailErr) && empty($passwordErr)){
            // Prepare a select statement
            $sql = "SELECT user_email, user_password FROM users WHERE user_email = ?";

            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $paramEmail);

                // Set parameters
                $paramEmail = $email;

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $email, $hashedPassword);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashedPassword)){
                                /* Password is correct, so start a new session and
                                save the username to the session */
                                session_start();
                                $_SESSION['user_id'] = $email;
                                header("location: browse.php");
                            } else{
                                // Display an error message if password is not valid
                                $passwordErr = 'The password you entered was not valid.';
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $emailErr = 'No account found with that email.';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
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
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;
    $content["login__sign_in_account"]="If you have previously created a profile and are a registered guide, please sign in below";
    $content["login__login_general_use_description"]= "This website will allow you to either help guide an immagrant family or if you are an immagrant family you can find a resdient family to help make your transtion to your new home smoother. Don't worry, your information is confidential and secure";
    $content["login__sign_in_header_text_bold"]= "Sign in";
    $content["login__login"] = "Login";
    $content["login__create_account_button"]= "Create Account";
    $content["login__sign_in_header_text"]= "to your account";
    $content["login__create_account"]="If you are new to this website, click the button below to get started on your personal profile and make one step closer to finding your future guide";


    $trans = new GoogleTranslate();
    foreach($content as $key => $text){
        $content["$key"] = $trans->translate("en", $language, $text);
    }

    // Close connection
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
    <div class="title"><b><?php echo  $content["login__sign_in_header_text_bold"]; ?></b> <?php echo $content["login__sign_in_header_text"]; ?></div>
    <div class="sub-title"><?php echo  $content["login__login_general_use_description"]; ?></div>
</header>

<main>
    <div class="two-column-container ">
        <div class="content">
            <div class="text"><?php echo $content["login__sign_in_account"]; ?></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input id ="input-user" type="text" name="email" placeholder="Enter your email">
                <br><span class="help-block"><?php echo $emailErr; ?></span><br>
                <input id="input-lock" type="password" name="password" placeholder="Enter your password">
                <br><span class="help-block"><?php echo $passwordErr; ?></span><br>
                <button type="submit"><?php echo $content["login__sign_in_header_text_bold"]; ?></button>
            </form>

            
        </div>

        <div class="content">
            <div class="text"><?php echo $content["login__create_account"]; ?></div>
            <a href="signup.php"><button> <?php echo $content["login__create_account_button"]; ?></button></a>
            
        </div>
    </div>
</div>
</main>

</body>
<footer>
    <div id="language-footer">
        <div id = "language-display" class="languages"><script>displayLanguage('<?php echo $language?>');</script></div>
        <img id ="language-flag" src="" alt="" onclick="languageSelect(id)">
</div>
</footer>
</html>