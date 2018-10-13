<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
        setcookie("language", $language, time() + (86400 * 30), "/");
    }else{
        $language = "en"; 
    }
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;
    $content["login__sign_in_account"]="If you have previously created a profile and are a registered guide, please sign in below";
    $content["login__login_general_use_description"]= "This website creates a personal account so you can resume your search for the perfect guide anytime. Don't worry, your information is confidential and secure";
    $content["login__sign_in_header_text_bold"]= "Sign in";
    $content["login__sign_in_header_text"]= "to your account";
    $content["login__create_account"]="If you are new to this website, click the button below to get started on your personal profile and make one step closer to finding your future guide";

   # foreach(){
        
    #}

    $trans = new GoogleTranslate();
    $login__sign_in_account = $trans->translate("en", $language, $login_sign_in_account);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

<body>

<header>
    <div class="title"><b><?php echo $login__sign_in_header_text_bold; ?></b> <?php echo $login__sign_in_header_text; ?></div>
    <div class="sub-title"><?php echo $login__login_general_use_description; ?></div>
</header>

<main>
    <div class="two-column-container ">
        <div class="content">
            <div class="text"><?php echo $login__sign_in_account; ?></div>
            <form action="mainPage.php" method="post">
            <input id ="input-user" type="text" name="fname" placeholder="username"><br>
            <input id="input-lock" type="password" name="lname" placeholder="password"><br>
            </form>

            <button>Sign in</button>
        </div>

        <div class="content">
            <div class="text"><?php echo $login__create_account; ?></div>
            <button>Create an Account</button>
        </div>
    </div>
</div>
</main>

</body>
<footer>
    <div id="language-footer">
        <div class="languages">english</div><img id="flag-filipino" src="images/flag-filipino.png">
</div>
</footer>
</html>