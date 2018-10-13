<?php
    if(isset($_POST["language"])){
        $language = $_POST["language"];
        setcookie("language", $language, time() + (86400 * 30), "/");
    }else{
        $language = "en"; 
    }
    

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;

    $boldText = 'Returning user';
    $restOfText = ", welcome back";
    $R_Post = "hi";

    $trans = new GoogleTranslate();
    $boldText = $trans->translate("en", $R_Post, $boldText);
    $restOfText = $trans->translate("en", $R_Post, $restOfText);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Griffin Burkhardt | Portfolio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/theme.css">
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>

<body class="center">

<header>

</header>

<main>
    <div class="two-column-container">
        <div class="content">
            <div class="subtitle"><b><?php echo $boldText; ?></b><?php echo $restOfText; ?></div>
    </div>
</main>

</body>
</html>