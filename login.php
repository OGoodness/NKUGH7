<?php
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
            <form action="mainPage.php" method="post">
            <input id ="input-user" type="text" name="fname" placeholder="username"><br>
            <input id="input-lock" type="password" name="lname" placeholder="password"><br>
            </form>

            <button><?php echo $content["login__sign_in_header_text_bold"]; ?></button>
        </div>

        <div class="content">
            <div class="text"><?php echo $content["login__create_account"]; ?></div>
            <a href="signup.php"><button> <?php echo $content["login__create_account_button"]; ?></button></a>
            
        </div>
    
</div>
</main>

</body>
<footer>

    <div id = "language-display" class="languages"><script>displayLanguage('<?php echo $language?>');</script></div>
    <div id="language-footer">
        <div id = "language-display" class="languages"><script>displayLanguage('<?php echo $language?>');</script></div>
        
        <div class="container">
        <img id="flag-spanish" height="2" src="images/flag-spanish.png" alt="Spanish Flag" data="es" onclick="languageSelect('flag-spanish')">   
        <img id="flag-usa" src="images/flag-usa.png" alt="USA Flag" data="en" onclick="languageSelect('flag-usa')">
        <img id="flag-arabic" src="images/flag-arabic.png" alt="Arabic Flag" data="ar" onclick="languageSelect('flag-arabic')">
        <img id="flag-vietnam" src="images/flag-vietnam.png" alt="Vietnam Flag" data="vi" onclick="languageSelect('flag-vietnam')">
        <img id="flag-india" src="images/flag-india.png" alt="Indian Flag" data="hi" onclick="languageSelect('flag-india')">
        <img id="flag-ethiopia" src="images/flag-ethiopia.png" alt="Ethiopia Flag" data="am" onclick="languageSelect('flag-ethiopia')">
        <img id="flag-bulgaria" src="images/flag-bulgaria.png" alt="Bulgaria Flag" data="bg" onclick="languageSelect('flag-bulgaria')">
        <img id="flag-france" src="images/flag-france.png" alt="France Flag" data="fr" onclick="languageSelect('flag-france')">
        <img id="flag-turkey" src="images/flag-turkey.png" alt="Turkey Flag" data="tr" onclick="languageSelect('flag-turkey')">
    </div>
</div>
</footer>
</html>